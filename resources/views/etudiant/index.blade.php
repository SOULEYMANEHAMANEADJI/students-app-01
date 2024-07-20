




@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mt-5 mb-3 clearfix">
                <a href="{{ route('etudiant.create') }}" class="btn btn-sm btn-outline-success float-end">
                    <i class="fa fa-plus"></i> Add Etudiant
                </a>
                <a href="{{ route('classe.index') }}" class="btn btn-sm btn-outline-success float-end">
                    <i class="fa fa-plus"></i> List Classe
                </a>
            </div>
            <div class="card bg-dark text-light border-secondary">
                <div class="card-header">{{ __('All Etudiants') }}</div>
                <div class="card-body">
                    <table class="table table-dark border border-secondary table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Unsurname</th>
                                <th>Age</th>
                                <th>Level</th>
                                <th>Class</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($etudiants as $etudiant)
                            <tr>
                                <td>{{ $etudiant->id }}</td>
                                <td>{{ $etudiant->name }}</td>
                                <td>{{ $etudiant->unsername }}</td>
                                <td>{{ $etudiant->age }}</td>
                                <td>{{ $etudiant->level }}</td>
                                <td>{{ $etudiant->classe ? $etudiant->classe->nomClasse : 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('etudiant.read', $etudiant->id) }}" class="btn btn-sm btn-outline-primary m-1">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-sm btn-outline-success m-1">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('etudiant.delete', $etudiant->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger m-1" onclick="return confirm('Are you sure you want to delete this etudiant?');">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="7">No Etudiants Available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
