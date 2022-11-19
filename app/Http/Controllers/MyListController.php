<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyListController extends Controller
{
    public function show(Request $request)
    {
        return view('my-list', ['user' => $request->user()]);
    }
}
