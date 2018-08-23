<?php

namespace App\Http\Controllers;


class Dev5Controller extends Controller
{
    /**
     * Store a new project in the database.
     */
    public function store()
    {
        // dd();
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]); 

        return ['message' => 'Project Created!'];
    }
}