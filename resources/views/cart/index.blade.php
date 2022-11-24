@extends('layouts.main')

@section('container')
    <h1 class="mb-5 text-center mt-3">My Cart</h1>

    @if(session()->has('success'))
    <div class="alert alert-success d-flex justify-content-center w-100" role="alert">
        {{ session('success') }}
    </div>
    @endif


    <div class="row">
        <div class="col-sm-2 ms-auto">
            @php
                $total = 0;
            @endphp
            @foreach ($cart as $item)
                @php
                    $total += $item->sub_total
                @endphp
            @endforeach

            <a class="text-decoration-none text-dark">Total Price: Rp. {{ $total }}</a>
            <a href="" class="text-decoration-none btn btn-primary">Check Out</a>
        </div>
    </div>

    @if ($cart->count())
        <div class="container mt-2">
            <div class="row">
                @foreach ($cart as $item)
                    <div class="col-md-3">
                        <div class="card m-2">
                            @if ($item->image)
                                <div style="max-height:500px; overflow:hidden">
                                    <img src="{{ asset('storage/' . $item->image) }}" class="border border-0 p-3 img-fluid">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/300x300?{{ $item->product_name }}" class="border border-0 p-3 img-fluid">
                            @endif

                            <div class="card-body">

                                <h4 class="card-title text-decoration-none text-dark">{{ $item->product_name }}</h5>

                                <p class="font-weight-normal">Rp. {{ $item->price }}</p>
                                <small class="mb-2">Qty: {{ $item->quantity }}</small>
                                <br>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="/cart/product/{{ $item->id }}" class="btn btn-primary">Edit Cart</a>
                                        </div>
                                        <div class="col-lg-8">
                                            <form action="/cart/product/{{ $item->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger w-100" onclick="return confirm('Are you sure delete this product from Cart ?')">Remove from Cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No Cart Listed</p>
    @endif







@endsection
