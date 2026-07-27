<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::with(['country', 'state'])->latest()->paginate(20);
        $countries = Country::where('status', 1)->orderBy('name')->get();
        $states = State::where('status', 1)->orderBy('name')->get();

        return view('admin.district.create', compact('districts', 'countries', 'states'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_id' => ['required', 'exists:countries,id'],
            'state_id'   => ['required', 'exists:states,id'],
            'name'       => [
                'required', 'string', 'max:100',
                Rule::unique('districts', 'name')->where('state_id', $request->state_id),
            ],
        ]);

        District::create([
            'country_id' => $request->country_id,
            'state_id'   => $request->state_id,
            'name'       => $request->name,
            'status'     => 1,
        ]);

        return redirect()
            ->route('admin.district.index')
            ->with('success', 'ডিস্ট্রিক্ট সফলভাবে যোগ করা হয়েছে।');
    }

    public function update(Request $request, District $district)
    {
        $request->validate([
            'country_id' => ['required', 'exists:countries,id'],
            'state_id'   => ['required', 'exists:states,id'],
            'name'       => [
                'required', 'string', 'max:100',
                Rule::unique('districts', 'name')
                    ->where('state_id', $request->state_id)
                    ->ignore($district->id),
            ],
        ]);

        $district->update([
            'country_id' => $request->country_id,
            'state_id'   => $request->state_id,
            'name'       => $request->name,
            'status'     => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.district.index')
            ->with('success', 'ডিস্ট্রিক্ট সফলভাবে আপডেট করা হয়েছে।');
    }

    public function destroy(District $district)
    {
        if ($district->cities()->exists()) {
            return redirect()
                ->route('admin.district.index')
                ->with('error', 'এই ডিস্ট্রিক্টের অধীনে সিটি থাকায় ডিলিট করা যাচ্ছে না। আগে সিটি গুলো ডিলিট করুন।');
        }

        $district->delete();

        return redirect()
            ->route('admin.district.index')
            ->with('success', 'ডিস্ট্রিক্ট সফলভাবে ডিলিট করা হয়েছে।');
    }
}