@extends('layouts.app')
@section('title', 'Cart')
@section('content')

    <!-- start page content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (Cart::instance('default')->count() > 0)
                    <h3 class="lead my-5">
                        <span class="cart-count">
                        </span>
                        sản phẩm trong giỏ hàng</h3>
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
                                        <span class="item-price lead light-text">{{ format($item->model->price) }}</span>
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
                                                    Xóa
                                                </button>
                                                <button class="cart-option btn btn-success btn-sm custom-border ms-3"
                                                    onclick="document.getElementById('save-later').submit();">
                                                    Thêm vào wish list
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 item-product-total justify-content-center">
                                        <span
                                            class="total-amount">{{ format($item->qty * $item->price) }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="summary">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-end flex-column align-items-end">
                                <p class="text-right light-text">Subtotal &nbsp; &nbsp;
                                   <span class="cart-subtotal">
                                       {{ format(Cart::subtotal()) }}
                                   </span>
                                </p>
                                <p class="text-right">Total &nbsp; &nbsp; 
                                    <span class="cart-total">
                                        {{ format(Cart::total()) }} 
                                    </span>
                                </p>
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
                                    <td>{{ format($item->model->price) }}</td>
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
