@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

    <!-- start page content -->
    <!-- Slider -->
    <section id="slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#slider" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 h-100" src="{{ '/images/poster1.jpg' }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-100" src="{{ '/images/poster2.jpg' }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-100" src="{{ '/images/poster3.jpg' }}" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-100" src="{{ '/images/poster4.jpg' }}" alt="Fourth slide">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>
    <!-- Selection -->
    <section class="selection">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ url('/shop?category=hoa') }}">
                        <img src="{{ '/images/hoa.jpg' }}">
                        Hoa quà tặng
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('/shop?category=su') }}">
                        <img src="{{ '/images/coc.jpg' }}">
                        Đồ sứ quà tặng
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('/shop?category=thu-bong') }}">
                        <img src="{{ '/images/gau.jpg' }}">
                        Thú bông quà tặng
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('/shop?category=mo-hinh') }}">
                        <img src="{{ '/images/mohinh.jpg' }}">
                        Mô hình quà tặng
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Video -->
    <section class="video">
        <div class="container my-5">
            <div class="video-container">
                <iframe width="1280" height="720" src="https://www.youtube.com/embed/qpLN3llmQp8"
                frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
                {{-- <iframe
                    src="https://www.youtube.com/embed/dxkptWZuAVE?iv_load_policy=3&modestbranding=1&autoplay=0&loop=0&playlist=dxkptWZuAVE&rel=0&showinfo=0&enablejsapi=1&origin=https%3A%2F%2Fkbdfans.com&widgetid=1"></iframe> --}}
            </div>

        </div>
    </section>
    <!-- New arrival -->
    <section class="collection">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12 title-container mb-3">
                    <h1>Sản phẩm mới</h1>
                    <a href="{{ url('/shop') }}">Mua ngay</a>
                </div>
                @foreach ($products as $product)
                    <div class="col-md-3 product-container">
                        <div class="product-block__image-container">
                            <a href="{{ route('shop.show', $product->slug) }}" class="product-block__image">
                                <img src="{{ productImage($product->image) }}" alt="">
                                {{-- <div class="image-one">
                                <img src="{{ '/images/products/kb01.jpg' }}" alt="">
                            </div>
                             <div class="image-two">
                                <img src="{{ '/images/products/kb06.jpg' }}" alt="">
                            </div> --}}
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
                @endforeach
            </div>
        </div>
    </section>
    <!-- Keyboard switches -->
    <section class="collection">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12 title-container mb-3">
                    <h1>Hoa quà tặng</h1>
                    <a href="{{ route('shop.index', ['category' => 'laptops']) }}">Mua ngay</a>
                </div>
                @foreach ($switches as $switch)
                    <div class="col-md-3 product-container">
                        <div class="product-block__image-container">
                            <a href="{{ route('shop.show', $switch->slug) }}" class="product-block__image">
                                <img src="{{ productImage($switch->image) }}" alt="">
                                {{-- <div class="image-one">
                                <img src="{{ '/images/products/kb01.jpg' }}" alt="">
                            </div>
                             <div class="image-two">
                                <img src="{{ '/images/products/kb06.jpg' }}" alt="">
                            </div> --}}
                            </a>
                        </div>
                        <div class="product-block__title">
                            <a href="{{ route('shop.show', $switch->slug) }}">{{ $switch->name }}</a>
                        </div>
                        <div class="product-block__price my-2">
                            <span>
                                {{ $switch->price }} VND
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Fully Assembled Keyboard -->
    <section class="collection">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12 title-container mb-3">
                    <h1>Mô hình</h1>
                    <a href="{{ route('shop.index', ['category' => 'desktops']) }}">Mua ngay</a>
                </div>
                @foreach ($keyboards as $keyboard)
                    <div class="col-md-3 product-container">
                        <div class="product-block__image-container">
                            <a href="{{ route('shop.show', $keyboard->slug) }}" class="product-block__image">
                                <img src="{{ productImage($keyboard->image) }}" alt="">
                                {{-- <div class="image-one">
                                <img src="{{ '/images/products/kb01.jpg' }}" alt="">
                            </div>
                             <div class="image-two">
                                <img src="{{ '/images/products/kb06.jpg' }}" alt="">
                            </div> --}}
                            </a>
                        </div>
                        <div class="product-block__title">
                            <a href="{{ route('shop.show', $keyboard->slug) }}">{{ $keyboard->name }}</a>
                        </div>
                        <div class="product-block__price my-2">
                            <span>
                                {{ $keyboard->price }} VND
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Feed -->
    {{-- <section class="feed">
        <div class="row">
            <div class="col-md-2">
                <a class="feed-link" href="#1-feed">
                    <div class="feed-container">
                        <img src="{{ '/images/feed1.jpg' }}">
                    </div>
                    <div class="feed-overlay">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a class="feed-link" href="#2-feed">
                    <div class="feed-container">
                        <img src="{{ '/images/feed2.jpg' }}">
                    </div>
                    <div class="feed-overlay">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a class="feed-link" href="#3-feed">
                    <div class="feed-container">
                        <img src="{{ '/images/feed3.jpg' }}">
                    </div>
                    <div class="feed-overlay">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a class="feed-link" href="#4-feed">
                    <div class="feed-container">
                        <img src="{{ '/images/feed4.jpg' }}">
                    </div>
                    <div class="feed-overlay">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a class="feed-link" href="#5-feed">
                    <div class="feed-container">
                        <img src="{{ '/images/feed5.jpg' }}">
                    </div>
                    <div class="feed-overlay">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a class="feed-link" href="#6-feed">
                    <div class="feed-container">
                        <img src="{{ '/images/feed6.jpg' }}">
                    </div>
                    <div class="feed-overlay">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="feed-lightbox" id="1-feed">
            <div class="lightbox-ins">
                <div class="ins-img">
                    <a href="#">
                        <video controls="" playsinline="" muted="" id="video-1-instafeed" preload="none"
                            src="https://video.cdninstagram.com/v/t50.16885-16/295284609_736379680907321_1577393760100046316_n.mp4?_nc_cat=102&amp;vs=1171441066751099_3603448774&amp;_nc_vs=HBksFQAYJEdJR3ZtUkU1NEV6QnU1MENBT3hWcm5WRUJfUVZidlZCQUFBRhUAAsgBABUAGCRHR21ub0JHSXRESGV5cDRBQUtBZThKRlJ5dGNuYnZWQkFBQUYVAgLIAQAoABgAGwGIB3VzZV9vaWwBMRUAACbikt3qhtfqPxUCKAJDMywXQDOl41P3ztkYEmRhc2hfYmFzZWxpbmVfMV92MREAdewHAA%3D%3D&amp;ccb=1-7&amp;_nc_sid=59939d&amp;efg=eyJ2ZW5jb2RlX3RhZyI6InZ0c192b2RfdXJsZ2VuLjY0MC5pZ3R2In0%3D&amp;_nc_ohc=2CLnaa73MiUAX-l1nft&amp;_nc_ht=video.cdninstagram.com&amp;edm=ANo9K5cEAAAA&amp;oh=00_AT8LGrPG-Wjj2Ll7KEUFDps4oH6sFzDWcdptnSOxBgiatg&amp;oe=62E422F7&amp;_nc_rid=994b288261"
                            videp=""></video>
                    </a>
                </div>
                <div class="ins-desc">
                    <div class="ins-head">
                        <img src="https://instafeed.nfcube.com/assets/img/logo-instagram-transparent.png"
                            data-feed-id="insta-feed" class="profile-picture js-lazy-image js-lazy-image--handled"
                            data-src="https://instafeed.nfcube.com/assets/img/logo-instagram-transparent.png">
                        <div class="name-section"><a href="#">@KBDfans</a></div>
                        <a href="#_" class="ins-close">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                    <hr>
                    <div class="ins-content">
                        <div class="sub-head">
                            <a href="#6-feed">
                                <i class="fa-solid fa-angle-left"></i>
                            </a>
                            <a href="#2-feed">
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </div>
                        <div class="ins-cap">
                            [Ended] congrats to the winner @kyliedyy 🎉🎊🎉
                            [Giveaway] KBDfans D60lite X GMK Pharaoh

                            Link: http://kbd.fans/d60lite
                            Designer: @sxm_designs

                            -The D60Lite X Pharaoh keyboard kit is in stock and ready to ship right now
                            -Get a chance to win a D60lite x GMK Pharaoh today. (Includes the whole DIY kit)
                            -We are giving away ONE D60lite x GMK Pharaoh to a lucky winner!
                            -All you have to do to participate in the drawing is:
                            1. Tag 2 friends in the comment section
                            2. Follow @kbdfans and @sxm_designs on Instagram
                            3. Comment with the layout you want. (HHKB or WK)
                            4. The winner will be chosen and announced by us, on this post, on July 25th. (GMT+8
                            timezone) This is available for anyone globally! Good luck! Can’t wait to send these
                            out to you!
                            5. Friendly reminder: Do not answer to someone else besides @kbdfans!!! We will NOT
                            ask you to pay anything for this giveaway!!!

                            #keyboard #keyboards #mechkb #keycap #keycaps #keycapdesign #design #epbt #gmk
                            #setup #battlestation #keyset #keysets #keycapset #keycapsets #render #tgr
                            #programmer #mechanical #gaming #kbwarriors #gamer #gamerlife #kbdfans #giveaway
                        </div>
                    </div>
                    <div class="ins-date">
                        <span>July 25th</span>
                        <a href="https://www.instagram.com/p/CgTmPcvvtDZ/">View on Instagram</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="feed-lightbox" id="2-feed">
            <div class="lightbox-ins">
                <div class="ins-img">
                    <a href="#">
                        <img src="{{ '/images/feed2.jpg' }}">
                    </a>
                </div>
                <div class="ins-desc">
                    <div class="ins-head">
                        <img src="https://instafeed.nfcube.com/assets/img/logo-instagram-transparent.png"
                            data-feed-id="insta-feed" class="profile-picture js-lazy-image js-lazy-image--handled"
                            data-src="https://instafeed.nfcube.com/assets/img/logo-instagram-transparent.png">
                        <div class="name-section"><a href="#">@KBDfans</a></div>
                        <a href="#_" class="ins-close">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                    <hr>
                    <div class="ins-content">
                        <div class="sub-head">
                            <a href="#1-feed">
                                <i class="fa-solid fa-angle-left"></i>
                            </a>
                            <a href="#3-feed">
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </div>
                        <div class="ins-cap">
                            [Ended] congrats to the winner @kyliedyy 🎉🎊🎉
                            [Giveaway] KBDfans D60lite X GMK Pharaoh

                            Link: http://kbd.fans/d60lite
                            Designer: @sxm_designs

                            -The D60Lite X Pharaoh keyboard kit is in stock and ready to ship right now
                            -Get a chance to win a D60lite x GMK Pharaoh today. (Includes the whole DIY kit)
                            -We are giving away ONE D60lite x GMK Pharaoh to a lucky winner!
                            -All you have to do to participate in the drawing is:
                            1. Tag 2 friends in the comment section
                            2. Follow @kbdfans and @sxm_designs on Instagram
                            3. Comment with the layout you want. (HHKB or WK)
                            4. The winner will be chosen and announced by us, on this post, on July 25th. (GMT+8
                            timezone) This is available for anyone globally! Good luck! Can’t wait to send these
                            out to you!
                            5. Friendly reminder: Do not answer to someone else besides @kbdfans!!! We will NOT
                            ask you to pay anything for this giveaway!!!

                            #keyboard #keyboards #mechkb #keycap #keycaps #keycapdesign #design #epbt #gmk
                            #setup #battlestation #keyset #keysets #keycapset #keycapsets #render #tgr
                            #programmer #mechanical #gaming #kbwarriors #gamer #gamerlife #kbdfans #giveaway
                        </div>
                    </div>
                    <div class="ins-date">
                        <span>July 25th</span>
                        <a href="https://www.instagram.com/p/CgTmPcvvtDZ/">View on Instagram</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="feed-lightbox" id="3-feed">
            <div class="lightbox-ins">
                <div class="ins-img">
                    <a href="#">
                        <img src="{{ '/images/feed3.jpg' }}">
                    </a>
                </div>
                <div class="ins-desc">
                    <div class="ins-head">
                        <img src="https://instafeed.nfcube.com/assets/img/logo-instagram-transparent.png"
                            data-feed-id="insta-feed" class="profile-picture js-lazy-image js-lazy-image--handled"
                            data-src="https://instafeed.nfcube.com/assets/img/logo-instagram-transparent.png">
                        <div class="name-section"><a href="#">@KBDfans</a></div>
                        <a href="#_" class="ins-close">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                    <hr>
                    <div class="ins-content">
                        <div class="sub-head">
                            <a href="#2-feed">
                                <i class="fa-solid fa-angle-left"></i>
                            </a>
                            <a href="#4-feed">
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </div>
                        <div class="ins-cap">
                            [Ended] congrats to the winner @kyliedyy 🎉🎊🎉
                            [Giveaway] KBDfans D60lite X GMK Pharaoh

                            Link: http://kbd.fans/d60lite
                            Designer: @sxm_designs

                            -The D60Lite X Pharaoh keyboard kit is in stock and ready to ship right now
                            -Get a chance to win a D60lite x GMK Pharaoh today. (Includes the whole DIY kit)
                            -We are giving away ONE D60lite x GMK Pharaoh to a lucky winner!
                            -All you have to do to participate in the drawing is:
                            1. Tag 2 friends in the comment section
                            2. Follow @kbdfans and @sxm_designs on Instagram
                            3. Comment with the layout you want. (HHKB or WK)
                            4. The winner will be chosen and announced by us, on this post, on July 25th. (GMT+8
                            timezone) This is available for anyone globally! Good luck! Can’t wait to send these
                            out to you!
                            5. Friendly reminder: Do not answer to someone else besides @kbdfans!!! We will NOT
                            ask you to pay anything for this giveaway!!!

                            #keyboard #keyboards #mechkb #keycap #keycaps #keycapdesign #design #epbt #gmk
                            #setup #battlestation #keyset #keysets #keycapset #keycapsets #render #tgr
                            #programmer #mechanical #gaming #kbwarriors #gamer #gamerlife #kbdfans #giveaway
                        </div>
                    </div>
                    <div class="ins-date">
                        <span>July 25th</span>
                        <a href="https://www.instagram.com/p/CgTmPcvvtDZ/">View on Instagram</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="feed-lightbox" id="4-feed">
            <div class="lightbox-ins">
                <div class="ins-img">
                    <a href="#">
                        <img src="{{ '/images/feed4.jpg' }}">
                    </a>
                </div>
                <div class="ins-desc">
                    <div class="ins-head">
                        <img src="https://instafeed.nfcube.com/assets/img/logo-instagram-transparent.png"
                            data-feed-id="insta-feed" class="profile-picture js-lazy-image js-lazy-image--handled"
                            data-src="https://instafeed.nfcube.com/assets/img/logo-instagram-transparent.png">
                        <div class="name-section"><a href="#">@KBDfans</a></div>
                        <a href="#_" class="ins-close">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                    <hr>
                    <div class="ins-content">
                        <div class="sub-head">
                            <a href="#3-feed">
                                <i class="fa-solid fa-angle-left"></i>
                            </a>
                            <a href="#5-feed">
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </div>
                        <div class="ins-cap">
                            [Ended] congrats to the winner @kyliedyy 🎉🎊🎉
                            [Giveaway] KBDfans D60lite X GMK Pharaoh

                            Link: http://kbd.fans/d60lite
                            Designer: @sxm_designs

                            -The D60Lite X Pharaoh keyboard kit is in stock and ready to ship right now
                            -Get a chance to win a D60lite x GMK Pharaoh today. (Includes the whole DIY kit)
                            -We are giving away ONE D60lite x GMK Pharaoh to a lucky winner!
                            -All you have to do to participate in the drawing is:
                            1. Tag 2 friends in the comment section
                            2. Follow @kbdfans and @sxm_designs on Instagram
                            3. Comment with the layout you want. (HHKB or WK)
                            4. The winner will be chosen and announced by us, on this post, on July 25th. (GMT+8
                            timezone) This is available for anyone globally! Good luck! Can’t wait to send these
                            out to you!
                            5. Friendly reminder: Do not answer to someone else besides @kbdfans!!! We will NOT
                            ask you to pay anything for this giveaway!!!

                            #keyboard #keyboards #mechkb #keycap #keycaps #keycapdesign #design #epbt #gmk
                            #setup #battlestation #keyset #keysets #keycapset #keycapsets #render #tgr
                            #programmer #mechanical #gaming #kbwarriors #gamer #gamerlife #kbdfans #giveaway
                        </div>
                    </div>
                    <div class="ins-date">
                        <span>July 25th</span>
                        <a href="https://www.instagram.com/p/CgTmPcvvtDZ/">View on Instagram</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="feed-lightbox" id="5-feed">
            <div class="lightbox-ins">
                <div class="ins-img">
                    <a href="#">
                        <img src="{{ '/images/feed5.jpg' }}">
                    </a>
                </div>
                <div class="ins-desc">
                    <div class="ins-head">
                        <img src="https://instafeed.nfcube.com/assets/img/logo-instagram-transparent.png"
                            data-feed-id="insta-feed" class="profile-picture js-lazy-image js-lazy-image--handled"
                            data-src="https://instafeed.nfcube.com/assets/img/logo-instagram-transparent.png">
                        <div class="name-section"><a href="#">@KBDfans</a></div>
                        <a href="#_" class="ins-close">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                    <hr>
                    <div class="ins-content">
                        <div class="sub-head">
                            <a href="#4-feed">
                                <i class="fa-solid fa-angle-left"></i>
                            </a>
                            <a href="#6-feed">
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </div>
                        <div class="ins-cap">
                            [Ended] congrats to the winner @kyliedyy 🎉🎊🎉
                            [Giveaway] KBDfans D60lite X GMK Pharaoh

                            Link: http://kbd.fans/d60lite
                            Designer: @sxm_designs

                            -The D60Lite X Pharaoh keyboard kit is in stock and ready to ship right now
                            -Get a chance to win a D60lite x GMK Pharaoh today. (Includes the whole DIY kit)
                            -We are giving away ONE D60lite x GMK Pharaoh to a lucky winner!
                            -All you have to do to participate in the drawing is:
                            1. Tag 2 friends in the comment section
                            2. Follow @kbdfans and @sxm_designs on Instagram
                            3. Comment with the layout you want. (HHKB or WK)
                            4. The winner will be chosen and announced by us, on this post, on July 25th. (GMT+8
                            timezone) This is available for anyone globally! Good luck! Can’t wait to send these
                            out to you!
                            5. Friendly reminder: Do not answer to someone else besides @kbdfans!!! We will NOT
                            ask you to pay anything for this giveaway!!!

                            #keyboard #keyboards #mechkb #keycap #keycaps #keycapdesign #design #epbt #gmk
                            #setup #battlestation #keyset #keysets #keycapset #keycapsets #render #tgr
                            #programmer #mechanical #gaming #kbwarriors #gamer #gamerlife #kbdfans #giveaway
                        </div>
                    </div>
                    <div class="ins-date">
                        <span>July 25th</span>
                        <a href="https://www.instagram.com/p/CgTmPcvvtDZ/">View on Instagram</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="feed-lightbox" id="6-feed">
            <div class="lightbox-ins">
                <div class="ins-img">
                    <a href="#">
                        <video controls="" playsinline="" muted="" id="video-6-instafeed" preload="none"
                            src="https://video.cdninstagram.com/v/t50.16885-16/293163744_165871049266929_2588648198706358088_n.mp4?_nc_cat=103&amp;vs=2240125052819283_3609487004&amp;_nc_vs=HBksFQAYJEdPQlNlUkh4VnZqYzI1WUFBRWpuV0V6U3Vld2pidlZCQUFBRhUAAsgBABUAGCRHRVptY2hIMXlOWmhGV1VJQU5jNmJiRUc2LWdJYnZWQkFBQUYVAgLIAQAoABgAGwGIB3VzZV9vaWwBMRUAACasjdiLvd6SQBUCKAJDMywXQDoNkWhysCEYEmRhc2hfYmFzZWxpbmVfMV92MREAdewHAA%3D%3D&amp;ccb=1-7&amp;_nc_sid=59939d&amp;efg=eyJ2ZW5jb2RlX3RhZyI6InZ0c192b2RfdXJsZ2VuLjcyMC5pZ3R2In0%3D&amp;_nc_ohc=GfQFL_KWx5sAX_ROLuw&amp;_nc_ht=video.cdninstagram.com&amp;edm=ANo9K5cEAAAA&amp;oh=00_AT-2PB3leqZVl1m_s7z0fT5kGEKFIp5dgrHG3y_g33PuLw&amp;oe=62E415AE&amp;_nc_rid=98c1600de7"
                            video=""></video>
                    </a>
                </div>
                <div class="ins-desc">
                    <div class="ins-head">
                        <img src="https://instafeed.nfcube.com/assets/img/logo-instagram-transparent.png"
                            data-feed-id="insta-feed" class="profile-picture js-lazy-image js-lazy-image--handled"
                            data-src="https://instafeed.nfcube.com/assets/img/logo-instagram-transparent.png">
                        <div class="name-section"><a href="#">@KBDfans</a></div>
                        <a href="#_" class="ins-close">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                    <hr>
                    <div class="ins-content">
                        <div class="sub-head">
                            <a href="#5-feed">
                                <i class="fa-solid fa-angle-left"></i>
                            </a>
                            <a href="#1-feed">
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </div>
                        <div class="ins-cap">
                            [Ended] congrats to the winner @kyliedyy 🎉🎊🎉
                            [Giveaway] KBDfans D60lite X GMK Pharaoh

                            Link: http://kbd.fans/d60lite
                            Designer: @sxm_designs

                            -The D60Lite X Pharaoh keyboard kit is in stock and ready to ship right now
                            -Get a chance to win a D60lite x GMK Pharaoh today. (Includes the whole DIY kit)
                            -We are giving away ONE D60lite x GMK Pharaoh to a lucky winner!
                            -All you have to do to participate in the drawing is:
                            1. Tag 2 friends in the comment section
                            2. Follow @kbdfans and @sxm_designs on Instagram
                            3. Comment with the layout you want. (HHKB or WK)
                            4. The winner will be chosen and announced by us, on this post, on July 25th. (GMT+8
                            timezone) This is available for anyone globally! Good luck! Can’t wait to send these
                            out to you!
                            5. Friendly reminder: Do not answer to someone else besides @kbdfans!!! We will NOT
                            ask you to pay anything for this giveaway!!!

                            #keyboard #keyboards #mechkb #keycap #keycaps #keycapdesign #design #epbt #gmk
                            #setup #battlestation #keyset #keysets #keycapset #keycapsets #render #tgr
                            #programmer #mechanical #gaming #kbwarriors #gamer #gamerlife #kbdfans #giveaway
                        </div>
                    </div>
                    <div class="ins-date">
                        <span>July 25th</span>
                        <a href="https://www.instagram.com/p/CgTmPcvvtDZ/">View on Instagram</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- end page content -->

    @include('partials.side-cart')

@endsection
