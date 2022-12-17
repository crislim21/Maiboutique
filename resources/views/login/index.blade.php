@extends('layouts.main')

@section('container')
<div class=" container py-2 vh-100">
    <div class="row d-flex justify-content-center align-items-center vh-100">
      <div class="col-xl-12 ">
        <div class="card rounded-3  bg-dark text-light ">
          <div class="row g-0 ">
            <div class="col-lg-6 ">
              <div class="card-body p-md-5 mx-md-4 ">

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


                <div class="d-flex justify-content-center align-items-center">
                  <form action="/login" method="post">
                    @csrf
                    <h3 class="mb-5">Sign In</h3>

                    <div class="form-outline mb-3 textbox">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" id="email" class="form-control @error('email') is-invalid @enderror "
                        placeholder="name@example.com" name="email" autofocus required
                        value="{{ old('email') }}"/>

                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-outline mb-3 textbox">
                      <label class="form-label" for="password">Password</label>
                      <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                      name="password" placeholder="5-20 characters" required/>

                      @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>

                    <div class="pb-2">
                        <input type="checkbox" id="remember" name="remember" class="form-check-input" value="1">
                        <label for="remember" class="form-check-label">Remember Me</label>
                    </div>


                    <div class="pt-1 mb-4 pb-1">
                      <button class="btn btn-primary  mb-3 form-control bt" type="submit">Sign In</button>
                    </div>


                </form>

            </div>
            <div class="d-flex align-items-center justify-content-center pb-2">
              <p class="mb-0 me-2">Not Registered yet?</p>
              <a href="/register" class="btn text-light"><u>Register here</u></a>
            </div>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center">
              <img src="/img/shirt.jpg" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
