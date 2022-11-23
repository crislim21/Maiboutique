@extends('layouts.main')

@section('container')

    <h1 class="mb-5 text-center mt-3">Edit Cart</h1>


<div class=" d-flex justify-content-center align-items-center">
    <div class="col-lg-8 border p-3 main-section bg-white ">
        <div class="row m-0">
            <div class="col-lg-4 left-side-product-box pb-3">
                @if ($item->image)
                    <div style="max-height:500px; overflow:hidden">
                        <img src="{{ asset('storage/' . $item->image) }}" class="border border-0 p-3 img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/300x300?" class="border border-0 p-3 img-fluid">
                @endif
            </div>

            <div class="col-lg-8">
                <div class="right-side-pro-detail border p-3 m-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>{{ $item->title }}</h1>
                        </div>
                        <div class="col-lg-12">
                            <h3>Rp. {{ $item->price }}</h3>
                            <hr class="p-0 m-0">
                        </div>
                        <div class="col-lg-12 pt-2">
                            <h5>Product Detail</h5>
                            <span>{!! $item->description !!}</span>
                            <hr >
                        </div>


                        @auth
                            @can('member')
                                <div class="col-lg-12">
                                    <h6>Quantity :</h6>
                                    <form action="/cart/product/{{ $cart->id }}" method="post">
                                    @csrf
                                    @method('put')
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control text-center" name ="quantity" min=1 value="{{ $cart->quantity }}">
                                            </div>
                                            <div class="col-lg-6">
                                                <button type="submit" class="btn btn-success w-100" type="submit">Update Cart</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="row">
                                        <div class="col-lg-6 pb-2">
                                            <a href="/cart" class="btn btn-danger w-100">Back</a>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                        @endauth
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




@endsection
