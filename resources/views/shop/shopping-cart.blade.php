@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.menukaart')
            <div class="col-lg-9">
                <div class="row">
                    @if(Session::has('cart'))
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Gerecht</th>
                                <th>Aantal</th>
                                <th class="text-center">Prijs</th>
                                <th class="text-center">Totaal</th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--product--}}
                            @foreach($products as $product)
                                <tr>
                                    <td class="col-3 first-td">
                                        <h5 class="media-heading ">{{$product['item']['name']}}</h5>
                                    </td>

                                    <td class="">
                                        {{--{{ Form::open(['route' => ['changeQuantity', $product['item']['id'], ]]) }}--}}
                                        <a href="{{route('quantityMinusOne', ['id' => $product['item']['id']])}}"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                            {{$product['qty']}}
                                        <a href="{{route('quantityPlusOne', ['id' => $product['item']['id']])}}"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                            {{--<input type="number" onchange="this.form.submit()" name="quantity" class="form-control" value="{{$product['qty']}}">--}}
                                        {{--{{ Form::close() }}--}}
                                    </td>
                                    <td class="text-center"><strong>€ {{number_format($product['item']['price'], 2, '.', ',')}}</strong>
                                    </td>
                                    <td class="text-center"><strong>€ {{number_format($product['price'], 2, '.', ',')}}</strong></td>
                                    <td class="">
                                        <a href="{{route('destroyItem', ['id' => $product['item']['id']])}}" type="button" class="btn btn-sm btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span> Verwijderen
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            {{--product--}}
                            <tr>
                                <td>Bestellingen boven de 9 euro worden gratis thuis bezorgd<br>
                                    Bij een bestelling boven de 30 euro, een fles wijn gratis!</td>
                                <td>  </td>
                                <td>  </td>
                                <td><h3>Totaal</h3></td>
                                <td class="text-right"><h3><strong>€{{number_format($totalPrice, 2, '.', ',')}}</strong></h3></td>
                            </tr>
                            <tr>
                                <td><a href="{{route('destroy')}}" type="button" class="btn btn-danger">
                                        Winkelwagen leeg maken <span class="glyphicon glyphicon-play"></span>
                                    </a>  </td>
                                <td>  </td>
                                <td>  </td>
                                <td>
                                <td>
                                    <a href="{{route('checkout')}}" type="button" class="btn btn-success">
                                        Bestellen <span class="glyphicon glyphicon-play"></span>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    @else
                        <div class="row">
                            <h2>Winkelmandje is leeg!</h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection