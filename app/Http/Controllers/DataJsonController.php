<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class DataJsonController extends Controller
{

    function member()
    {
        $data = Member::all();
        return view('data/json')->with('data', $data);
    }
}
