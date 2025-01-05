@extends('layout.shared')
@section('title','Login')
@section('style')
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}"/>
@endsection

@section('content')
<section style="background-color: #201e1e; height: 70em; display: flex; justify-content: center; align-items: center;">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-lg-6 col-xl-5">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-5">
            <p class="text-center h1 fw-bold mb-5">Login</p>

            <form action="/login" method="post">
              @csrf

              <div class="mb-4">
                <label class="form-label" for="email">Email address</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="{{((Cookie::get('email') !== null) ? Cookie::get('email') : '')}}">
              </div>

              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{((Cookie::get('password') !== null) ? Cookie::get('password') : '')}}">
              </div>

              <div class="mb-4">
                <input type="checkbox" class="form-check-input" id="remember" name="remember" {{Cookie::get('email') === null ? '':'checked'}}>
                <label class="form-check-label" for="remember">Remember me</label>
              </div>

              <div class="d-flex flex-column align-items-start">
                <p class="mb-2">Don't have an account yet? <a href="/register">Register</a></p>
                <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>

                @if($errors->any())
                <div class="alert alert-danger mt-3 w-100" role="alert">
                    {{$errors->first()}}
                </div>
                @elseif(session()->has('register_success'))
                <div class="alert alert-success mt-3 w-100">
                    {{ session()->get('register_success') }}
                </div>
                @endif
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
