@extends('layouts.app')
@section('title', 'Search')
@section('content')

    <div class="wrapper">
        <div class="container pt-3">
            <h2 class="lead" style="margin:1em; margin-left:0;">Showing {{ $products->count() }} results for
                {{ $query }} out of {{ $products->total() }}</h2>
            @if ($products->total() == 0)
                <div class="alert alert-primary">
                    No products found for your search
                </div>
            @else
                <div class="row">
                    @foreach ($products as $product)
                        <!-- start single product -->
                        <div class="col-md-3 product-container">
                            <div class="product-block__image-container">
                                <a href="{{ route('shop.show', $product->slug) }}" class="product-block__image">
                                    <img src="{{ productImage($product->image) }}" alt="">
                                </a>
                            </div>
                            <div class="product-block__title">
                                <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                            </div>
                            <div class="product-block__price my-2">
                                <span>
                                    ${{ $product->price }}
                                </span>
                            </div>
                        </div>
                        <!-- end single product -->
                    @endforeach
                </div>
                {{-- <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">details</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th><a href="{{ route('shop.show', $product->slug) }}"
                                        class="text-decoration-none">{{ $product->name }}</a></th>
                                <td>${{ format($product->price) }}</td>
                                <td>{{ $product->details }}</td>
                                <td>{{ str_limit($product->description, 70) }}</td>
                                <td><img src="{{ productImage($product->image) }}" width="70" height="70"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
            @endif
            {{ $products->links() }}
        </div>
    </div>

    @include('partials.side-cart')

@endsection