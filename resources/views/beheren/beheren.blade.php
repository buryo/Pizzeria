@extends('layouts.master')

@section('content')
<div class="container m-t-100 m-b-100">
    <h3 class="position-absolute">Gerecht soorten</h3>
    <h4 class="pull-right custom-title"><a class="std-a" href="{{route('beheren.nieuweProduct')}}"><i class="fa fa-plus-square"></i> Nieuw gerecht toevoegen</a></h4>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Soort</th>
            <th scope="col">Aantal</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">Pizza's</th>
            <td>{{$pizza}}</td>
            <td><a href="/beheren/pizza">Bewerken</a></td>
        </tr>
        <tr>
            <th scope="row">Pasta's</th>
            <td>{{$pasta}}</td>
            <td><a href="/beheren/pasta">Bewerken</a></td>
        </tr>
        <tr>
            <th scope="row">Ovenschotels</th>
            <td>{{$ovenschotel}}</td>
            <td><a href="/beheren/ovenschotel">Bewerken</a></td>
        </tr>
        <tr>
            <th scope="row">Broodjes</th>
            <td>{{$broodje}}</td>
            <td><a href="/beheren/broodje">Bewerken</a></td>
        </tr>
        <tr>
            <th scope="row">Salades</th>
            <td>{{$salade}}</td>
            <td><a href="/beheren/salade">Bewerken</a></td>
        </tr>
        <tr>
            <th scope="row">Vleesgerechten</th>
            <td>{{$vleesgerecht}}</td>
            <td><a href="/beheren/vleesgerecht">Bewerken</a></td>
        </tr>
        <tr>
            <th scope="row">Visgerechten</th>
            <td>{{$visgerecht}}</td>
            <td><a href="/beheren/visgerecht">Bewerken</a></td>
        </tr>
        <tr>
            <th scope="row">Desserts</th>
            <td>{{$dessert}}</td>
            <td><a href="/beheren/dessert">Bewerken</a></td>
        </tr>
        <tr>
            <th scope="row">Dranken</th>
            <td>{{$drank}}</td>
            <td><a href="/beheren/drank">Bewerken</a></td>
        </tr>
        </tbody>
    </table>
</div>
@endsection