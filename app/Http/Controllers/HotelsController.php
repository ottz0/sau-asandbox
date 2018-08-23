<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Http\Requests\InlineRequest;

class HotelsController extends Controller
{
    /*  
        Show a list of hotels
    */
    public function index() {
        $hotels = Hotel::orderBy('id', 'asc')->get();
        return view('hotels.index', compact('hotels'));
    }

    /*  
        Show the select hotel from the list 
    */
    public function show(Hotel $hotel) {
        return view ('hotels.show', compact('hotel'));
    }

    /*  
        Create a new hotel
    */
    public function create() {
        return view ('hotels.create');
    }

    /*  
        Create Form Validation Request
    */
    public function store(InlineRequest $request) {
        $formData =  $request->only([
            'hotel_name',
            'hotel_desc'
        ]);
        Hotel::create($formData);
    }

    /*  
        Edit a hotel
    */
    public function edit(Hotel $hotel) {
        return view ('hotels.edit', compact('hotel'));
    }

    /*  
        Update a hotel
    */
    public function update(Request $request, Hotel $hotel) {
        $hotel->hotel_name = $request->input('hotel_name');
        $hotel->hotel_desc = $request->input('hotel_desc');
        $hotel->save();
        return view ('hotels.edit', compact('hotel'));
    }

    /*  
        Delete selected hotel
    */
    public function delete(Hotel $hotel) {
        $hotel->delete();
    }


    public function validateFormRequest(InlineRequest $request){
        return $request->only([
            'hotel_name',
            'hotel_desc'
        ]);
    }



}
