{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mt-5 mb-3 clearfix">
                <a href="{{ route('etudiant.index') }}" class="btn btn-sm btn-outline-primary float-end">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
            <div class="card bg-dark text-light border-secondary">
                <div class="card-header">{{ __('Etudiant Details') }}</div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label>{{ __('Name') }}</label>
                        <p>{{ $etudiant->name }}</p>
                    </div>
                    <div class="form-group mb-3">
                        <label>{{ __('Unsurname') }}</label>
                        <p>{{ $etudiant->unsername }}</p>
                    </div>
                    <div class="form-group mb-3">
                        <label>{{ __('Age') }}</label>
                        <p>{{ $etudiant->age }}</p>
                    </div>
                    <div class="form-group mb-3">
                        <label>{{ __('Level') }}</label>
                        <p>{{ $etudiant->level }}</p>
                    </div>
                    <div class="form-group mb-3">
                        <label>{{ __('Class') }}</label>
                        <p>{{ $etudiant->classe ? $etudiant->classe->nomClasse : 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}



@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-light border-secondary">
                <div class="card-header">{{ __('Etudiant Details') }}</div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $etudiant->name }}</p>
                    <p><strong>Unsurname:</strong> {{ $etudiant->unsername }}</p>
                    <p><strong>Age:</strong> {{ $etudiant->age }}</p>
                    <p><strong>Level:</strong> {{ $etudiant->level }}</p>
                    <p><strong>Class:</strong> {{ $etudiant->classe->nomClasse }}</p>
                    
                    <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-sm btn-outline-success">
                        <i class="fa fa-pencil"></i> Edit
                    </a>
                    <form action="{{ route('etudiant.delete', $etudiant->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this etudiant?');">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </form>
                    <a href="{{ route('etudiant.index') }}" class="btn btn-sm btn-outline-primary float-end">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
