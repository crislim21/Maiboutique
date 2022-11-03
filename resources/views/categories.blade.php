@extends('layouts.main')

@section('container')
    <h1 class="mb-5 text-center mt-3">Fashion Styles</h1>
    <div class="container">
        <div class="row">
            @foreach ( $categories as $category)
            <div class="col-md-6">
                <div class="card mb-3 ">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <a href="/categories/{{ $category->slug}}">
                            <img src="{{ asset('storage/' . $category->image) }}" class="img-fluid rounded-start" alt="{{ $category->name }}">
                        </a>
                      </div>

                      <div class="col-md-8 text-center align-items-center d-flex">
                        <div class="card-body">
                          <h5 class="card-text">
                            <a href="/categories/{{ $category->slug}}" class="text-decoration-none">{{ $category->name }}</a>
                          </h5>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>




@endsection
