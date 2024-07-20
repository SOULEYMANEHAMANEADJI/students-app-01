<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     // Fetch all etudiants from the database
    //     $etudiants = Etudiant::all();
    //     // return view('index');
    //     return view('etudiant.index', compact('etudiants'));
    // }

    public function index()
    {
        $etudiants = Etudiant::with('classe')->get();
        return view('etudiant.index', compact('etudiants'));
    }

}
