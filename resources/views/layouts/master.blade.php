<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pizzeria Osolemio Almere-buiten">
    <meta name="author" content="Pizzeria Osolemio">
    <title>
        @if(View::hasSection('title'))
            @yield('title')
        @else
            Pizzeria O'sole mio
        @endif
    </title>

    {{--google fonts--}}
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
    <link href="{{{ asset('favicon.png') }}}" rel="shortcut icon" type="image/x-icon" />
    <link href="{{URL::to('css/app.css')  }}" rel="stylesheet" type="text/css">
</head>
<div class="speaker speakerplay">
    <audio id="player" src="{{{ asset('solemio.mp3') }}}">
        <p>Fallback content goes here.</p>
    </audio>
</div>

@include('layouts.header')
@include('layouts.navbar')

@if(Route::getCurrentRoute()->uri() == '/' || '/home')
    @yield('jumbotron')
@endif

<main role="main">
    @yield('content')
</main>

<!-- Footer -->
@include('layouts.footer')
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/lightbox2.js') }}"></script>
<script>
    lightbox.option({
        'resizeDuration': 400,
        'wrapAround': false,
        fadeDuration: 300
    })
</script>
</body>
</html>