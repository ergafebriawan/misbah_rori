<?php

namespace App\Http\Controllers;

use App\Models\MSensor;
use Illuminate\Http\Request;

class ArduinoController extends Controller
{
    function getData(){
        try {
            $getting = MSensor::select('ph', 'turbi', 'status')->orderBy('created_at', 'desc')->first();
            return response()->json([
                'success' => 1,
                'message' => 'get last data',
                'data' => $getting
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => 0,
                'message' => 'failed get data',
                'data' => null
            ]);
        }
    }

    function sendData(Request $request){
        $data_ph = $request->input('ph');
        $data_tubin = $request->input('turbi');
        $status = "baik";

        try {
            // $sending = Sensor::where('id', 1)
            // ->update([
            //     'sen_ph' => $data_ph,
            //     'sen_turbi' => $data_tubin
            // ]);

            $sending = MSensor::create([
                'ph' => $data_ph,
                'turbi' => $data_tubin,
                'status' => $status
            ]);

            if($sending){
                return response()->json([
                    'success' => 1,
                    'message' => 'success sending data'
                ], 200);
            }else{
                return response()->json([
                    'success' => 0,
                    'message' => 'failed sending data'
                ], 400);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => 0,
                'message' => $th->getMessage()
            ], 500);
        }
        
    }
}
