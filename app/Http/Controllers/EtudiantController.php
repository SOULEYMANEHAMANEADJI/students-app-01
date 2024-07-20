<?php
namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function create()
    {
        $classes = Classe::all(); // Récupère toutes les classes pour le formulaire
        return view('etudiant.create', compact('classes'));
    }

    // View a product by its ID
    public function read($id)
    {
        // Find a product by its ID
        $etudiant = Etudiant::find($id);

        if (!$etudiant ) {

            // Return the selected product
            return response()->with('message_error', 'Something Went Wrong!', 404);

        }
        // Return a JSON response with a 404 error message
        return view('etudiant.read', compact('etudiant'));
        
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'unsername' => 'required|max:255',
            'age' => 'required|numeric',
            'level' => 'required|max:255',
            'classe_id' => 'required|exists:classes,id' // Valide l'existence de la classe
        ]);

        Etudiant::create($validatedData);

        return redirect()->route('etudiant.index')->with('message', 'Etudiant Added Successfully.');
    }

    public function edit($id)
    {
        $etudiant = Etudiant::find($id);
        $classes = Classe::all();
        return view('etudiant.update', compact('etudiant', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'unsername' => 'required|max:255',
            'age' => 'required|numeric',
            'level' => 'required|max:255',
            'classe_id' => 'required|exists:classes,id'
        ]);

        $etudiant = Etudiant::find($id);
        if ($etudiant) {
            $etudiant->update($validatedData);
            return redirect()->route('etudiant.index')->with('message', 'Etudiant Updated Successfully.');
        }

        return redirect()->route('etudiant.index')->with('message_error', 'Etudiant not found.');
    }

    public function delete($id)
    {
        $etudiant = Etudiant::find($id);
        if ($etudiant) {
            $etudiant->delete();
            return redirect()->route('etudiant.index')->with('message', 'Etudiant Deleted Successfully.');
        }

        return redirect()->route('etudiant.index')->with('message_error', 'Etudiant not found.');
    }

}
