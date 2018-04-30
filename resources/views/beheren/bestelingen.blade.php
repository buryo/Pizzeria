@extends('layouts.master')

@section('content')
    <div class="container m-t-100 m-b-100">
        <h3 class="position-relative custom-title">Bestelingen</h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col" style="width:8%;">Besteling</th>
                <th scope="col" style="width:16%;">Naam</th>
                <th scope="col" style="width: 15%;">Adres</th>
                <th scope="col" style="width: 12%;">Telefoon</th>
                <th scope="col">Bestelling</th>
                <th scope="col">Opmerking</th>
                <th scope="col"><i class="fa fa-check-circle" style="font-size: 22px;"></i></th>
            </tr>
            </thead>
            <tbody class="order">
            @foreach($orders as $order)
                <tr {{$order->progress == '1' ? 'class = order-red' : 'class = order-green'}}>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->name . ' ' .$order->tussenvoegsel . ' ' .$order->surname}} </td>
                    <td>{{ucfirst($order->address) . ' ' . $order->postalcode}}</td>
                    <td>{{$order->phone}}</td>
                    <td>@foreach($order->cart->items as $item)
                            -{{ucfirst($item['item']['type'])}} {{$item['item']['name']}} x {{ $item['qty'] }} <br>
                        @endforeach
                    </td>
                    <td>{{$order->description}}</td>
                    <td><a href="{{route('bestellingProgress',['id' => $order->id])}}"><i class="fa {{$order->progress == '1' ? 'fa-times-circle' : 'fa-check-circle'}}" style="font-size: 22px;"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
    <audio id="bestelling-mp3" src="{{{ asset('bel.mp3') }}}"></audio>
@endsection