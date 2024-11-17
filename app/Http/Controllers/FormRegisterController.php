<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormRegisterController extends Controller
{
    // FormController.php
    public function handleForm(Request $request)
    {
        $member_level = $request->input('member_level');
        return view('Auth.Register', compact('member_level'));
    }

}
