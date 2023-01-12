<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConferenceRequest;
use App\Models\Conference;
use App\Models\Country;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index(){
        $conferences = Conference::paginate(15);
        return view('conference.index', compact('conferences'));
    }

    public function create(){
        $countries = Country::all();
        return view('conference.create', compact("countries"));
    }

    public function store(ConferenceRequest $request){
        $data = request()->validate([
                'title' => 'required|string|min:2|max:255',
                'date' => 'required|date',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'country_id' => 'required|integer',
        ]);
        $data['user_id'] = auth()->id();
        Conference::create($data);
        return redirect()->route('conference.index');
    }
    public function destroy(Conference $conference){
        $conference->delete();
        return redirect()->route('conference.index');
    }

    public function show(Conference $conference){
        $country = Country::find($conference->country_id);
        return view('conference.show', compact('conference', 'country'));
    }

    public function edit(Conference $conference){
        $countries = Country::all();
        return view('conference.edit', compact('conference', 'countries'));
    }

    public function update(ConferenceRequest $request, Conference $conference){
        $data = request()->validate([
            'title' => 'required|string|min:2|max:255',
            'date' => 'required|date',
            'latitude' => 'required|numeric|min:-90|max:90',
            'longitude' => 'required|numeric|min:-90|max:90',
            'country_id' => 'required|integer',
        ]);
        $conference->update($data);
        return redirect()->route('conference.show', $conference->id);
    }
}
