@extends('layouts.app')
@section('title', $product->name)
@section('content')

<div class="container pt-5">
    <div class="row" style="margin-bottom: 3em">
        <div class="col-md-6 product-image">
            <div>
                <img src="{{ productImage($product->image) }}" width="100%" height="100%" id="current-image">
            </div>
            <div class="image-thumbnails">
                @if ($images)
                    <img src="{{ productImage($product->image) }}" class="image-thumbnail active">
                    @foreach ($images as $image)
                        <div>
                            <img src="{{ productImage($image) }}" class="image-thumbnail">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="product-details col-md-6 ps-5">
            <h1 class="title small-title mb-3">{{ $product->name }}</h1>
            <span class="badge-stock">🚀{{ $stockLevel }}</span>
            <h3 class="title large-title my-3">{{ format($product->price) }} VND</h3>
            <p class="light-text mb-3">{{ $product->details }}</p> 
            <p class="light-text mb-3">{!! $product->description !!}</p>
            @if ($product->quantity > 0)
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf()
                    <input type="hidden" id="cartStoreRoute" data-route="{{ route('cart.store') }}">
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <label for="quantity">Số lượng</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" value="1">
                    <br>
                    <button type="submit" class="btn add-to-cart-btn">Thêm vào giỏ hàng</button>
                </form>
            @endif
        </div>
    </div>
    <!-- <hr> -->
</div>

@include('partials.side-cart')
@include('partials.might-like')
<!-- end page content -->

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            // force the height to be as as long as the width
            var w = $('#current-image').width();
            $('#current-image').css({'height': w + 'px'});

            $('.image-thumbnail').on('click', (e) => {
                $('.image-thumbnail').removeClass('active');
                $(e.currentTarget).addClass('active');
                if($(e.currentTarget).attr('src') != $('#current-image').attr('src')) {
                    $(e.currentTarget).addClass('active');
                    $('#current-image').animate({'opacity' : 0}, 300, function() {
                        $('#current-image').attr('src', $(e.currentTarget).attr('src'));
                        $('#current-image').animate({'opacity' : 1}, 400);
                    })
                }
            });

        });
    </script>

@endsection
