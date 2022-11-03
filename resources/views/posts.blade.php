@extends('layouts.main')

@section('container')

    <h1 class="mb-5 text-center">{{ $title }}</h1>

    @if ($posts->count())
    <div class="container">
        <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-3">
                        <div class="card m-2">
                            @if ($post->image)
                            <div style="max-height:500px; overflow:hidden">
                                <img src="{{ asset('storage/' . $post->image) }}" class="border p-3 img-fluid">
                            </div>
                            @else
                                <img src="https://source.unsplash.com/300x300?{{ $post->category->name }}" class="border p-3 img-fluid">
                            @endif

                            {{-- <img src="https://source.unsplash.com/300x300?{{ $post->category->name }}" class="card-img-top" alt="..."> --}}
                            <div class="card-body">
                                <a href="/post/{{ $post->slug }}" class="text-decoration-none">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                </a>
                                <p>Seller : <a href="/sellers/{{ $post->seller->username }}"  class="text-decoration-none">{{ $post->seller->username }}</a></p>
                                <p><a href="/categories/{{ $post->category->slug}}" class="text-decoration-none"> {{ $post->category->name }} </a></p>
                                <h5>Rp. {{ $post->price }}</h5>
                                <small>{{ $post->stock }}</small>
                                <br>
                                <a href="/post/{{ $post->slug }}" class="btn btn-primary">More detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @else
        <p class="text-center fs-4">No Post Found</p>
        @endif

        {{-- <div class="d-flex justify-content-center mt-4">
            {{ $posts->links() }}
        </div> --}}
    </div>





@endsection
