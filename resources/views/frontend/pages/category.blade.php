@extends('layouts.front_layout')

@section('content')
    <style>
        /* Custom tablist background color */
        #v-pills-tab .nav-link.active {
            background-color: #ba160a;
            /* Change this to your desired color */
            color: #fff;
            /* Change this to the text color you prefer */
        }

        #v-pills-tab .nav-link {
            color: #ba160a;
            /* Change this to the text color you prefer */
        }
    </style>
    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Shop Category</h2>
                            <p>Home <span>-</span> Shop Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    {{-- <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                    aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
                    aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                    aria-controls="v-pills-settings" aria-selected="false">Settings</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">

                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...
                </div>
            </div>
        </div>
    </div> --}}
    <!--================Category Product Area =================-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Browse Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all"
                                        role="tab" aria-controls="v-pills-all" aria-selected="true">All Categories</a>
                                    <a class="nav-link" id="v-pills-chair-tab" data-toggle="pill" href="#v-pills-chair"
                                        role="tab" aria-controls="v-pills-chair" aria-selected="false">Chair</a>
                                    <a class="nav-link" id="v-pills-inspire-tab" data-toggle="pill" href="#v-pills-inspire"
                                        role="tab" aria-controls="v-pills-inspire" aria-selected="false">Inspire</a>
                                    <a class="nav-link" id="v-pills-model-tab" data-toggle="pill" href="#v-pills-model"
                                        role="tab" aria-controls="v-pills-model" aria-selected="false">Model</a>
                                </div>
                            </div>
                        </aside>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu">
                                    <p><span>{{ count($fullproducts) }} </span> Prodict Found</p>
                                </div>
                                <div class="single_product_menu d-flex">
                                    <form action="{{ route('product.index') }}" method="POST">
                                        @csrf
                                        @method('GET')
                                        <div class="d-flex">
                                            <select class="me-2" name="sort" id="sort">
                                                <option value="name">name</option>
                                                <option value="price">price</option>
                                                <option value="category_id">product</option>
                                            </select>
                                            <button type="submit">sort</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-all" role="tabpanel"
                            aria-labelledby="v-pills-all-tab">

                            <div class="row align-items-center latest_product_inner">
                                @foreach ($products as $product)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="single_product_item">
                                            <a href="{{ route('product.show', $product) }}">
                                                <img src="{{ asset('storage/img/products/' . $product->image) }}"
                                                    alt="">
                                            </a>
                                            <div class="single_product_text">
                                                <h4>{{ $product->name }}</h4>
                                                <h3><b>${{ $product->price }}</b></h3>
                                                <form action="{{ route('userProduct.store', [$product]) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn add_cart" type="submit">
                                                        <a>+ add to cart</a>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex align-items-center justify-content-center text-center">
                                {{ $products->links() }}
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-chair" role="tabpanel" aria-labelledby="v-pills-chair-tab">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">

                                <div class="row align-items-center latest_product_inner">
                                    @foreach ($fullproducts as $product)
                                        @if ($product->category_id == 1)
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="single_product_item">
                                                    <a href="{{ route('product.show', $product) }}">
                                                        <img src="{{ asset('storage/img/products/' . $product->image) }}"
                                                            alt="">
                                                    </a>
                                                    <div class="single_product_text">
                                                        <h4>{{ $product->name }}</h4>
                                                        <h3><b>${{ $product->price }}</b></h3>
                                                        <form action="{{ route('userProduct.store', [$product]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="btn add_cart" type="submit">
                                                                <a>+ add to cart</a>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="d-flex align-items-center justify-content-center text-center">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-inspire" role="tabpanel"
                            aria-labelledby="v-pills-inspire-tab">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">

                                <div class="row align-items-center latest_product_inner">
                                    @foreach ($fullproducts as $product)
                                        @if ($product->category_id == 2)
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="single_product_item">
                                                    <a href="{{ route('product.show', $product) }}">
                                                        <img src="{{ asset('storage/img/products/' . $product->image) }}"
                                                            alt="">
                                                    </a>
                                                    <div class="single_product_text">
                                                        <h4>{{ $product->name }}</h4>
                                                        <h3><b>${{ $product->price }}</b></h3>
                                                        <form action="{{ route('userProduct.store', [$product]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="btn add_cart" type="submit">
                                                                <a>+ add to cart</a>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="d-flex align-items-center justify-content-center text-center">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-model" role="tabpanel"
                            aria-labelledby="v-pills-model-tab">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">

                                <div class="row align-items-center latest_product_inner">
                                    @foreach ($fullproducts as $product)
                                        @if ($product->category_id == 3)
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="single_product_item">
                                                    <a href="{{ route('product.show', $product) }}">
                                                        <img src="{{ asset('storage/img/products/' . $product->image) }}"
                                                            alt="">
                                                    </a>
                                                    <div class="single_product_text">
                                                        <h4>{{ $product->name }}</h4>
                                                        <h3><b>${{ $product->price }}</b></h3>
                                                        <form action="{{ route('userProduct.store', [$product]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="btn add_cart" type="submit">
                                                                <a>+ add to cart</a>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="d-flex align-items-center justify-content-center text-center">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

    <!-- product_list part start-->
    <section class="product_list best_seller">
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
                            <div class="single_product_item">
                                <img src="{{ asset('storage/img/products/' . $product->image) }}" alt="">
                                <div class="single_product_text">
                                    <h4>{{ $product->name }}</h4>
                                    <h3>{{ $product->price }}</h3>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="single_product_item">
                            <img src="img/product/product_1.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_2.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_3.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_4.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_5.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->
@endsection
