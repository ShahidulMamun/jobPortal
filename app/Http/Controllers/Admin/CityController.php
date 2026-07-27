<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::with('state.country')->latest()->paginate(20);
        $states = State::with('country')->where('status', 1)->orderBy('name')->get();
        $countries = Country::where('status', 1)->orderBy('name')->get();

        return view('admin.city.create', compact('cities', 'states', 'countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'state_id' => ['required', 'exists:states,id'],
            'name'     => [
                'required', 'string', 'max:100',
                Rule::unique('cities', 'name')->where('state_id', $request->state_id),
            ],
        ]);

        City::create([
            'country_id'=>$request->country_id,
            'state_id' => $request->state_id,
            'name'     => $request->name,
            'status'   => 1,
        ]);

        return redirect()
            ->route('admin.city.index')
            ->with('success', 'সিটি সফলভাবে যোগ করা হয়েছে।');
    }

    public function update(Request $request, City $city)
    {
        $request->validate([
            'state_id' => ['required', 'exists:states,id'],
            'name'     => [
                'required', 'string', 'max:100',
                Rule::unique('cities', 'name')
                    ->where('state_id', $request->state_id)
                    ->ignore($city->id),
            ],
        ]);

        $city->update([
            'state_id' => $request->state_id,
            'name'     => $request->name,
            'status'   => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.city.index')
            ->with('success', 'সিটি সফলভাবে আপডেট করা হয়েছে।');
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()
            ->route('admin.city.index')
            ->with('success', 'সিটি সফলভাবে ডিলিট করা হয়েছে।');
    }
}