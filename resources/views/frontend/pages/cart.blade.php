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
                            <h2>Cart Products</h2>
                            <p>Home <span>-</span>Cart Products</p>
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
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userProducts as $item)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img width="100px" src="{{asset('storage/img/products/' . $item->product->image)}}" alt="" />
                                            </div>
                                            <div class="media-body">
                                                <p>{{ $item->product->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>${{ $item->product->price }}.00</h5>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center ">
                                            <input class="form-control w-25" disabled type="text" value="{{ $item->quantity }}">
                                            <div class="d-flex flex-column">
                                                <form action="{{ route('userProduct.store', [$item->product]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn" type="submit">
                                                        <span class="input-number-increment p-0">
                                                            <i class="ti-angle-up"></i>
                                                        </span>
                                                    </button>
                                                </form>
                                                <form action="{{ route('userProduct.decrease', [$item->product]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn" type="submit">
                                                        <span class="input-number-decrement p-0">
                                                            <i class="ti-angle-down"></i>
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>${{ $item->product->price * $item->quantity }}.00</h5>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>${{$subtotal}}.00</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="{{route('product.index')}}">Continue Shopping</a>
                        {{-- <button class="btn_1 checkout_btn_1 disabled">Proceed to checkout</button> --}}
                    </div>
                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->
@endsection
