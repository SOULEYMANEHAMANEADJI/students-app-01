@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="mb-3">All Classes
                <a href="{{ url('/') }}" class=" btn btn-sm btn-outline-primary float-end"><i class="fa fa-arrow-left"></i> Back</a>
                <a href="{{ route('classe.create') }}" class="btn btn-sm btn-outline-success float-end">
                    
                    <i class="fa fa-plus"></i> Add Classe
                </a>
            </h4>
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            @if (session('message_error'))
                <div class="alert alert-danger">{{ session('message_error') }}</div>
            @endif
            <div class="card bg-dark text-light border-secondary shadow-sm">
                <div class="card-header">{{ __('All Classes') }}</div>
                <div class="card-body">
                    <table class="table table-dark border border-secondary table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom Classe</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($classes as $classe)
                            <tr>
                                <td>{{ $classe->id }}</td>
                                <td>{{ $classe->nomClasse }}</td>
                                <td>{{ $classe->description }}</td>
                                <td>
                                    <a href="{{ route('classe.read', $classe->id) }}" class="btn btn-sm btn-outline-primary m-1">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('classe.edit', $classe->id) }}" class="btn btn-sm btn-outline-success m-1">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('classe.delete', $classe->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger m-1" onclick="return confirm('Are you sure you want to delete this classe?');">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="4">No Classes Available</td>
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
