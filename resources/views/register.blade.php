@extends('layout.shared')
@section('title','Register')
@section('style')
    <link rel="stylesheet" href="{{ asset('/css/register.css') }}"/>
@endsection

@section('content')

    <section style="background-color: #201e1e; height: 70em">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
              <div class="card-body p-0">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 p-5">
    
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
    
                    <form action="/register" method="post">
                      @csrf
    
                      <div class="mb-4">
                        <label for="fullname" class="form-label">Full name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter fullname">
                      </div>
    
                      <div class="mb-4">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                      </div>
    
                      <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      </div>
    
                      <div class="mb-4">
                        <label for="confirmPassword" class="form-label">Confirm password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                      </div>
                      
                      <div class="d-flex flex-column align-items-start mx-4 mb-3 mb-lg-4">
                        <p class="mb-2">Already have an account? <a href="/login">Login</a></p>
                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        @if($errors->any())
                        <div class="alert alert-danger mt-4" role="alert" style="width: 100%">
                            {{$errors->first()}}
                        </div>
                        @elseif(session()->has('success_message'))
                        <div class="alert alert-success" style="width: 100%">
                            {{ session()->get('success_message') }}
                        </div>
                        @endif   
                      </div>
    
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
