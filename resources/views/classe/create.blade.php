@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mt-5 mb-3 clearfix">
                <a href="{{ route('classe.index') }}" class="btn btn-sm btn-outline-primary float-end">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
            <div class="card bg-dark text-light border-secondary">
                <div class="card-header">{{ __('Create Classe') }}</div>
                <div class="card-body">
                    <form action="{{ route('classe.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="nomClasse">{{ __('Nom Classe') }}</label>
                            <input id="nomClasse" type="text" class="form-control bg-dark text-light border-secondary @error('nomClasse') is-invalid @enderror" name="nomClasse" value="{{ old('nomClasse') }}" autocomplete="nomClasse" autofocus>
                            @error('nomClasse')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">{{ __('Description') }}</label>
                            <input id="description" type="text" class="form-control bg-dark text-light border-secondary @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-sm btn-outline-success">
                                {{ __('Create Classe') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
