@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mt-5 mb-3 clearfix">
                <a href="{{ url('/classe') }}" class=" btn btn-sm btn-outline-primary float-end"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="card bg-dark text-light border-secondary">
                <div class="card-header">{{ __('Classe Details') }}</div>

                @if ($classe)
                    
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="nomClasse">{{ __('Nom Classe') }}</label>
                        <input id="nomClasse" type="text" class="form-control bg-dark text-light border-secondary" value="{{ $classe->nomClasse }}" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">{{ __('Description') }}</label>
                        <input id="description" type="text" class="form-control bg-dark text-light border-secondary" readonly value="{{ $classe->description }}"> 
                    </div>

                </div>
                @else
                    <h4 class="alert-danger">Something Went Wrong</h4>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection