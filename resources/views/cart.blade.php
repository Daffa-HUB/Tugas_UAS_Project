@extends('layout.shared')

@section('title', 'Cart')

@section('style')
<link rel="stylesheet" href="{{ asset('/css/cart.css') }}"/>
@endsection

@section('content')
<div class="container d-flex flex-row justify-content-center w-100 m-0 mt-5" style="height: 50em">
  <div style="width:55em">
    @if($cartitems && $cartitems->cartDetail()->count())
      @if(session()->has('success'))
      <div class="alert alert-dark alert-dismissible fade show d-flex" role="alert">
        <span>{{ session('success') }}</span>
        <button type="button" class="close bg-danger text-light border-1 border-danger ms-auto px-2 rounded" data-dismiss="alert" aria-label="Close">&times;</button>
      </div>
      @endif
      <table class="table table-striped cart-table mt-3">
        <thead class="thead-dark">
          <tr>
            <th>No</th><th>Gambar</th><th>Nama barang</th><th>Harga</th><th>Kuantitas</th><th>Harga total</th><th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($cartitems->cartDetail()->get() as $i => $detail)
          <form method="post">
            @csrf
            <tr>
              <th>{{ $i + 1 }}</th>
              <td>
                <img src="{{ Storage::disk('public')->exists($detail->item->image) ? Storage::url($detail->item->image) : $detail->item->image }}" alt="card-image" width="45" height="45">
              </td>
              <td>{{ $detail->item->name }}</td>
              <td>IDR {{ $detail->item->price }}</td>
              <td>{{ $detail->quantity }}</td>
              <td>IDR {{ $detail->quantity * $detail->item->price }}</td>
              <td>
                <input type="hidden" name="cart_id" value="{{ $detail->cart_id }}">
                <input type="hidden" name="item_id" value="{{ $detail->item_id }}">
                <a href="/updateCartQuantity/{{ $detail->item->id }}" class="btn btn-link btn-rounded btn-sm fw-bold text-decoration-none">Edit</a>
                <button formaction="/deleteCartItem" type="submit" class="btn btn-danger btn-sm">Delete</button>
              </td>
            </tr>
          </form>
          @endforeach
        </tbody>
      </table>
      <span style="font-size: 1.2rem">Total harga: <span class="grand-total">{{ $cartitems->sum }}</span></span>
    </div>
    <div class="checkout-form p-4" style="width: 22em;">
      <form action="/checkout" method="post">
        @csrf
        <h3>Credentials</h3>
        <input type="hidden" name="cart_id" value="{{ $cartitems->id }}">
        <div class="form-group">
          <label for="name">Receiver name</label>
          <input type="text" id="name" name="name" class="form-control" value="{{ Session::get('user')['username'] }}" placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="address">Receiver address</label>
          <input type="text" id="address" name="address" class="form-control" placeholder="Enter address">
        </div>
        <button class="btn btn-success btn-sm" type="submit" style="width: 175px;">Checkout ({{ $cartitems->ctr }})</button>
        @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
      </form>
    </div>
    @else
    <div class="d-flex flex-column align-items-center justify-content-center">
      <h1 class="text-center pt-5 mt-5">Belum ada pembelian</h1>
    </div>
    @endif
</div>
@endsection
