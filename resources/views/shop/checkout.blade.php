@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-sm-12">
                <div class="row">
                    @if(Session::has('cart'))
                        <h3>Bestelling</h3>
                        <div class="clearfix"></div>
                        <hr>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Naam</th>
                                <th scope="col">Aantal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{ucfirst($product['item']['type'])}} {{$product['item']['name']}}</th>
                                    <td>{{$product['qty']}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th scope="row"></th>
                                <td class="font-weight-bold">Totaal prijs:
                                    @if($totalPrice <= 9 ? $totalPrice++ : $totalPrice)
                                        €{{number_format($totalPrice, 2, '.', ',')}}
                                    @endif
                                    {{--€{{number_format($totalPrice, 2, '.', ',')}}</td>--}}
                            </tr>
                            </tbody>
                        </table>
                        <a href="{{route('products.shoppingCart')}}">Bewerk winkelwagen</a>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="col-12">
                    <h3>Gegevens</h3>
                    <div class="clearfix"></div>
                    <hr>
                    {{ Form::open(['files' => true, 'route' => 'checkout']) }}
                    <div class="form-group row">
                        <label for="example-text-input" class="col-3 col-form-label control-label">Naam</label>
                        <div class="col-9">
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" value=""
                                   id="example-text-input" name="name" required>
                            @if(count($errors) > 0)
                                <span class="help-block text-danger">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-3 col-form-label control-label">Tussenvoegsel</label>
                        <div class="col-9">
                            <input class="form-control {{ $errors->has('tussenvoegsel') ? 'is-invalid' : '' }}" type="text" value=""
                                   id="example-text-input" name="tussenvoegsel">
                            @if(count($errors) > 0)
                                <span class="help-block text-danger">
                                    {{ $errors->first('tussenvoegsel') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-3 col-form-label control-label">Achternaam</label>
                        <div class="col-9">
                            <input class="form-control {{ $errors->has('surname') ? 'is-invalid' : '' }}" type="text" value=""
                                   id="example-text-input" name="surname">
                            @if(count($errors) > 0)
                                <span class="help-block text-danger">
                                    {{ $errors->first('surname') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-3 col-form-label control-label">Telefoonnummer</label>
                        <div class="col-9">
                            <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                                   id="example-text-input" name="phone" required>
                            @if(count($errors) > 0)
                                <span class="help-block text-danger">
                                    {{ $errors->first('phone') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-3 col-form-label control-label">Email</label>
                        <div class="col-9">
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text"
                                   id="example-text-input" name="email">
                            @if(count($errors) > 0)
                                <span class="help-block text-danger">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-3 col-form-label control-label">Adres</label>
                        <div class="col-9">
                            <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" placeholder="voorbeeldstraat 15A"
                                   id="example-text-input" name="address" required>
                            @if(count($errors) > 0)
                                <span class="help-block text-danger">
                                    {{ $errors->first('address') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-3 col-form-label control-label">Postcode</label>
                        <div class="col-9">
                            <input class="form-control {{ $errors->has('postalcode') ? 'is-invalid' : '' }}" type="text" placeholder="1333 HG"
                                   id="example-text-input" name="postalcode" required>
                            @if(count($errors) > 0)
                                <span class="help-block text-danger">
                                    {{ $errors->first('postalcode') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-3 col-form-label control-label">Opmerking</label>
                        <div class="col-9">
                                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" placeholder="Extra kaas"
                                              id="example-text-input" name="description"></textarea>
                        </div>
                    </div>
                    {{ Form::submit('Bestellen', ['class' => 'btn btn-success pull-right']) }}
                    {{ Form::close() }}
                </div>
            </div>
            @else
                @if($bestelingOke != 1)
                    <div class="row">
                        <h2>Winkelmandje is leeg!</h2>
                    </div>
                @else
                    <div class="col-12 alert alert-success bestellingOke">
                        <h2>Beste {{ucfirst($order->name)}}, bedankt voor het bestellen!</h2>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Naam</th>
                                <th scope="col">Prijs</th>
                                <th scope="col">Aantal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->cart->items as $item)
                                <tr>
                                    <th scope="row">{{$item['item']['name']}}</th>
                                    <td>€ {{number_format($item['price'], 2, '.', ',')}}</td>
                                    <td>{{$item['qty']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection