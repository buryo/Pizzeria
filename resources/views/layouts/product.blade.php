@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            @include('layouts.menukaart')

            <div class="col-lg-9">
                @foreach($productLinks as $productLink => $v)
                    @foreach($v as $key => $value)
                        {{-- checking for the product type in the url. E.g "pizza.nl/bestellen/*pizza*" pizza is the second segment --}}
                        @if($value == Request::segment(2))
                            <div class="col-md-12 {{$value}}-jumbo product-jumbo">

                            </div>
                        @endif
                    @endforeach
                @endforeach
                <div class="row product-thumbnail">
                    @foreach($products->chunk(3) as $productChunk)
                        @foreach($productChunk as $product)
                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow">
                                    @if(!empty($product->image))
                                        <a class="flex-shrink-0" href="{{asset('images/products/' . $product->image)}}"
                                           data-lightbox="image-1"
                                           data-title="{{$product->name}}">
                                            {{-- Only these products are having an image --}}
                                            @if($product->type == 'pizza' || 'pasta' || 'vleesgerecht' || 'visgerecht')
                                                <img class="card-img-top"
                                                     src="{{asset('images/products/' . $product->image)}}"
                                                     alt="Card image cap">
                                            @endif
                                            @endif
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title font-weight-bold">{{$product->id}}
                                                . {{$product->name}}</h5>
                                            <p class="card-text comment more">
                                                {{-- If description length is > 100 characters, it will minimize. Doesn't work completely yet, but I will work on this --}}
                                                @if(strlen($product->description) > 100)
                                                    {{ $product->shortdescription = substr($product->description, 0, 100) . '...' }}
                                                    <span class="hidden">
                                                        {{$product->description}}
                                                    </span>
                                                    <span class="lees-meer" data-toggle="modal"
                                                          data-target="#myModal"><i
                                                                class="fa fa-arrow-right"
                                                                aria-hidden="true"></i>meer</span>
                                                @else
                                                    {{ $product->description }}
                                                    {{--End description length 100--}}
                                                @endif
                                                <span class="hidden">
                                                {{$product->description}}
                                            </span>
                                            <h5 class="position-absolute prijs-home-page">€{{$product->price}}</h5>
                                            <div class="btn-group pull-right btn-add">
                                                <a href="{{route('products.addToCart', ['id' => $product->id])}}"
                                                   type="button" class="btn btn-sm btn-success">Toevoegen</a>
                                            </div>
                                        </div>
                                </div>
                            </div>

                        {{-- if description length > 100. This dialog modal will be enabled--}}
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
                        {{-- end description length div--}}
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection