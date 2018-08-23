<?php

namespace App;

class Validation
{
    const RULES = [
        'name' => "required|min:2",
        'card' => "required|digits:16",
        'email' => "required|unique:mysql_portal.user|email",
        'id' => "integer|unique:mysql_portal.user",
        'message' => "min:10",
        'gender' => "in:Male,Female",
        'updates' => "boolean",
        'age' => 'required',
        'rating' => 'integer|between:1,10'
    ];
}
