<?php

namespace App\Http\Controllers\Platform\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'document' => $data['document'],
            'social_reason' => $data['social_reason'],
            'company' => $data['company'],
        ]);
    }
}
