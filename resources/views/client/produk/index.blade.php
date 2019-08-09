@extends('client.layout')

@section('content')
    <div class="shop_sidebar_area">

        <div class="widget catagory mb-50">

            <h6 class="widget-title mb-30">Catagories</h6>

            <div class="catagories-menu">
                <ul>
                    <li class="{{ empty(request()->kategori) ? 'active' : '' }}"><a href="{{ url('/produk') }}">Semua</a></li>
                    @foreach($kategoris as $kategori)
                        <li class="{{ request()->kategori == $kategori->id ? 'active' : '' }}"><a href="{{ url('/produk?kategori='.$kategori->id) }}">{{ $kategori->nama_kategori }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="amado_product_area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                @if(@request()->search)
                <div class="col-12">
                    <div class="alert alert-info" style="font-weight: 100">
                        Showing result <strong>"{{ @request()->search }}"</strong>
                    </div>
                </div>
                @endif
                @foreach($produks as $produk)
                <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                    <div class="single-product-wrapper">
                        <div class="product-img">
                            <img src="{{ asset('uploads/barang/'.$produk->gambar) }}" alt="">
                        </div>

                        <div class="product-description d-flex align-items-center justify-content-between">

                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">@rupiah($produk->harga)</p>
                                <a href="{{ url('produk/'.$produk->id) }}">
                                    <h6>{{ $produk->nama_barang  }}</h6>
                                </a>
                            </div>

                            <div class="ratings-cart text-right">
                                <div class="cart">
                                    <a href="{{ url('produk/'.$produk->id) }}" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="{{ asset('client/img') }}/core-img/cart.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">

                    <nav aria-label="navigation">
                        {{ $produks->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
