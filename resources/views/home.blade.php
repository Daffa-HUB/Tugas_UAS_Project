@extends('layout.shared')

@section('style')

<link rel="stylesheet" href="{{ asset('/css/home.css') }}"/>
@endsection

@section('title','Home')

@section('content')
    <section class="banner">
        <h1>Kedai mie&Kopi 99</h1>
    </section>
    <section style="height: 32em" class="about d-flex justify-content-center">
        <h3>Tentang kami</h3>
        <p>Kami menyediakan makanan dan minuman ala khas kedai dan juga tempat yang nyaman untuk bersantai maupun berkumpul</p>
    </section>
    <section class="d-flex flex-column align-items-center mt-3">
        <div class="d-flex flex-column w-100">
            <div class="row d-flex flex-row w-50 justify-content-center">
            <a href="/food" class="w-100 p-0">
                <div class="column w-100" style="background-image: url(images/imresizer-1736000853765.jpg)">
                    <h2 class="menu">Makanan</h2>
                </div>
            </a>
    </section>
    <br/>
    <br/>
    <section class="d-flex flex-column align-items-center mt-3">
            </div>
            <div class="row">
                <a href="/dessert" class="w-50 p-0">
                    <div class="column w-100" style="background-image: url(images/bbe17d0b-34c0-44d3-8373-c53c7a5dee91.jpg)">
                        <h2 class="menu">Minuman</h2>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <br/>
    <br/> <br/>
    <br/>

@endsection
