@extends('layouts.app')

@section('content')

{{--    Banner Section--}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 banner_left">
                <div class="banner_new_arrival" style="">
                    <div class="title" style="">
                        <p>New Arrivals</p>
                    </div>
                    <div class="body" style="">
                        Free shipping on all orders
                    </div>
                    <div class="buttons text-center">
                        <div class="shop_men" style="">
                            <a class="banner_btn">Shop Men</a>
                        </div>
                        <div class="shop_women" style="">
                           <a class="banner_btn" >Shop Women</a>
                       </div>
                    </div>
                </div>
            </div>
            <div class="col-6" style="padding: 0">
                <img src="{{ asset('images/banner3.jpg') }}" class="w-100" />
            </div>
        </div>
    </div>

{{--    New Section--}}
    <div class="new_product_listing" style="background-color: #F5F5F5">
        <div class="container-fluid pt-3">
            <div class="row mx-5">
                <div class="col-6 col-md-3">
                    <div class="container-fluid">
                        <div>
                            <a href="#" class="product-image-wrap">
                                <img src="https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/10808284/2019/10/30/c35d059d-a357-4863-bcb1-eacd8c988fb01572422803188-AHIKA-Women-Kurtas-8841572422802083-1.jpg"
                                     class="w-100" />
                            </a>
                        </div>
                        <div class="">
                            <a href="#" class="">
                                <div class="">
                                    <h2 class="product_name">Women Green & Off-White Floral Printed Straight Kurta</h2>
                                </div>
                                <div class="product_price">
                                    <span class="standard-price">$749.95</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="container-fluid">
                        <div>
                            <a href="#" class="product-image-wrap">
                                <img src="https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/10808284/2019/10/30/c35d059d-a357-4863-bcb1-eacd8c988fb01572422803188-AHIKA-Women-Kurtas-8841572422802083-1.jpg"
                                     class="w-100" />
                            </a>
                        </div>
                        <div class="">
                            <a href="#" class="">
                                <div class="">
                                    <h2 class="product_name">Women Green & Off-White Floral Printed Straight Kurta</h2>
                                </div>
                                <div class="product_price">
                                    <span class="standard-price">$749.95</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="container-fluid">
                        <div>
                            <a href="#" class="product-image-wrap">
                                <img src="https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/10808284/2019/10/30/c35d059d-a357-4863-bcb1-eacd8c988fb01572422803188-AHIKA-Women-Kurtas-8841572422802083-1.jpg"
                                     class="w-100" />
                            </a>
                        </div>
                        <div class="">
                            <a href="#" class="">
                                <div class="">
                                    <h2 class="product_name">Women Green & Off-White Floral Printed Straight Kurta</h2>
                                </div>
                                <div class="product_price">
                                    <span class="standard-price">$749.95</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="container-fluid">
                        <div>
                            <a href="#" class="product-image-wrap">
                                <img src="https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/10808284/2019/10/30/c35d059d-a357-4863-bcb1-eacd8c988fb01572422803188-AHIKA-Women-Kurtas-8841572422802083-1.jpg"
                                     class="w-100" />
                            </a>
                        </div>
                        <div class="">
                            <a href="#" class="">
                                <div class="">
                                    <h2 class="product_name">Women Green & Off-White Floral Printed Straight Kurta</h2>
                                </div>
                                <div class="product_price">
                                    <span class="standard-price">$749.95</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-5 pt-5">
                <div class="container-fluid">
                    <div class="col-md-12 new_arrivals">
                        <div class="new_arrivals_text">
                            <div class="new_arrivals-subtitle">
                                <p>New Items Just Added</p>
                            </div>
                            <div class="new_arrivals-title">
                                <p>Grab Items now!</p>
                            </div>
                            <div class="new_arrivals-button">
                                <a href="#">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--Best Seller--}}
    <div class="best_seller" style="background-color: #F5F5F5">
        <div class="container-fluid">
            <div class="best_seller_text">
                <div class="best_seller_title">
                    Best Sellers
                </div>
                <div class="best_seller_body">
                    Shop this season's most popular styles for men, women and kids.
                </div>
            </div>
            <div class="row mx-5">
                <div class="col-6 col-md-4">
                    <div class="container-fluid">
                        <div class="image_wrapper">
                            <a href="#" class="product-image-wrap">
                                <img src="{{ asset('images/women.png') }}"
                                     class="w-100" />
                            </a>
                        </div>
                        <div class="product_type">
                            <a href="#"><strong><u>Women's</u></strong></a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="container-fluid">
                        <div class="image_wrapper">
                            <a href="#" class="product-image-wrap">
                                <img src="{{ asset('images/men.jpg') }}"
                                     class="w-100" />
                            </a>
                        </div>
                        <div class="product_type">
                            <a href="#"><strong><u>Men's</u></strong></a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="container-fluid">
                        <div class="image_wrapper">
                            <a href="#" class="product-image-wrap">
                                <img src="{{ asset('images/kids.jpg') }}"
                                     class="w-100" />
                            </a>
                        </div>
                        <div class="product_type">
                            <a href="#"><strong><u>Kid's</u></strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
