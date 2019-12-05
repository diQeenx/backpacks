<div class="row">
    @foreach($data['products'] as $product)
        <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
            <div class="product-wrapper mb-10">
                <div class="product-img">
                    <a href="{{ route('product', [$product['detail_id']]) }}">
                        <img src="{{ asset($product['image']) }}" alt="">
                    </a>
                </div>
                <div class="product-content text-center">
                    <h4><a href="{{ route('product', [$product['detail_id']])  }}">{{ $product['brand'] }} {{ $product['name'] }}</a></h4>
                    <div class="product-price">
                        <span class="new">{{ $product['price'] }} BYN</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{ $data['paginate']->links() }}
