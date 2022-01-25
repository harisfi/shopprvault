@extends('user.master')

@push('title', 'Home')

@push('styles')
    <style>
        h1.logo {
            margin-bottom: 0;
            margin-top: 15px;
            color: white;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div id="aside" class="col-md-3">
            <div class="aside">
                <h3 class="aside-title">Price</h3>
                <div class="price-filter">
                    <div id="price-slider"></div>
                    <div class="input-number price-min">
                        <input id="price-min" type="number">
                        <span class="qty-up">+</span>
                        <span class="qty-down">-</span>
                    </div>
                    <span>-</span>
                    <div class="input-number price-max">
                        <input id="price-max" type="number">
                        <span class="qty-up">+</span>
                        <span class="qty-down">-</span>
                    </div>
                </div>
            </div>

            <div class="aside">
                <h3 class="aside-title">Brand</h3>
                <div class="checkbox-filter">
                    <div class="input-checkbox">
                        <input type="checkbox" id="brand-1">
                        <label for="brand-1">
                            <span></span>
                            SAMSUNG
                            <small>(578)</small>
                        </label>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="brand-2">
                        <label for="brand-2">
                            <span></span>
                            LG
                            <small>(125)</small>
                        </label>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="brand-3">
                        <label for="brand-3">
                            <span></span>
                            SONY
                            <small>(755)</small>
                        </label>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="brand-4">
                        <label for="brand-4">
                            <span></span>
                            SAMSUNG
                            <small>(578)</small>
                        </label>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="brand-5">
                        <label for="brand-5">
                            <span></span>
                            LG
                            <small>(125)</small>
                        </label>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="brand-6">
                        <label for="brand-6">
                            <span></span>
                            SONY
                            <small>(755)</small>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div id="store" class="col-md-9">
            <div class="row">
                @foreach ($products['data'] as $product)
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="{{ $product['picture'] }}" alt="">
                            </div>
                            <div class="product-body">
                                <h3 class="product-name"><a href="#">{{ $product['name'] }}</a></h3>
                                <h4 class="product-price">Rp. {{ $product['price'] }}</h4>
                                <div class="product-rating">
                                    @for ($i = 0; $i < $product['rating']; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="store-filter clearfix">
                <ul class="store-pagination">
                    @foreach ($products['links'] as $link)
                        @if ($link['active'])
                            <li class="active">
                                {!! $link['label'] !!}
                            </li>
                        @else
                            <li>
                                <a href="{{ $link['url'] }}">
                                    {!! $link['label'] !!}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection