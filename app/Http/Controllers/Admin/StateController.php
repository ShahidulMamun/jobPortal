<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Country;
use App\Models\State;

class StateController extends Controller
{
    public function index()
    {
        $states = State::with('country')->latest()->paginate(20);
        $countries = Country::where('status', 1)->orderBy('name')->get();
 
        return view('admin.state.create', compact('states', 'countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_id' => ['required', 'exists:countries,id'],
            'name'       => [
                'required', 'string', 'max:100',
                Rule::unique('states', 'name')->where('country_id', $request->country_id),
            ],
        ]);
 
        State::create([
            'country_id' => $request->country_id,
            'name'       => $request->name,
            'status'     => 1,
        ]);
 
        return redirect()
            ->route('admin.state.index')
            ->with('success', 'State Added Successfully');
    }
 

    public function update(Request $request, State $state)
    {
        $request->validate([
            'country_id' => ['required', 'exists:countries,id'],
            'name'       => [
                'required', 'string', 'max:100',
                Rule::unique('states', 'name')
                    ->where('country_id', $request->country_id)
                    ->ignore($state->id),
            ],
        ]);
 
        $state->update([
            'country_id' => $request->country_id,
            'name'       => $request->name,
            'status'     => $request->has('status') ? 1 : 0,
        ]);
 
        return redirect()
            ->route('admin.state.index')
            ->with('success', 'State updated successfully');
    }
 

    public function destroy(State $state)
    {
        if ($state->cities()->exists()) {
            return redirect()
                ->route('admin.state.index')
                ->with('error', 'This state cannot be deleted because it contains cities. Delete the cities first.');
        }
 
        $state->delete();
 
        return redirect()
            ->route('admin.state.index')
            ->with('success', 'State deleted successfully');
    }
}
