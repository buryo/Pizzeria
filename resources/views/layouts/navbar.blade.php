@if(Route::getCurrentRoute()->uri() == '/')
    <nav class="navbar navbar-expand-lg green-custom">
        @else
            <nav class="navbar navbar-expand-lg green-custom m-b-2rem">
                @endif

                <div class="container">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler navbar-dark gray-custom" type="button" data-toggle="collapse"
                            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav text">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('products.getAllProducts', 'pizza')}}">Pizza</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('products.getAllProducts', 'pasta')}}">Pasta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('products.getAllProducts', 'ovenschotel')}}">Ovenschotels</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('products.getAllProducts', 'drank')}}">Dranken</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav text ml-auto">
                            <li class="nav-item pull-right">
                                <a class="nav-link" href="{{route('getActies')}}">
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    Acties
                                </a>
                            </li>

                            <li class="nav-item pull-right">
                                <a class="nav-link" href="{{route('products.shoppingCart')}}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    Winkelwagen
                                    <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                                </a>
                            </li>
                            @if (Route::has('login'))
                                @auth
                                    <li class="nav-item pull-right dropdown">
                                        <a id="navbarDropdown" class="nav-link-color dropdown-toggle" href="#"
                                           role="button" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                            <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('bestellingen.index') }}">
                                                {{__('Bestellingen')}}
                                            </a>

                                            <a class="dropdown-item" href="{{ route('beheren.index') }}">
                                                {{__('Beheren')}}
                                            </a>

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>