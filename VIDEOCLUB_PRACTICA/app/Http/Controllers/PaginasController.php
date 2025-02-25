<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function getShow($id) { 
        return view('catalog.show', array('id'=>$id)); 
    }
    

}
