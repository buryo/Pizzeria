<div class="col-lg-3 menukaart">
    <h1 class="my-4 oswald-400 text-center">MENU<br>
        <img src="{{asset('/snor.png')}}" alt="">
    </h1>

    <div class="list-group m-b-100">
        <a href="{{route('products.getAllProducts', 'pizza')}}" class="nav-link list-group-item">Pizza</a>
        <a href="{{route('products.getAllProducts', 'pasta')}}" class="nav-link list-group-item">Pasta</a>
        <a href="{{route('products.getAllProducts', 'ovenschotel')}}" class="nav-link list-group-item">Ovenschotels</a>
        <a href="{{route('products.getAllProducts', 'salade')}}" class="nav-link list-group-item">Salades</a>
        <a href="{{route('products.getAllProducts', 'vleesgerecht')}}" class="nav-link list-group-item">Vleesgerechten</a>
        <a href="{{route('products.getAllProducts', 'visgerecht')}}" class="nav-link list-group-item">Visgerechten</a>
        <a href="{{route('products.getAllProducts', 'broodje')}}" class="nav-link list-group-item">Broodjes</a>
        <a href="{{route('products.getAllProducts', 'dessert')}}" class="nav-link list-group-item">Dessert</a>
        <a href="{{route('products.getAllProducts', 'drank')}}" class="nav-link list-group-item">Dranken</a>
    </div>

    <h1 class="my-4">Openingstijden</h1>
    <div class="list-group m-b-100">
        <p class="black-bold text-center list-group-item">
            Wij zijn elke dag open!
        </p>
        <p class="black-bold text-center list-group-item">
            Maandag t/m zondag <br>
            16:00 - 21:30
        </p>
    </div>
</div>