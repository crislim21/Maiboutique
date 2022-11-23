@extends('layouts.main')

@section('container')
<div class="container py-2 h-100 vh-100">
    <div class="row d-flex justify-content-center align-items-center h-100 ">
      <div class="col-xl-12 ">
        <div class="card rounded-3  bg-dark text-light ">
          <div class="row g-0 ">
            <div class="col-lg-6 ">
              <div class="card-body p-md-5 mx-md-5 ">



                <div class="d-flex justify-content-center align-items-center">
                    <form action="/register" method="POST">
                    @csrf
                    <h3 class="mb-5">Sign Up</h3>

                    <div class="form-outline mb-4 textbox">
                      <label class="form-label" for="username">Username</label>
                      <input type="text" id="username" class="form-control @error('username')is-invalid @enderror"
                        placeholder="(5-20 letters)" name="username" required value="{{ old('username') }}"/>

                      @error('username')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>

                    <div class="form-outline mb-4 textbox">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" class="form-control @error('email')is-invalid @enderror"
                        placeholder="" name="email"  required value="{{ old('email') }}"/>

                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                       </div>
                       @enderror
                      </div>

                    <div class="form-outline mb-4 textbox">
                      <label class="form-label" for="password">Password</label>
                      <input type="password" id="password" class="form-control @error('password')is-invalid @enderror"
                      name="password" placeholder="(5-20 letters)"  required />

                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4 textbox">
                        <label class="form-label" for="phonenumber">Phone Number</label>
                        <input type="text" id="phonenumber" class="form-control @error('phonenumber')is-invalid @enderror"
                        placeholder="(10-13 numbers)" name="phonenumber"  required value="{{ old('phonenumber') }}"/>

                        @error('phonenumber')
                        <div class="invalid-feedback">
                            {{ $message }}
                       </div>
                       @enderror

                    </div>

                    <div class="form-outline mb-4 textbox">
                        <label class="form-label" for="address">Address</label>
                        <input type="text" id="address" class="form-control @error('address')is-invalid @enderror"
                        placeholder="(min 5 letters)" name="address"  required value="{{ old('address') }}"/>

                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                       </div>
                       @enderror

                    </div>

                    <div class="pt-1 mb-4 pb-1">
                      <button class="btn btn-primary  mb-3 form-control bt" type="submit">Submit</button>
                    </div>
                    </form>
                </div>
                <div class="d-flex align-items-center justify-content-center pb-2">
                    <p class="mb-0 me-2">Already Registered? </p>
                    <a href="/login" class="btn text-light"><u>Sign In here</u></a>
                </div>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
              <img src="/img/sh.jpg" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
