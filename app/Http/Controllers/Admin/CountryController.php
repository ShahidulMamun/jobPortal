<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class CountryController extends Controller
{
    public function create(){
        $countries = Country::where('status',true)->get();
        return view('admin.country.create',compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'             => ['required', 'string', 'max:100', 'unique:countries,name'],
            'iso'              => ['nullable', 'string', 'max:5'],
            'phone_code'       => ['nullable', 'string', 'max:10'],
            'currency_code'    => ['nullable', 'string', 'max:10'],
            'currency_symbol'  => ['nullable', 'string', 'max:10'],
        ]);
 
        Country::create([
            'name'             => $request->name,
            'iso'              => $request->iso,
            'phone_code'       => $request->phone_code,
            'currency_code'    => $request->currency_code,
            'currency_symbol'  => $request->currency_symbol,
            'status'           => 1,
        ]);
 
        return redirect()
            ->route('admin.country.index')
            ->with('success', 'Country added successfully');
    }

    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => [
                'required', 'string', 'max:100',
                Rule::unique('countries', 'name')->ignore($country->id),
            ],
            'iso'              => ['nullable', 'string', 'max:5'],
            'phone_code'       => ['nullable', 'string', 'max:10'],
            'currency_code'    => ['nullable', 'string', 'max:10'],
            'currency_symbol'  => ['nullable', 'string', 'max:10'],
        ]);
 
        $country->update([
            'name'             => $request->name,
            'iso'              => $request->iso,
            'phone_code'       => $request->phone_code,
            'currency_code'    => $request->currency_code,
            'currency_symbol'  => $request->currency_symbol,
            'status'           => $request->has('status') ? 1 : 0,
        ]);
 
        return redirect()
            ->route('admin.country.index')
            ->with('success', 'Country updated successfully');
    }

    public function destroy(Country $country)
    {
        if ($country->states()->exists()) {
            return redirect()
                ->route('admin.country.index')
                ->with('error', 'এই কান্ট্রির অধীনে স্টেট থাকায় ডিলিট করা যাচ্ছে না। আগে স্টেট গুলো ডিলিট করুন।');
        }
 
        $country->delete();
 
        return redirect()
            ->route('admin.country.index')
            ->with('success', 'Counntry deleted successfully');
    }
 
}
