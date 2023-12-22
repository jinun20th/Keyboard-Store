@extends('layouts.app')
@section('title', 'Shop')
@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-3 sidebar">
                <div class="sbtitle active" data-panel="panel1" onclick="togglePanel('panel1')">Thông tin cá nhân</div>
                <div class="sbtitle" data-panel="panel2" onclick="togglePanel('panel2')">Đơn hàng</div>
                <div class="sbtitle" data-panel="panel3" onclick="togglePanel('panel3')">Bảo mật</div>
            </div>
            <div class="col-md-9">
                <div id="panel1" class="content active">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="{{ route('profile.update') }}" method="post">
                                @csrf
                                <div class="group">
                                    <label for="name">Họ và tên</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        value=" {{ $user->name }}" />
                                </div>
                                <div class="group">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" id="email" name="email"
                                        value=" {{ $user->email }}" />
                                </div>
                                <button class="submit-btn btn">Cập nhập</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="avatar-container">
                                <div class="avatar-img">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class="avatar-input">
                                    <label for="avatar">Chọn Ảnh</label>
                                    <input type="file" id="avatar" name="avatar" />
                                </div>
                                <div class="avatar-desc">
                                    Dung lượng file tối đa 1 MB
                                    Định dạng: JPEG, PNG
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel2" class="content">
                    @if ($userOrders->count() > 0)
                        @foreach ($userOrders as $order)
                            <a href="{{ route('order.show', $order->id) }}" class="row order">
                                <div class="order-id">
                                    <div class="w8MDQX">
                                        <span tabindex="0">MÃ ĐƠN HÀNG {{ $order->id }}</span>
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
                                </div>
                                @foreach ($order->orderProducts as $orderProduct)
                                    <div class="order-item">
                                        <div class="order-container">
                                            <img src="{{ productImage($orderProduct->product->image) }}" class="order-img">
                                            <div class="order-title-container">
                                                <div>
                                                    <div class="order-title">
                                                        <span class="order-span">
                                                            {{ $orderProduct->product->name }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="order-category">
                                                        Phân loại hàng:
                                                        {{ $orderProduct->product->category->name }}
                                                    </div>
                                                    <div class="order-quantity" tabindex="0">x
                                                        {{ $orderProduct->quantity }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-price-wrapper" tabindex="0">
                                            <div class="order-price-container">
                                                <span class="order-price">
                                                    {{ format($orderProduct->product->price) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="order-total">
                                    <div class="order-total-contain">
                                        <label class="">Thành tiền:</label>
                                        <div class="order-total-value">
                                            {{ format($order->billing_total) }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <p>Không có đơn hàng nào.</p>
                    @endif
                    {{-- <div class="row order">
                        <div class="order-id">
                            <div class="w8MDQX">
                                <span tabindex="0">MÃ ĐƠN HÀNG. 231022JSP8SVSP</span>
                                <span class="space">|</span>
                                <span class="status">Đơn hàng đã hoàn thành</span>
                            </div>
                        </div>
                        <div class="order-item">
                            <div class="order-container">
                                <img src="https://down-vn.img.susercontent.com/file/vn-11134207-7qukw-lipmsf1y8i4yd4_tn"
                                    class="order-img" alt="" tabindex="0">
                                <div class="order-title-container">
                                    <div>
                                        <div class="order-title">
                                            <span class="order-span" tabindex="0">Switch MMD Holy Panda -
                                                Cream - Honey Tactile bán lẻ công tắc phím cơ chất lượng cao giá rẻ có lube
                                                sẵn</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="order-category" tabindex="0">Phân loại hàng: MMD Holy Panda v2,Stock,
                                            chưa
                                            lube</div>
                                        <div class="order-quantity" tabindex="0">x4</div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-price-wrapper" tabindex="0">
                                <div class="order-price-container">
                                    <span class="order-price">₫5.000</span>
                                </div>
                            </div>
                        </div>
                        <div class="order-total">
                            <div class="-78s2g">
                                <label class="">Thành tiền:</label>
                                <div class="order-total-value" tabindex="0" aria-label="Thành tiền: ₫292.500">₫292.500
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div id="panel3" class="content">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="{{ route('profile.updatePassword') }}" method="post">
                                @csrf
                                <div class="group">
                                    <label for="old">Mật khẩu cũ</label>
                                    <input class="form-control" type="password" id="current_password"
                                        name="current_password" />
                                </div>
                                <div class="group">
                                    <label for="new">Mật khẩu mới</label>
                                    <input class="form-control" type="password" id="new_password" name="new_password" />
                                </div>
                                <div class="group">
                                    <label for="rep">Nhập lại mật khẩu mới</label>
                                    <input class="form-control" type="password" id="new_password_confirmation"
                                        name="new_password_confirmation" />
                                </div>
                                <button class="submit-btn btn">Cập nhập</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePanel(panelId) {

            const panel = document.getElementById(panelId);
            const title = document.querySelector(`.sbtitle[data-panel="${panelId}"]`);

            const isPanelActive = panel.classList.contains('active');

            if (!isPanelActive) {
                const allPanels = document.querySelectorAll('.content');
                const allTitles = document.querySelectorAll('.sbtitle');
                allPanels.forEach(p => p.classList.remove('active'));
                allTitles.forEach(t => t.classList.remove('active'));

                panel.classList.add('active');
                title.classList.add('active');
            }
        }
    </script>

    @include('partials.side-cart')

@endsection
