<div class="suggestions">
    <div class="container" style="padding-top: 3em">
        <h3 class="lead" style="margin-bottom: 2em">Bạn cũng sẽ thích</h3>
        <!-- start products row -->
        <div class="row">
            @foreach ($mightLike as $product)
                <!-- start single product -->
                <div class="col-md-6 col-sm-12 col-lg-4 product">
                    <a href="{{ route('shop.show', $product->slug) }}" class="custom-card">
                        <div class="card view overlay zoom">
                            <img src="{{ productImage($product->image) }}" class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}<span class="float-right">{{ format($product->price) }} VND</span></h5>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single product -->
            @endforeach
        </div>
        <!-- end products row -->
    </div>
</div>
<!--  end suggestions -->