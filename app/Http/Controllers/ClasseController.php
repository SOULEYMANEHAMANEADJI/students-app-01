<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function create()
    {
        return view('classe.create');
    }

    public function read($id)
    {
        $classe = Classe::find($id);

        if (!$classe) {
            return redirect()->route('classe.index')->with('message_error', 'Classe not found!');
        }

        return view('classe.read', compact('classe'));
    }

    public function store(Request $request)
    {
        // Valider les données entrantes
        $validatedData = $request->validate([
            'nomClasse' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        // Créer une nouvelle instance de Classe avec les données validées
        $classe = new Classe([
            'nomClasse' => $validatedData['nomClasse'],
            'description' => $validatedData['description'],
        ]);

        // Enregistrer la Classe dans la base de données
        $classe->save();

        return redirect()->route('classe.index')->with('message', 'Classe Added Successfully.');
    }

    public function edit($id)
    {
        $classe = Classe::find($id);

        if (!$classe) {
            return redirect()->route('classe.index')->with('message_error', 'Classe not found!');
        }

        return view('classe.update', compact('classe'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données entrantes
        $validatedData = $request->validate([
            'nomClasse' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        $classe = Classe::find($id);

        if (!$classe) {
            return redirect()->route('classe.index')->with('message_error', 'Classe not found!');
        }

        // Mettre à jour les attributs de la Classe
        $classe->update([
            'nomClasse' => $validatedData['nomClasse'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('classe.index')->with('message', 'Classe Updated Successfully');
    }

    public function delete($id)
    {
        $classe = Classe::find($id);

        if (!$classe) {
            return redirect()->route('classe.index')->with('message_error', 'Classe not found!');
        }

        $classe->delete();

        return redirect()->route('classe.index')->with('message', 'Classe Deleted Successfully');
    }

    public function index()
    {
        $classes = Classe::all();

        return view('classe.index', compact('classes'));
    }
}
