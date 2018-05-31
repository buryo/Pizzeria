@extends('layouts.master')

@section('content')
    <div class="container m-t-100 m-b-100">
        <h3 class="position-relative custom-title">Bestellingen</h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr class="order-table">
                <th class="th-7" scope="col">Bestelling</th>
                <th class="th-14" scope="col">Naam</th>
                <th class="th-14" scope="col">Adres</th>
                <th class="th-12" scope="col">Telefoon</th>
                <th class="th-20" scope="col">Bestelling</th>
                <th scope="col">Opmerking</th>
                <th scope="col"><i class="fa fa-check-circle"></i></th>
            </tr>
            </thead>
            <tbody class="order">
            @foreach($orders as $order)
                {{-- progress == 1 means order completed, else it isn't completed--}}
                <tr {{$order->progress == '1' ? 'class = order-red' : 'class = order-green'}}>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->name . ' ' .$order->tussenvoegsel . ' ' .$order->surname}} </td>
                    <td>{{ucfirst($order->address) . ' ' . $order->postalcode}}</td>
                    <td>{{$order->phone}}</td>
                    <td>@foreach($order->cart->items as $item)
                            {{--Gets ordered items, type, name x quantity--}}
                            -{{ucfirst($item['item']['type'])}} {{$item['item']['name']}} x {{ $item['qty'] }} <br>
                        @endforeach
                    </td>
                    <td>{{$order->description}}</td>
                    {{--make order completed/not completed--}}
                    <td><a href="{{route('bestellingProgress',['id' => $order->id])}}">
                            <i class="fa {{$order->progress == '1' ? 'fa-times-circle' : 'fa-check-circle'}}"></i>
                        </a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{-- used for pagination --}}
        {{ $orders->links() }}
    </div>
    <audio id="bestelling-mp3" src="{{{ asset('bel.mp3') }}}"></audio>
@endsection