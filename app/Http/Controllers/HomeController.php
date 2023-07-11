<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Queue\Monitor;
use Illuminate\Http\Request;
use App\Models\MSensor;

class HomeController extends Controller
{
    function index(){
        $dat = MSensor::orderBy('created_at', 'desc')->first();

        return view('monitoring', ['data_sensor' => $dat]);
    }
}
