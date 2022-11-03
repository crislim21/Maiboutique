@extends('layouts.main')

@section('container')
<div class="container py-2 h-100 vh-100">
    <div class="row d-flex justify-content-center align-items-center h-100 ">
      <div class="col-xl-12 ">
        <div class="card rounded-3  bg-dark text-light ">
          <div class="row g-0 ">
            <div class="col-lg-12 ">
              <div class="card-body p-md-5 mx-md-5 ">

                <div class="align-items-center">
                    <form action="/profile/update-password" method="post">
                    @method('put')
                    @csrf
                    <h3 class="mb-5">Edit Password</h3>

                    <div class="form-outline mb-4 textbox">
                        <label class="form-label" for="current_password">Current Password</label>
                        <input type="password" id="current_password" class="form-control @error('current_password')is-invalid @enderror"
                        name="current_password" placeholder="(5-20 letters)"  required/>

                          @error('current_password')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                    </div>

                    <div class="form-outline mb-4 textbox">
                        <label class="form-label" for="password">New Password</label>
                        <input type="password" id="password" class="form-control @error('password')is-invalid @enderror"
                        name="password" placeholder="(5-20 letters)" required  />

                          @error('password')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                    </div>

                    <div class="form-outline mb-4 textbox">
                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" class="form-control @error('password_confirmation')is-invalid @enderror"
                        name="password_confirmation" placeholder="(5-20 letters)" required  />

                          @error('password_confirmation')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                    </div>

                    <div class="pt-1 mb-4 pb-1">
                      <button class="btn btn-primary  mb-3 form-control bt" type="submit">Save Update</button>
                    </div>
                    </form>
                </div>
                <a href="/profile">
                    <button class="btn btn-primary  text-light">
                        Back
                    </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
