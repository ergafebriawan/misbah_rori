<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MSensor;

class WebSensor extends Controller
{
    public function bacaph()
     {
    //baca nilai /isi table tb_sensor dan ambil nilai ph
      $sensor = MSensor::select('*')->get();
    //kirim ke tampilan baca ph (view bacaph)
      return view ('bacaph', ['nilaisensor'=> $sensor]);
    
     }
        public function bacaturbi()
        {
        $sensor =MSensor::select('id_sensor','turbi')->get();
        return view ('bacaturbi', ['nilaisensor'=> $sensor]);
        }

        public function status()
        {
        $sensor =MSensor::select('*')->get();
        return view ('status', ['nilaisensor'=> $sensor]);
        }
        
}
