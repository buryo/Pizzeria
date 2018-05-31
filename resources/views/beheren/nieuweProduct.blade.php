@extends('layouts.master')

@section('content')
    <div class="container m-t-100 m-b-100" xmlns="http://www.w3.org/1999/html">
        <h3 class="position-absolute card-title">Nieuwe product toevoegen</h3>
        <h4 class="pull-right custom-title"><a class="std-a" href="{{ route('beheren.index') }}"><i
                        class="fa fa-arrow-left"></i> Terug</a></h4>
        <div class="clearfix"></div>
        <hr>
        <div class="col-7">
            {{ Form::open(['files' => true, 'route' => 'beheren.nieuweProductAdd']) }}
            <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">Naam product</label>
                <div class="col-9">
                    <input class="form-control" type="text" name="name" placeholder="Pizza quattro formaggi" required>
                </div>
            </div>
            <div class="form-group row ">
                <label for="example-text-input" class="col-3 col-form-label">Soort product</label>
                <div class="col-9">
                    <select class="form-control" name="type" type="text" >
                        <option value="pizza">Pizza</option>
                        <option value="pasta">Pasta</option>
                        <option value="ovenschotel">Ovenschotel</option>
                        <option value="broodje">Broodje</option>
                        <option value="salade">Salade</option>
                        <option value="vleesgerecht">Vleesgerecht</option>
                        <option value="visgerecht">Visgerecht</option>
                        <option value="dessert">Dessert</option>
                        <option value="drank">Drank</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-search-input" class="col-3 col-form-label">Prijs</label>
                <div class="col-9">
                    <input class="form-control" name="price" type="number" step="any" placeholder="14,95" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-email-input" class="col-3 col-form-label">Foto product</label>
                <div class="col-9">
                    {{ Form::file('image', ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group row">
                <label for="example-email-input" class="col-3 col-form-label">Ingrediënten</label>
                <div class="col-9">
                    <textarea  class="form-control" name="description" placeholder="tomaat, kaas..." type="text"></textarea>
                </div>
            </div>
            {{ Form::submit('Product toevoegen', ['class' => 'btn btn-success']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection