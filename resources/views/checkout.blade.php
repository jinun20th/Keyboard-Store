@extends('layouts.app')
@section('title', 'Checkout')
@section('content')

    <!-- start page content -->
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-1">
                <hr>
                <h1 class="lead" style="font-size: 1.5em">Thanh toán</h1>
                <hr>
                <h3 class="lead" style="font-size: 1.2em; margin-bottom: 1.6em;">Thông tin thanh toán</h3>
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf()
                    <div class="form-group">
                        <label for="email" class="light-text">Địa chỉ email</label>
                        @guest
                            <input type="text" name="email" class="form-control my-input" required>
                        @else
                            <input type="text" name="email" class="form-control my-input"
                                value="{{ auth()->user()->email }}" readonly required>
                        @endguest
                    </div>
                    <div class="form-group">
                        <label for="name" class="light-text">Họ và tên</label>
                        <input type="text" name="name" class="form-control my-input" required>
                    </div>
                    <div class="form-group">
                        <label for="address" class="light-text">Địa chỉ</label>
                        <input type="text" name="address" class="form-control my-input" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city" class="light-text">Thành phố</label>
                                <input type="text" name="city" class="form-control my-input" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="province" class="light-text">Quận</label>
                            <input type="text" name="province" class="form-control my-input" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postal_code" class="light-text">Post Code</label>
                                <input type="text" name="postal_code" class="form-control my-input" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="light-text">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control my-input" required>
                        </div>
                    </div>
                    <h2 style="margin-top:1em; margin-bottom:1em;">Thông tin thanh toán</h2>
                    <div class="form-group">
                        <label for="payment_method" class="light-text">Phương thức thanh toán</label>
                        <div class="form-check">
                            <input type="radio" id="zalopay" name="payment_method" value="zalopay"
                                class="form-check-input" required>
                            <label for="zalopay" class="form-check-label">ZaloPay</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="stripe" name="payment_method" value="stripe"
                                class="form-check-input" required>
                            <label for="stripe" class="form-check-label">Stripe</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="stripe" name="payment_method" value="cod"
                                class="form-check-input" required>
                            <label for="stripe" class="form-check-label">COD</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success custom-border-success btn-block mt-3">Hoàn
                        thành</button>
                </form>
            </div>
            <div class="col-md-5 offset-md-1">
                <hr>
                <h3>Đơn hàng của bạn</h3>
                <hr>
                <table class="table table-borderless table-responsive">
                    <tbody>
                        @foreach (Cart::instance('default')->content() as $item)
                            <tr>
                                <td>
                                    <a href="{{ route('shop.show', $item->model->slug) }}">
                                        <img src="{{ productImage($item->model->image) }}" height="100px" width="100px">
                                </td>
                                </a>
                                <td>
                                <td>
                                    <a href="{{ route('shop.show', $item->model->slug) }}" class="text-decoration-none">
                                        <h3 class="lead light-text">{{ $item->model->name }}</h3>
                                        <p class="light-text">{{ $item->model->details }}</p>
                                        <h3 class="light-text lead text-small">{{ format($item->model->price) }}</h3>
                                    </a>
                                </td>
                                <td>
                                    <span class="quantity-square">x{{ $item->qty }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <span class="light-text">Tổng tiền tạm tính</span>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <span class="light-text" style="display: inline-block">{{ format($subtotal) }}</span>
                    </div>
                </div>
                @if (session()->has('coupon'))
                    <div class="row">
                        <div class="col-md-4">
                            <span class="light-text inline">Giảm giá({{ session('coupon')['code'] }})</span>
                        </div>
                        <div class="col-md-4">
                            <form class="form-inline" action="{{ route('coupon.destroy') }}" method="POST"
                                style="display:inline">
                                @csrf()
                                @method('DELETE')
                                <button class="inline-form-button" type="submit">Gỡ</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <span class="light-text" style="display: inline">- {{ format($discount) }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="light-text">Tổng tiền mới</span>
                        </div>
                        <div class="col-md-4 offset-md-4">
                            <span class="light-text" style="display: inline-block">{{ format($newSubtotal) }}</span>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <span>Tổng tiền</span>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <span class="text-right" style="display: inline-block">{{ format($total) }}</span>
                    </div>
                </div>
                <hr>
                @if (!session()->has('coupon'))
                    <form action="{{ route('coupon.store') }}" method="POST">
                        @csrf()
                        <label for="coupon_code">Có coupon ?</label>
                        <input type="text" name="coupon_code" id="coupon" class="form-control my-input"
                            placeholder="123456" required>
                        <button type="submit" class="btn btn-success custom-border-success btn-block mt-3">Áp dụng
                            Coupon</button>
                    </form>
                @endif
            </div>
        </div>  
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <!-- end page content -->

    @include('partials.side-cart')

@endsection
