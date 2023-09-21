@extends('layouts.front_layout')

@section('content')
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel">
                        @foreach ($shuffled as $item)
                            <div class="single_banner_slider">
                                <div class="row">
                                    <div class="col-lg-5 col-md-8">
                                        <div class="banner_text">
                                            <div class="banner_text_iner">
                                                <h1>{{ $item->name }}</h1>
                                                <p>{{ $item->desc }}</p>
                                                <a href="{{ route('product.show', $item) }}" class="btn_2">buy
                                                    now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="banner_img d-none d-lg-block">
                                        <img src="{{ asset('storage/img/products/' . $item->image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-counter"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Featured Category</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                @foreach ($lastFourElements as $element)
                    <div class="col-lg-6 col-sm-6">
                        <div class="single_feature_post_text">
                            <p>Premium Quality</p>
                            <h3>{{ $element->name }}</h3>
                            <p>{{ $element->desc }}</p>
                            <a href="{{ route('product.show', $element) }}" class="feature_btn">EXPLORE NOW <i
                                    class="fas fa-play"></i></a>
                            <img src="{{ asset('storage/img/products/' . $element->image) }}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- product_list start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>awesome <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="">
                            <div class="row align-items-center justify-content-between">
                                @foreach ($products as $product)
                                    @if ($loop->iteration < 9)
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="single_product_item">
                                                <a href="{{ route('product.show', $product) }}">
                                                    <img src="{{ asset('storage/img/products/' . $product->image) }}"
                                                        alt="">
                                                </a>
                                                <div class="single_product_text">
                                                    <h4>{{ $product->name }}</h4>
                                                    <h3><b>${{ $product->price }}.00</b></h3>
                                                    <form action="{{ route('userProduct.store', [$product]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn add_cart" type="submit">
                                                            <a>+ add to cart</a>
                                                        </button>
                                                    </form>
                                                    {{-- <i class="ti-heart"></i> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part start-->

    <!-- awesome_shop start-->
    <section class="our_offer section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6">
                    <div class="offer_img">
                        <img src="{{ asset('storage/img/products/' . $products[0]->image) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="offer_text">
                        <h2>Weekly Sale on
                            60% Off All Products</h2>
                        <div class="date_countdown">
                            <div id="timer">
                                <div id="days" class="date"></div>
                                <div id="hours" class="date"></div>
                                <div id="minutes" class="date"></div>
                                <div id="seconds" class="date"></div>
                            </div>
                        </div>
                        <form action="{{ route('newsletter.send') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="enter email address"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2" name="email"
                                    id="email">
                                <div class="input-group-append">
                                    <button class="input-group-text btn_2" id="basic-addon2" type="submit">book
                                        now</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- awesome_shop part start-->

    <!-- product_list part start-->
    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Best Sellers <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        @foreach ($products as $product)
                            @if ($product->stock < 50)
                                <div class="single_product_item">
                                    <a href="{{ route('product.show', $product) }}">
                                        <img src="{{ asset('storage/img/products/' . $product->image) }}" alt="">
                                    </a>
                                    <div class="single_product_text">
                                        <h4>{{ $product->name }}</h4>
                                        <h3><b>${{ $product->price }}.00</b></h3>
                                        <form action="{{ route('userProduct.store', [$product]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn add_cart" type="submit">
                                                <a>+ add to cart</a>
                                            </button>
                                        </form>
                                        {{-- <a class="add_cart">+ add to cart<i class="ti-heart"></i></a> --}}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->

    <!-- subscribe_area part start-->
    <section class="subscribe_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="subscribe_area_text text-center">
                        <h5>Join Our Newsletter</h5>
                        <h2>Subscribe to get Updated
                            with new offers</h2>
                        <form action="{{ route('newsletter.send') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="enter email address"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2" name="email"
                                    id="email">
                                <div class="input-group-append">
                                    <button class="input-group-text btn_2" id="basic-addon2" type="submit">Subscribe
                                        now</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::subscribe_area part end::-->

    <!-- subscribe_area part start-->
    <section class="client_logo padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_1.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_2.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_3.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_4.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_5.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_3.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_1.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_2.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_3.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_4.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::subscribe_area part end::-->
@endsection
