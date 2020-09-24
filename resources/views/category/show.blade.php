@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1 class="name">Shop {{$consumer}}'s Gear</h1>
        <p class="description">Opt for a charming yet laid-back look with cool T-shirts and casual shirts worn with
            stylish jeans, casual trousers or shorts. Stay sharp and sophisticated with our smart options in formal
            shirts and trousers.
        </p>
        <div class="category_titles_box">
            @foreach($categories as $category)
                <div class="d-inline-block category_titles">
                    <a class="nav-link active" href="#">{{ $category }}</a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container-fluid category_page pt-5">
        <div class="row">
            <div class="col-6 banner_right p-5" style="padding: 0">
                <img src="{{ asset('images/home/banner3.jpg') }}" class="w-100" />
            </div>
            <div class="col-6 p-5">
                <div class="info" style="">
                    <div class="subheadline" style="">
                        <p>BRING IT ON —</p>
                    </div>
                    <div class="title" style="">
                        <p>{{$consumer}}'s New Arrivals</p>
                    </div>
                    <div class="description">The best time of year is right around the corner.
                        Make sure you're ready to ride when the white stuff begins to fall.
                    </div>
                    <div class="buttons">
                        <div class="shop_men" style="">
                            <a class="banner_btn" href="#">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
