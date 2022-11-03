@extends('layouts.main')

@section('container')
<div class="jumbotron img-fluid text-light d-flex align-items-center justify-content-center text-center">
    <div class="">
        <h1 class=" lead display-1 "><b>Welcome To <u>MaiBoutique</u></b></h1>
        <p class="lead fs-1">Online Boutique that Provides You with Various Clothes to Suit Your Various Activities</p>
        @auth
        @else
        <a href="/login" CLASS="btn btn-primary">SIGN UP NOW</a>
        @endauth

    </div>
</div>
@endsection
