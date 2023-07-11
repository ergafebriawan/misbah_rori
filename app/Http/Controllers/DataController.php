<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MSensor;

class DataController extends Controller
{
    public function data()
    {
        $data = MSensor::orderBy('created_at', 'desc')->get();
        return view('data')->with('data', $data);
    }
}
