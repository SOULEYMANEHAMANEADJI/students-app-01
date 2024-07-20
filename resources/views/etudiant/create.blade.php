@extends('layouts.app')

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
                <div class="card-header">{{ __('Create Etudiant') }}</div>
                <div class="card-body">
                    <form action="{{ route('etudiant.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control bg-dark text-light border-secondary @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="unsername">{{ __('Unsurname') }}</label>
                            <input id="unsername" type="text" class="form-control bg-dark text-light border-secondary @error('unsername') is-invalid @enderror" name="unsername" value="{{ old('unsername') }}" autocomplete="unsername" autofocus>
                            @error('unsername')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="age">{{ __('Age') }}</label>
                            <input id="age" type="number" class="form-control bg-dark text-light border-secondary @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" autocomplete="age" autofocus>
                            @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="level">{{ __('Level') }}</label>
                            <input id="level" type="text" class="form-control bg-dark text-light border-secondary @error('level') is-invalid @enderror" name="level" value="{{ old('level') }}" autocomplete="level" autofocus>
                            @error('level')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="classe_id">{{ __('Class') }}</label>
                            <select id="classe_id" name="classe_id" class="form-control bg-dark text-light border-secondary @error('classe_id') is-invalid @enderror">
                                @foreach($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->nomClasse }}</option>
                                @endforeach
                            </select>
                            @error('classe_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-sm btn-outline-success">
                                {{ __('Create Etudiant') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
