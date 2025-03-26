<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Auth'
        ];
        return view('auth.login', $data);
    }

    public function login(Request $request)
    {
        
    }
}
