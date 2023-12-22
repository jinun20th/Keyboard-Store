@extends('layouts.app')
@section('title', 'Shop')
@section('content')

    <!-- start page content -->
    <div class="container pt-3">
        <div class="row">
            <!-- start filter section -->
            <div class="col-md-2" style="margin-top:1em">
                <h4 class="filter-header">
                    Filter By Category
                </h4>
                <ul class="filter-ul">
                    @foreach ($categories as $category)
                        <li>
                            <a class="text-center {{ $category->name == $categoryName ? 'active-cat' : '' }}"
                                href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
                {{-- <h4 class="filter-header">
                    Filter By Tag
                </h4>
                <ul class="filter-ul">
                    @foreach ($tags as $tag)
                        <li><a class="text-center {{ $tag->name == $tagName ? 'active-cat' : '' }}"
                                href="{{ route('shop.index', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul> --}}
            </div>
            <!-- end filter section -->
            <!-- start products section -->
            <div class="col-md-10">
                <div class="head row">
                    <div class="col-md-6">
                        <h2 class="content-head">

                        </h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <form action="{{ route('shop.index') }}" method="GET">
                            <select name="sort" class="orderby" onchange="this.form.submit()">
                                <option value="default">Default sorting</option>
                                <option value="low_high">Sort by Low to High</option>
                                <option value="high_low">Sort by High to Low</option>
                            </select>
                        </form>
                        {{-- <span class='font-weight-bolder' style="font-size: 1.2em">Price: </span>
                        <span class="align-right"><a href="{{ route('shop.index', ['default'=> request()->default, 'sort' => 'default']) }}" class="text-decoration-none {{ request()->sort == 'default' ? 'active-sort' : '' }}">Default Sorting</a></span>
                        <span class="align-right"><a href="{{ route('shop.index', ['category'=> request()->category, 'tag'=> request()->tag, 'sort' => 'low_high']) }}" class="text-decoration-none {{ request()->sort == 'low_high' ? 'active-sort' : '' }}">Low to High</a></span>
                        <span class="align-right"><a href="{{ route('shop.index', ['category'=> request()->category, 'tag'=> request()->tag, 'sort' => 'high_low']) }}" class="text-decoration-none {{ request()->sort == 'high_low' ? 'active-sort' : '' }}">High to Low</a></span> --}}
                    </div>
                </div>
                <!-- start products row -->
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
                                    {{ $product->price }} VND
                                </span>
                            </div>
                        </div>
                        <!-- end single product -->
                    @endforeach
                </div>
                <div class="text-center">
                    {{ $products->appends(request()->input())->links() }}
                </div>
                <!-- end products row -->
            </div>
            <!-- end products section -->
        </div>
    </div>
    <!-- end page content -->
    </div>

    @include('partials.side-cart')

@endsection
