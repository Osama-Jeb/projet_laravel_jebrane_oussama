@extends('layouts.front_layout')

@section('content')
    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Favorite Products</h2>
                            <p>Home <span>-</span>Favorite Products</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Cart Area =================-->
    <section class="cart_area padding_top">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Unfavorite</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userProducts as $item)
                                @if ($item->product->fav)
                                    <tr>c
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img width="100px"
                                                        src="{{ asset('storage/img/products/' . $item->product->image) }}"
                                                        alt="" />
                                                </div>
                                                <div class="media-body">
                                                    <p>{{ $item->product->name }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <form action="{{ route('product.fav', [$item->product]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn add_cart p-0" type="submit">
                                                    <a><i class="fa-solid text-danger fa-heart-crack"></i> </a>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="{{ route('product.index') }}">Continue Shopping</a>
                        {{-- <button class="btn_1 checkout_btn_1 disabled">Proceed to checkout</button> --}}
                    </div>
                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->
@endsection
