@extends('layouts.app')
@section('title', $order->id)
@section('content')

    <div class="container pt-5 mt-5">
        <div class="order-content" style="margin-bottom: 3em">
            <section class="order-id px-3">
                <a href="{{ url('/profile') }}" class="btn btn-back">
                    <svg enable-background="new 0 0 11 11" viewBox="0 0 11 11" x="0" y="0"
                        class="shopee-svg-icon icon-arrow-left">
                        <g>
                            <path
                                d="m8.5 11c-.1 0-.2 0-.3-.1l-6-5c-.1-.1-.2-.3-.2-.4s.1-.3.2-.4l6-5c .2-.2.5-.1.7.1s.1.5-.1.7l-5.5 4.6 5.5 4.6c.2.2.2.5.1.7-.1.1-.3.2-.4.2z">
                            </path>
                        </g>
                    </svg>
                    <span>TRỞ LẠI</span>
                </a>
                <div class="order-id-container">
                    <span>MÃ ĐƠN HÀNG {{ $order->id }}</span>
                    <span class="space">|</span>
                    <span class="status">
                        @if ($order->shipped == 0)
                            Đã đặt đơn hàng
                        @elseif ($order->shipped == 1)
                            Đã thanh toán
                        @elseif ($order->shipped == 2)
                            Đã giao dịch vụ vận chuyển
                        @elseif ($order->shipped == 3)
                            Đơn hàng đã hoàn thành
                        @endif
                    </span>
                </div>
            </section>
            <section>
                <div class="p-5">
                    <div class="stepper">
                        <div class="stepper__step">
                            <div class="stepper__step-icon stepper__step-icon--finish"><svg
                                    enable-background="new 0 0 32 32" viewBox="0 0 32 32" x="0" y="0"
                                    class="shopee-svg-icon icon-order-order">
                                    <g>
                                        <path
                                            d="m5 3.4v23.7c0 .4.3.7.7.7.2 0 .3 0 .3-.2.5-.4 1-.5 1.7-.5.9 0 1.7.4 2.2 1.1.2.2.3.4.5.4s.3-.2.5-.4c.5-.7 1.4-1.1 2.2-1.1s1.7.4 2.2 1.1c.2.2.3.4.5.4s.3-.2.5-.4c.5-.7 1.4-1.1 2.2-1.1.9 0 1.7.4 2.2 1.1.2.2.3.4.5.4s.3-.2.5-.4c.5-.7 1.4-1.1 2.2-1.1.7 0 1.2.2 1.7.5.2.2.3.2.3.2.3 0 .7-.4.7-.7v-23.7z"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-miterlimit="10" stroke-width="3"></path>
                                        <g>
                                            <line fill="none" stroke-linecap="round" stroke-miterlimit="10"
                                                stroke-width="3" x1="10" x2="22" y1="11.5"
                                                y2="11.5"></line>
                                            <line fill="none" stroke-linecap="round" stroke-miterlimit="10"
                                                stroke-width="3" x1="10" x2="22" y1="18.5"
                                                y2="18.5"></line>
                                        </g>
                                    </g>
                                </svg></div>
                            <div class="stepper__step-text">Đơn hàng đã đặt</div>
                        </div>
                        <div class="stepper__step">
                            <div class="stepper__step-icon @if($order->shipped > 0) stepper__step-icon--finish @endif">
                                <svg enable-background="new 0 0 32 32" viewBox="0 0 32 32" x="0" y="0"
                                    class="shopee-svg-icon icon-order-paid">
                                    <g>
                                        <path clip-rule="evenodd"
                                            d="m24 22h-21c-.5 0-1-.5-1-1v-15c0-.6.5-1 1-1h21c .5 0 1 .4 1 1v15c0 .5-.5 1-1 1z"
                                            fill="none" fill-rule="evenodd" stroke-miterlimit="10" stroke-width="3">
                                        </path>
                                        <path clip-rule="evenodd"
                                            d="m24.8 10h4.2c.5 0 1 .4 1 1v15c0 .5-.5 1-1 1h-21c-.6 0-1-.4-1-1v-4"
                                            fill="none" fill-rule="evenodd" stroke-miterlimit="10" stroke-width="3">
                                        </path>
                                        <path
                                            d="m12.9 17.2c-.7-.1-1.5-.4-2.1-.9l.8-1.2c.6.5 1.1.7 1.7.7.7 0 1-.3 1-.8 0-1.2-3.2-1.2-3.2-3.4 0-1.2.7-2 1.8-2.2v-1.3h1.2v1.2c.8.1 1.3.5 1.8 1l-.9 1c-.4-.4-.8-.6-1.3-.6-.6 0-.9.2-.9.8 0 1.1 3.2 1 3.2 3.3 0 1.2-.6 2-1.9 2.3v1.2h-1.2z"
                                            stroke="none"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="stepper__step-text">Đã thanh toán</div>
                        </div>
                        <div class="stepper__step">
                            <div class="stepper__step-icon @if($order->shipped > 1) stepper__step-icon--finish @endif">
                                <svg enable-background="new 0 0 32 32" viewBox="0 0 32 32" x="0" y="0"
                                    class="shopee-svg-icon icon-order-shipping">
                                    <g>
                                        <line fill="none" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3"
                                            x1="18.1" x2="9.6" y1="20.5" y2="20.5"></line>
                                        <circle cx="7.5" cy="23.5" fill="none" r="4" stroke-miterlimit="10"
                                            stroke-width="3"></circle>
                                        <circle cx="20.5" cy="23.5" fill="none" r="4" stroke-miterlimit="10"
                                            stroke-width="3"></circle>
                                        <line fill="none" stroke-miterlimit="10" stroke-width="3" x1="19.7"
                                            x2="30" y1="15.5" y2="15.5"></line>
                                        <polyline fill="none" points="4.6 20.5 1.5 20.5 1.5 4.5 20.5 4.5 20.5 18.4"
                                            stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3"></polyline>
                                        <polyline fill="none" points="20.5 9 29.5 9 30.5 22 24.7 22"
                                            stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3"></polyline>
                                    </g>
                                </svg>
                            </div>
                            <div class="stepper__step-text">Đã giao cho ĐVVC</div>
                        </div>
                        <div class="stepper__step">
                            <div class="stepper__step-icon @if($order->shipped > 2) stepper__step-icon--finish @endif">
                                <svg enable-background="new 0 0 32 32" viewBox="0 0 32 32" x="0" y="0"
                                    class="shopee-svg-icon icon-order-received">
                                    <g>
                                        <polygon fill="none"
                                            points="2 28 2 19.2 10.6 19.2 11.7 21.5 19.8 21.5 20.9 19.2 30 19.1 30 28"
                                            stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3"></polygon>
                                        <polyline fill="none" points="21 8 27 8 30 19.1" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3"></polyline>
                                        <polyline fill="none" points="2 19.2 5 8 11 8" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3"></polyline>
                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-miterlimit="10" stroke-width="3" x1="16" x2="16"
                                            y1="4" y2="14"></line>
                                        <path
                                            d="m20.1 13.4-3.6 3.6c-.3.3-.7.3-.9 0l-3.6-3.6c-.4-.4-.1-1.1.5-1.1h7.2c.5 0 .8.7.4 1.1z"
                                            stroke="none"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="stepper__step-text">Đã nhận được hàng</div>
                        </div>
                        <div class="stepper__line">
                            <div class="stepper__line-background" style="background: rgb(224, 224, 224);"></div>
                            <div class="stepper__line-foreground"
                                style="width: calc(
                                    @if ($order->shipped == 0)
                                        40%
                                    @elseif ($order->shipped == 1)
                                        70%
                                    @elseif ($order->shipped == 2)
                                        100%
                                    @endif - 140px); background: rgb(45, 194, 88);"></div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="ship-line"></div>
                <div class="order-shipping-container">
                    <div class="order-shipping-head">
                        <div class="order-shipping-title">Địa chỉ nhận hàng</div>
                    </div>
                    <div class="order-shipping-info">
                        <div class="mb-3">{{ $order->billing_name }}</div>
                        <div class="mb-3">
                            <span> {{ $order->billing_email }}</span>
                            <span> {{ $order->billing_phone }}</span>
                        </div>
                        <div class="mb-3">
                            <span>
                                {{ $order->billing_address }}, {{ $order->billing_city }},
                                {{ $order->billing_province }}
                            </span>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                @foreach ($order->orderProducts as $orderProduct)
                    <div class="order-item-container">
                        <section>
                            <a class="order-item-link" href="{{ route('shop.show', $orderProduct->product->slug) }}">
                                <div class="order-item-left">
                                    <img src="{{ productImage($orderProduct->product->image) }}" class="order-item-img" />
                                    <div class="order-item-title-wrapper">
                                        <div class="order-item-title-container">
                                            <div class="order-item-title">
                                                <span>
                                                    {{ $orderProduct->product->name }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="order-item-category" tabindex="0">
                                            Phân loại hàng: {{ $orderProduct->product->category->name }}
                                        </div>
                                        <div class="order-item-quantity" tabindex="0">
                                            x {{ $orderProduct->quantity }}
                                        </div>
                                    </div>
                                </div>
                                <div class="order-price-wrapper" tabindex="0">
                                    <div class="order-price-container">
                                        <span class="order-price">{{ format($orderProduct->product->price) }}</span>
                                    </div>
                                </div>
                            </a>
                        </section>
                    </div>
                @endforeach
                <div class="order-info-container">
                    <div class="order-info">
                        <div class="order-info-title"><span>Tổng tiền hàng</span></div>
                        <div class="order-info-value">
                            <div>{{ format($order->billing_subtotal) }}</div>
                        </div>
                    </div>
                    <div class="order-info">
                        <div class="order-info-title"><span>Voucher từ Shopee</span></div>
                        <div class="order-info-value">
                            <div>-{{ format($order->billing_discount) }}</div>
                        </div>
                    </div>
                    <div class="order-info">
                        <div class="order-info-title"><span>Thành tiền</span></div>
                        <div class="order-info-value">
                            <div class="order-info-total">{{ format($order->billing_total - $order->billing_discount) }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="order-info">
                    <span class="order-info-title">Phương thức Thanh toán</span></span>
                    <div class="order-info-value">
                        <div>Thanh toán qua {{ $order->payment_gateway }}</div>
                    </div>
                </div>
            </section>
        </div>
        <!-- <hr> -->
    </div>

    @include('partials.side-cart')
@endsection
