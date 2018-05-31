@extends('layouts.master')

@section('jumbotron')
    {{--jumbotron--}}
    <div class="jumbotron text-center align-middle">
        <div class="container jumbo-text">
            <p>
                <button type="button" class="btn order-btn btn-success my-2">Online bestellen</button>
            </p>
        </div>
    </div>
    {{--End jumbotron--}}
@endsection


@section('content')
    <div class="container">
        <div class="row">

            @include('layouts.menukaart')

            <div class="col-lg-9">
                <div class="col-md-12 pizza-jumbo product-jumbo">

                </div>
                <div class="row product-thumbnail">
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow actie-div">
                            <div class="card-body">
                                <h5 class="card-title actie" style="font-weight: bold">ACTIE!</h5>
                                <p class="card-text comment more"><span class="font-weight-bold">Maandag en zaterdag</span><br> pastadag € 7,50!</p>
                                <p class="card-text comment more"><span class="font-weight-bold">Dinsdag</span><br> Dönerdag <br>broodje € 4,00 <br>schotel € 7,00</p>
                                <p class="card-text comment more"><span class="font-weight-bold">Woensdag</span><br> pizzadag € 7,50!</p>
                            </div>
                        </div>
                    </div>
                    @foreach($products->chunk(3) as $productChunk)
                        @foreach($productChunk as $product)
                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow">
                                    <a style="flex-shrink:0;" href="{{asset('images/products/' . $product->image)}}"
                                       data-lightbox="image-1"
                                       data-title="Pizza sate">
                                        <img class="card-img-top" src="{{asset('images/products/' . $product->image)}}"
                                             alt="Card image cap">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-weight: bold">{{$product->id}}. {{$product->name}}</h5>
                                        <p class="card-text comment more">
                                            @if(strlen($product->description) > 100)
                                                {{ $product->shortdescription = substr($product->description, 0, 100) . '...' }}
                                                <span class="hidden">
                                                        {{$product->description}}
                                                    </span>
                                                <span class="lees-meer" data-toggle="modal" data-target="#myModal"><i
                                                            class="fa fa-arrow-right" aria-hidden="true"></i>meer</span>
                                            @else
                                                {{ $product->description }}
                                            @endif
                                            <span class="hidden">
                                                {{$product->description}}
                                            </span>
                                        {{--<span data-toggle="modal" data-target="#myModal">more</span>--}}
                                        <h5 class="position-absolute prijs-home-page">€ {{$product->price}}</h5>
                                        <div class="btn-group pull-right btn-add">
                                            <a href="{{route('products.addToCart', ['id' => $product->id])}}"
                                               type="button" class="btn btn-sm btn-success">Toevoegen</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Header-->
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel"></h4>
                                        </div>
                                        <!-- Body -->
                                        <div class="modal-body"></div>
                                        <!-- Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection