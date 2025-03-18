<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pictograma;

class PictogramaController extends Controller {
    public function index() {
        $pictogramas = Pictograma::all();
        return view('pictogramas.index', compact('pictogramas'));
    }
}
