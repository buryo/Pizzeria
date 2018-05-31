@extends('layouts.master')

@section('content')
    <div class="container m-t-100 m-b-100">
        <h3 class="position-absolute">Bewerk {{$type}}</h3>
        <h4 class="pull-right custom-title"><a class="std-a" href="{{route('beheren.nieuweProduct')}}"><i
                        class="fa fa-plus-square"></i> Nieuw gerecht toevoegen</a></h4>
        <form method="post" action="{{route('beheren.bewerkenDeleteSelected', $type)}}">
            {{ csrf_field() }}
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">{{$type}} naam</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        {{-- All selected items will be send within the checkbox[] array--}}
                        <th scope="row"><input type="checkbox" name="checkbox[]"
                                               value="{{$product->id}}"> {{$product->name}}</th>
                        <td><a href="{{route('beheren.getSelectedProduct',[ 'type' => $type ,'id' => $product->id])}}">Bewerken</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="clearfix"></div>
            {{ Form::submit('Verwijderen', ['class' => 'btn btn-danger']) }}
        </form>
    </div>
@endsection