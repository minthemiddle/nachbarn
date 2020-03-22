<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PinController extends Controller
{
    public function store(Request $request)
    {
        if ($request->pin === env('PIN')) {
            return redirect(route('root'))->cookie('pin', 'okay', 60);
        }

        return redirect(route('pin.create'));
    }
}
