@extends('layouts.app')
@section('title', 'Cart')
@section('content')

    <!-- start page content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (Cart::instance('default')->count() > 0)
                    <h3 class="lead my-5">{{ Cart::instance('default')->count() }} sản phẩm trong giỏ hàng</h3>
                    {{-- <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::instance('default')->content() as $item)
                                <tr>
                                    <td>
                                        <a href="{{ route('shop.show', $item->model->slug) }}">
                                            <img src="{{ productImage($item->model->image) }}" height="100px" width="100px" style="border-radius:20px;">
                                        </a>
                                        <a href="{{ route('shop.show', $item->model->slug) }}" class="text-decoration-none">
                                            <h3 class="lead light-text">{{ $item->model->name }}</h3>
                                        </a>
                                    </td>
                                    <td>
                                        <h3 class="item-price lead light-text">${{ $item->model->price }}</h3>
                                    </td>
                                    <td>
                                <select class='quantity' data-id='{{ $item->rowId }}' data-productQuantity='{{ $item->model->quantity }}'>
                                    @for ($i = 1; $i < 10; $i++)
                                        <option class="option" value="{{ $i }}" {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </td> 
                                    <td>
                                        <div class="quantity-input-contain">
                                            <button class="quantity-btn quantity-minus">-</button>
                                            <input type="text" class="quantity-input" size="1"
                                                value="{{ $item->qty }}" data-id="{{ $item->rowId }}"
                                                data-productQuantity="{{ $item->model->quantity }}">
                                            <button class="quantity-btn quantity-plus">+</button>
                                        </div>
                                        <form action="{{ route('cart.destroy', [$item->rowId, 'default']) }}" method="POST"
                                            id="delete-item">
                                            @csrf()
                                            @method('DELETE')
                                        </form>
                                        <form action="{{ route('cart.save-later', $item->rowId) }}" method="POST"
                                            id="save-later">
                                            @csrf()
                                        </form>
                                        <button class="cart-option btn btn-danger btn-sm custom-border"
                                            onclick="document.getElementById('delete-item').submit();">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path
                                                    d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                                            </svg>
                                            Remove
                                        </button>
                                        <button class="cart-option btn btn-success btn-sm custom-border"
                                            onclick="document.getElementById('save-later').submit();">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path
                                                    d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z" />
                                            </svg>
                                            Save for later
                                        </button>
                                    </td>
                                    <td>
                                        <span class="total-amount">${{ $item->model->price * $item->model->quantity }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 title d-flex justify-content-center align-items-end">Sản phẩm</div>
                                <div class="col-md-2 title d-flex justify-content-center align-items-end">Giá trị</div>
                                <div class="col-md-4 title d-flex justify-content-center align-items-end">Số lượng</div>
                                <div class="col-md-3 title d-flex justify-content-center align-items-end">Thành tiền</div>
                            </div>
                        </div>
                        @foreach (Cart::instance('default')->content() as $item)
                        
                            <div class="col-md-12 my-3">
                                <div class="row">
                                    <div class="col-md-3 item-product-info">
                                        <a href="{{ route('shop.show', $item->model->slug) }}">
                                            <img src="{{ productImage($item->model->image) }}" height="100px" width="100px"
                                                style="border-radius:20px;">
                                        </a>
                                        <a href="{{ route('shop.show', $item->model->slug) }}"
                                            class="text-decoration-none ms-3">
                                            <span class="lead light-text">{{ $item->model->name }}</span>
                                        </a>
                                    </div>
                                    <div class="col-md-2 item-product-price justify-content-center">
                                        <span class="item-price lead light-text">${{ $item->model->price }}</span>
                                    </div>
                                    <div class="col-md-4 item-product-quantity">
                                        <div class="row">
                                            <div class="col-md-12 d-flex justify-content-center">
                                                <div class="quantity-input-contain">
                                                    <button class="quantity-btn quantity-minus">-</button>
                                                    <input type="text" class="quantity-input" size="1"
                                                        value="{{ $item->qty }}" data-id="{{ $item->rowId }}"
                                                        data-productQuantity="{{ $item->model->quantity }}" disabled>
                                                    <button class="quantity-btn quantity-plus">+</button>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2 d-flex justify-content-center">
                                                <form action="{{ route('cart.destroy', [$item->rowId, 'default']) }}"
                                                    method="POST" id="delete-item">
                                                    @csrf()
                                                    @method('DELETE')
                                                </form>
                                                <form action="{{ route('cart.save-later', $item->rowId) }}" method="POST"
                                                    id="save-later">
                                                    @csrf()
                                                </form>
                                                <button class="cart-option btn btn-danger btn-sm custom-border"
                                                    onclick="document.getElementById('delete-item').submit();">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                        viewBox="0 0 384 512">
                                                        <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                        <path
                                                            d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                                                    </svg>
                                                    Xóa
                                                </button>
                                                <button class="cart-option btn btn-success btn-sm custom-border ms-3"
                                                    onclick="document.getElementById('save-later').submit();">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                        viewBox="0 0 384 512">
                                                        <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                        <path
                                                            d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z" />
                                                    </svg>
                                                    Thêm vào wish list
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 item-product-total justify-content-center">
                                        <span
                                            class="total-amount">{{ $item->qty * $item->price }} VND</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="summary">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-end flex-column align-items-end">
                                {{-- <p class="text-right light-text">Subtotal &nbsp; &nbsp;${{ format(Cart::subtotal()) }}</p>
                                <p class="text-right light-text">Tax(21%) &nbsp; &nbsp; ${{ format(Cart::tax()) }}</p>
                                <p class="text-right">Total &nbsp; &nbsp; ${{ format(Cart::total()) }}</p> --}}
                                <p class="text-right light-text">Subtotal &nbsp; &nbsp;{{ format(Cart::subtotal()) }} VND</p>
                                {{-- <p class="text-right light-text">Tax(21%) &nbsp; &nbsp; ${{ format(Cart::tax()) }}</p> --}}
                                <p class="text-right">Total &nbsp; &nbsp; {{ format(Cart::total()) }} VND</p>
                            </div>
                        </div>
                    </div>
                    <div class="cart-actions">
                        <a class="btn custom-border-n" href="{{ route('shop.index') }}">Tiếp tục mua sắm</a>
                        <a class="float-right btn btn-success custom-border-n" href="{{ route('checkout.index') }}">
                            Thanh toán
                        </a>
                    </div>
                @else
                    <div class="alert alert-info mt-5">
                        <h4 class="lead">Không có sản phẩm trong giỏ hàng <a class="btn custom-border-n"
                                href="{{ route('shop.index') }}">Tiếp tục mua sắm</a></h4>
                    </div>
                @endif
                <hr>
                @if (Cart::instance('saveForLater')->count() > 0)
                    <h3 class="lead my-3">{{ Cart::instance('saveForLater')->count() }} sản phẩm trong wish list</h3>
                    <table class="table table-responsive">
                        <tbody>
                            @foreach (Cart::instance('saveForLater')->content() as $item)
                                <tr>
                                    <td>
                                        <a href="{{ route('shop.show', $item->model->slug) }}">
                                            <img src="{{ productImage($item->model->image) }}" height="100px"
                                                width="100px">
                                    </td>
                                    </a>
                                    <td>
                                        <a href="{{ route('shop.show', $item->model->slug) }}"
                                            class="text-decoration-none">
                                            <h3 class="lead light-text">{{ $item->model->name }}</h3>
                                            <p class="light-text">{{ $item->model->details }}</p>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="cart-option btn btn-danger btn-sm custom-border"
                                            onclick="
                                        document.getElementById('delete-form').submit();">
                                            Xóa
                                        </button>
                                        <button class="cart-option btn btn-success btn-sm custom-border"
                                            onclick="
                                            document.getElementById('add-form').submit();">
                                            Thêm vào giỏ hàng
                                        </button>
                                    </td>
                                    <td>${{ format($item->model->price) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <form action="{{ route('cart.destroy', [$item->rowId, 'saveForLater']) }}" method="POST"
                            id="delete-form">
                            @csrf()
                            @method('DELETE')
                        </form>
                        <form action="{{ route('cart.add-to-cart', $item->rowId) }}" method="POST" id="add-form">
                            @csrf()
                        </form>

                    </table>
                @else
                    <div class="alert alert-primary" style="margin:2em">
                        <li>Không có sản phẩm trong wish list</li>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('partials.side-cart')
    @include('partials.might-like')
    <!-- end page content -->

@endsection

@section('scripts')
    <script>
        var cartIndexRoute = "{{ route('cart.index') }}";
    </script>
@endsection
