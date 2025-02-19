@extends('layout.shared')
@section('title','Product Detail')


@section('style')
<link rel="stylesheet" href="{{ asset('/css/productDetail.css') }}"/>

@endsection

@section('content')
@if($product)
<div class="product_box d-flex justify-content-center">
  <div class="img-box">
    @if (Storage::disk('public')->exists($product->image))
      <img src="{{Storage::url($product->image)}}" alt="product-image">
    @else
      <img src="{{$product->image}}" alt="product-image">
    @endif
  </div>
  <div class="container m-0">
    <div class="info">
      <div class="title mb-0">
        <h3 class="mb-0" style="line-height: .8">{{$product->name}}</h3>
      </div>
      <div class="price">
        <p> Rp. {{$product->price}}</p>
        
      </div>
      <div class="more">
        <p>{{$product->description}}</p>
      </div>
     
     
      
  
    @if(!(Session::get('user')))
    <a href="/login">
      <div class="btn btn-warning btn-lg">
        Login to Buy
      </div>
    </a>
    @endif
  
    @if(Session::get('user') && Session::get('user')['role']==='admin')
    <a href="/updateItem/{{$product->id}}">
      <div class="btn btn-warning btn-lg">Update Item</div>
    </a>
    @endif
  
    @if(Session::get('user') && Session::get('user')['role']==='customer')
    
    <div class="form_quantity">
  
  
      <form action="/addcart" method="post" class="qty-form ">
        @csrf
  
          <input type="hidden" name="id" value="{{$product->id}}">
         
          <input class="form-control mb-2 mr-3 @error('quantity') is-invalid  @enderror" type="number" name="quantity" min="1" max="100" value="{{old('quantity')}}" style="font-size: 15px; width: 5em">
  
            
        <button class="btn btn-success btn-sm" type="submit" style="width: 22em; height: 6.5em;">
          <h5>
            Add to Cart
          </h5>
        </button>
  
        @error('quantity')
        
          <small class="error-message">
            {{$message}}
          </small>
        @enderror
        @if(session()->has('success'))
          <div class="alert alert-success mt-4">
              {{ session()->get('success') }}
          </div>
      @endif 
        
      </form>
    </div>
    </div>
    @endif
  
  
  
  </div>
</div>

@else
<div class="h1">
  Produk tidak tersedia
</div>
@endif

@endsection