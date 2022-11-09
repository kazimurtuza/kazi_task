<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorbookController extends Controller
{
    public function homePage(){

        $doctorList=Doctor::get();
        return view('welcome')->with(compact('doctorList'));
    }
}
