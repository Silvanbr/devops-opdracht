<?php

namespace App\Http\Controllers;

use App\Models\Holodeck;
use App\Http\Requests\StoreHolodeckRequest;
use App\Http\Requests\UpdateHolodeckRequest;
use Illuminate\Http\Request;

class HolodeckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("holodecks.index", [
            'holodecks' => Holodeck::orderBy('id', 'desc')->get()
        ]);
    }

    public function validateHolodeck(Request $request)
    {
        return $request->validate([
            'type' => 'required',
            'serial_no' => 'required',
            'sw_version' => 'required',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("holodecks.create");
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     */
    public function store(Request $request)
    {
        Holodeck::create($this->validateHolodeck($request));

        return redirect(route("holodecks.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $holodeck = Holodeck::findOrFail($id);
        return view("holodecks.show", [
            "holodeck" => $holodeck
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $holodeck = Holodeck::findOrFail($id);
        return view("holodecks.edit", [
            "holodeck" => $holodeck
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Holodeck $holodeck)
    {
        $holodeck->update($this->validateHolodeck($request));

        return redirect(route('holodecks.show', $holodeck));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Holodeck $holodeck)
    {
        $holodeck->delete();
        return redirect(route("holodecks.index"));
    }
}
