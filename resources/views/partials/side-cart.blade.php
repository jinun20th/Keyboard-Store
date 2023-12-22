<div class="cart">
    <div class="cart-overlay"></div>
    <div class="cart-container">
        <div class="cart-head">
            <h2>
                Giỏ hàng
                <span class="cart-count">
                    {{ Cart::instance('default')->count() }}
                </span>
            </h2>
            <div id="close-cart">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                    <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                </svg>
            </div>
        </div>
        @if (Cart::instance('default')->count() > 0)
            <div class="cart-body">
                @foreach (Cart::instance('default')->content() as $item)
                    <div class="item">
                        <div class="image">
                            <a href="{{ route('shop.show', $item->model->slug) }}">
                                <img src="{{ productImage($item->model->image) }}" height="70px" width="70px">
                            </a>
                        </div>
                        <div class="main">
                            <div class="main-top">
                                <div class="main-top-left">
                                    <h3 class="title">
                                        <a href="{{ route('shop.show', $item->model->slug) }}"
                                            class="text-decoration-none">
                                            {{ $item->model->name }}
                                        </a>
                                    </h3>
                                </div>
                                <form action="{{ route('cart.destroy', [$item->rowId, 'default']) }}" method="POST"
                                    id="delete-item">
                                    @csrf()
                                    @method('DELETE')
                                </form>
                                <button class="cart-remove" onclick="document.getElementById('delete-item').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                        <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="main-bottom">
                                <div class="quantity-selector">
                                    <button class="btn decrease">-</button>
                                    <input type="text" class="quantity-input-side" size="1"
                                        value="{{ $item->qty }}" data-id={{ $item->rowId }} disabled>
                                    <button class="btn increase">+</button>
                                </div>
                                <span class="price-none" style="display:none;">{{ $item->price }} VND</span>
                                <span class="price">{{ format($item->price * $item->qty) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="cart-foot">
                <div class="footer-row">
                    <strong class="flex">Tạm tính</strong>
                    <strong class="slidecart-subtotal"></strong>
                </div>
                <a href="{{ url('/cart') }}">
                    <button class="button full">Checkout</button>
                </a>
                <a class="footer-continue" href="{{ url('/shop') }}">Tiếp tục mua sắm</a>
            </div>
        @else
            <div class="empty">
                <svg width="56" viewBox="0 0 65 74" xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="nonzero" fill="none">
                        <path
                            d="M64.407 9.856L53.605 0H11.371L.569 9.856A1.548 1.548 0 00.1 11.603c.235.619.843 1.031 1.524 1.031h61.727a1.62 1.62 0 001.522-1.031 1.545 1.545 0 00-.467-1.747z"
                            fill="#C4C4C4"></path>
                        <path
                            d="M63.351 9.927H1.624C.728 9.927 0 10.644 0 11.529v59.267C0 72.566 1.454 74 3.249 74h58.478c1.795 0 3.249-1.434 3.249-3.204V11.53c0-.885-.728-1.602-1.625-1.602z"
                            fill="#E4E4E4"></path>
                        <path
                            d="M32.488 45.122c-7.963 0-14.44-6.447-14.44-14.37v-4.79a1.6 1.6 0 011.605-1.596 1.6 1.6 0 011.604 1.596v4.79c0 6.163 5.04 11.177 11.23 11.177 6.192 0 11.231-5.014 11.231-11.177v-4.79a1.6 1.6 0 011.604-1.596 1.6 1.6 0 011.605 1.596v4.79c0 7.923-6.477 14.37-14.44 14.37z"
                            fill="#6D6D6D"></path>
                    </g>
                </svg>
                <p>Giỏ hàng bạn trống.</p>
            </div>
        @endif
    </div>
</div>