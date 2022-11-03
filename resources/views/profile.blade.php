@extends('layouts.main')

@section('container')
  <div class="py-5 text-center container border mt-5 border-5">

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto border border-3 py-4">
        <h1 class="fw-light">My Profile</h1>
        <button class="btn btn-secondary disabled">{{ auth()->user()->role }}</button>
        <h5>username: {{ auth()->user()->username }}</h5>
        <span>{{ auth()->user()->email }}</span>
        <br>
        <span>Address: {{ auth()->user()->address }}</span>
        <br>
        <span>Phone: {{ auth()->user()->phonenumber }}</span>
      </div>
    </div>



    @can('admin')
    <div class="d-flex justify-content-center align-items-center">
        <a href="/profile/edit-password">
            <button class="btn border-primary mx-3 text-primary">
                Edit Password
            </button>
        </a>
    </div>
    @endcan
    
    @can('member')
    <div class="d-flex justify-content-center align-items-center">
        <a href="/profile/edit-profile">
            <button class="btn btn-primary ">
                Edit Profile
            </button>
        </a>

        <a href="/profile/edit-password">
            <button class="btn border-primary mx-3 text-primary">
                Edit Password
            </button>
        </a>
    </div>
    @endcan



  </div>




  {{-- <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}


@endsection
