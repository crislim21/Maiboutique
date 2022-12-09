@extends('layouts.main')

@section('container')




<div class=" d-flex justify-content-center align-items-center">
    <div class="col-lg-8 border p-3 main-section bg-white ">
        <div class="row hedding m-0 pl-3 pt-0 pb-3 ">
            <h2>{{ $post->title }}</h2>
        </div>
        <div class="row m-0">
            <div class="col-lg-4 left-side-product-box pb-3">
                @if ($post->image)
                    <div style="max-height:500px; overflow:hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" class="border border-0 p-3 img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/300x300?{{ $post->category->name }}" class="border border-0 p-3 img-fluid">
                @endif
            </div>

            <div class="col-lg-8">
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
                            <p class="tag-section "><strong>Tag : </strong><a href="/categories/{{ $post->category->slug }}" class="text-decoration-none"></a>{{ $post->category->name }}</p>
                        </div>

                        @auth
                            @can('member')
                                <div class="col-lg-12">
                                    <h6>Buy :</h6>
                                    <form action="{{ route('cart.store', $post->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control text-center" name ="quantity" min=1 value="1" max={{ $post->stock }}>
                                            </div>
                                            <div class="col-lg-6">
                                                <button type="submit" class="btn btn-success w-100">Add to Cart</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="row">
                                        <div class="col-lg-6 pb-2">
                                            <a href="/posts" class="btn btn-danger w-100">Back</a>
                                        </div>

                                    </div>
                                </div>
                            @endcan
                            @can('admin')
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a href="/posts" class="btn btn-danger w-100">Back</a>
                                        </div>
                                        <div class="col-lg-6">
                                            <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger form-control" onclick="return confirm('Are you sure delete this product?')">
                                                    Delete Item
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                        @else
                            <div class="col-lg-12">
                                <h6>Buy :</h6>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control text-center w-100" value="2">
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-success">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="row">
                                    <div class="col-lg-6 pb-2">
                                        <a href="/posts" class="btn btn-danger w-100">Back</a>
                                    </div>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




@endsection
