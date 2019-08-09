@extends('client.layout')

@section('content')
    <div class="single-product-area section-padding-100 clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{ asset('uploads/barang/'.$barang->gambar) }});">
                                </li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a class="gallery_img" href="{{ asset('uploads/barang/'.$barang->gambar) }}">
                                        <img class="d-block w-100" src="{{ asset('uploads/barang/'.$barang->gambar) }}" alt="product image">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">

                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">@rupiah($barang->harga)</p>
                            <a href="{{ url('/produk/'.$barang->id) }}">
                                <h6>{{ $barang->nama_barang }}</h6>
                            </a>

                            @if($barang->stok > 0)
                            <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                            @endif
                        </div>
                        <div class="short_overview my-5">
                            <p>{{ $barang->deskripsi }}</p>
                        </div>

                        @include('message')
                        <form class="cart clearfix" action="{{ url('/cart/'.$barang->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="cart-btn d-flex mb-50">
                                <p>Qty</p>
                                <div class="quantity">
                                    <span class="qty-minus" onclick="if (!window.__cfRLUnblockHandlers) return false; var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;" data-cf-modified-69f465882076911384599589-=""><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="qty" value="1">
                                    <span class="qty-plus" onclick="if (!window.__cfRLUnblockHandlers) return false; var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;" data-cf-modified-69f465882076911384599589-=""><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <button type="submit" name="addtocart" value="5" class="btn amado-btn">Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
