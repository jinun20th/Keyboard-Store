@extends('layouts.app')
@section('title', 'Shop')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-3 sidebar">
            <div class="title sidebar-title">
                My account
            </div>
            <div class="">Thông tin cá nhân</div>
            <div class="">Thanh toán</div>
            <div class="">Bảo mật</div>
            <div class="">Lịch sử giao dịch</div>
            <div class="">Đăng ký làm HLV</div>
        </div>
        <div class="col-9">
            <div>
                <div class="row">
                    <div class="col-12">
                        <div class="total">
                            <h2>
                                Tổng RCoin hiện có
                            </h2>
                            <span>{user.coins} RCoin</span>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-title">
                            Thông tin cá nhân
                        </div>
                        <form action="#" onSubmit={handleSubmit} method="post">
                            <div class="group">
                                <label htmlFor="name">Họ và tên</label>
                                <input type="text" id="name" name="name" />
                            </div>
                            <div class="group">
                                <label htmlFor="phone">Số điện thoại</label>
                                <input type="text" id="phone" name="phone" />
                            </div>
                            <div class="group">
                                <label htmlFor="date">Ngày sinh</label>
                            </div>
                            <div class="group">
                                <label htmlFor="gender">Giới tính</label>
                                <div class="d-flex align-center">
                                    <input type="radio" id="gender-1" name="gender" value="Nam"/>
                                    <label htmlFor="gender-1">Nam</label>
                                    <input type="radio" id="gender-2" name="gender" value="Nữ" />
                                    <label htmlFor="gender-2">Nữ</label>
                                </div>
                            </div>
                            <input type="submit" class="submit-btn" value="Cập nhập" />
                        </form>
                    </div>
                    <div class="col-4">
                        <div class="avatar-container">
                            <div class="avatar-img">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="avatar-input">
                                <label htmlFor="avatar">Chọn Ảnh</label>
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
            <div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-title">
                            Cài đặt bảo mật
                        </div>
                        <form action="#" method="post">
                            <div class="group">
                                <label htmlFor="old">Mật khẩu cũ</label>
                                <input type="password" id="old" name="old" />
                            </div>
                            <div class="group">
                                <label htmlFor="new">Mật khẩu mới</label>
                                <input type="password" id="new" name="new" />
                            </div>
                            <div class="group">
                                <label htmlFor="rep">Nhập lại mật khẩu mới</label>
                                <input type="password" id="rep" name="replace" />
                            </div>
                            <input type="submit" class="submit-btn" value="Cập nhập" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.side-cart')

@endsection