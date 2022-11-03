@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex  align-items-center">
    <div class="col-lg-8 border p-3 mt-2 main-section bg-white ">
        <div class="row hedding m-0 pl-3 pt-0 pb-3 ">
            <h2>{{ $post->title }}</h2>
        </div>
        <div class="row mt-0 ">
            <div class="col-lg-5 left-side-product-box pb-3">
                @if ($post->image)
                <div style="max-height:500px; overflow:hidden">
                    <img src="{{ asset('storage/' . $post->image) }}" class="border p-3 img-fluid">
                </div>
                @else
                    <img src="https://source.unsplash.com/300x300?{{ $post->category->name }}" class="border p-3 img-fluid">
                @endif

            </div>
            <div class="col-lg-7">
                <div class="right-side-pro-detail border p-3 m-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <span>By . <a href="/sellers/{{ $post->seller->username }}" class="text-decoration-none"></a>{{ $post->seller->username }}</span>
                            <p class="m-0 p-0">Women's Velvet Dress</p>
                        </div>
                        <div class="col-lg-12">
                            <p class="m-0 p-0 price-pro">Rp. {{ $post->price }}</p>
                            <hr class="p-0 m-0">
                        </div>
                        <div class="col-lg-12 pt-2">
                            <h5>Product Detail</h5>
                            <span>{!! $post->description !!}</span>
                            <hr >
                        </div>
                        <div class="col-lg-12">
                            <p class="tag-section "><strong>Tag : </strong>
                                <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
                            </p>
                        </div>

                        <div class="col-lg-12">
                            <h6>Stock :</h6>
                            <input type="number" class="form-control text-center w-100" value="{{ $post->stock }}">
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
