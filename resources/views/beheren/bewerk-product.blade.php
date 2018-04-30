@extends('layouts.master')

@section('content')
    <div class="container m-t-100 m-b-100" xmlns="http://www.w3.org/1999/html">
        <h3 class="position-absolute card-title">{{$productData->name}} bewerken</h3>
        <h4 class="pull-right custom-title"><a class="std-a" href="{{ URL::previous() }}"><i
                        class="fa fa-arrow-left"></i> Terug</a></h4>
        <div class="clearfix"></div>
        <hr>
        <div class="col-7">
            {{ Form::open(['method' => 'PATCH', 'files' => true, 'route' => ['beheren.bewerkenSelectedProduct', 'type' => $type, 'id' => $id]]) }}
            <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">Naam product</label>
                <div class="col-9">
                    <input class="form-control" type="text" value="{{$productData->name}}" name="name" placeholder="Pizza quattro formaggi">
                </div>
            </div>
            <div class="form-group row ">
                <label for="example-text-input" class="col-3 col-form-label">Soort product</label>
                <div class="col-9">
                    <select class="form-control" name="type" type="text" >
                        <option {{$productData->type == 'pizza' ? 'selected = selected' : ''}} value="pizza">Pizza</option>
                        <option {{$productData->type == 'pasta' ? 'selected = selected' : ''}} value="pasta">Pasta</option>
                        <option {{$productData->type == 'ovenschotel' ? 'selected = selected' : ''}} value="ovenschotel">Ovenschotel</option>
                        <option {{$productData->type == 'broodje' ? 'selected = selected' : ''}} value="broodje">Broodje</option>
                        <option {{$productData->type == 'salade' ? 'selected = selected' : ''}} value="salade">Salade</option>
                        <option {{$productData->type == 'vleesgerecht' ? 'selected = selected' : ''}} value="vleesgerecht">Vleesgerecht</option>
                        <option {{$productData->type == 'visgerecht' ? 'selected = selected' : ''}} value="visgerecht">Visgerecht</option>
                        <option {{$productData->type == 'dessert' ? 'selected = selected' : ''}} value="dessert">Dessert</option>
                        <option {{$productData->type == 'drank' ? 'selected = selected' : ''}} value="drank">Drank</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-search-input" class="col-3 col-form-label">Prijs</label>
                <div class="col-9">
                    <input class="form-control" name="price" type="number" value="{{$productData->price}}" step="any" placeholder="14,95">
                </div>
            </div>
            <div class="form-group row">
                <label for="foto" class="col-3 col-form-label">Foto product</label>
                <div class="col-9">
                    {{ Form::file('image', ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group row">
                <label for="example-email-input" class="col-3 col-form-label">Ingrediënten</label>
                <div class="col-9">
                    <textarea  class="form-control" name="description" placeholder="tomaat, kaas..." type="text">{{$productData->description}}</textarea>
                </div>
            </div>
            {{ Form::submit('Product bewerken', ['class' => 'btn btn-success']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection