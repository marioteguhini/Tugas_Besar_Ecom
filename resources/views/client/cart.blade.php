@extends('client.layout')

@section('content')
    <div class="cart-table-area section-padding-100">
        <form action="{{ url('/cart/checkout') }}" method="post">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>
                        <div class="cart-table clearfix">
                            @include('message')
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($carts->count() == 0)
                                    <tr>
                                        <th colspan="6">No data cart.</th>
                                    </tr>
                                @endif
                                @php
                                    $total_harga = 0;
                                @endphp
                                @foreach($carts as $key => $cart)
                                <tr>
                                    <td class="cart_product_img">
                                        <a href="{{ url('/produk/'.$cart->barang_id) }}"><img src="{{ asset('uploads/barang/'.$cart->barang->gambar) }}" alt="Product"></a>
                                    </td>
                                    <td class="cart_product_desc">
                                        <h5>{{ $cart->barang->nama_barang }}</h5>
                                    </td>
                                    <td class="price">
                                        <span>@rupiah($cart->barang->harga)</span>
                                    </td>
                                    <td class="qty">
                                        <div class="qty-btn d-flex">
                                            <p>Qty</p>
                                            <div class="quantity">
                                                <span class="qty-minus" onclick="if (!window.__cfRLUnblockHandlers) return false; var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;" data-cf-modified-09348e3610f2bea807759706-=""><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="qty[{{ $cart->id }}]" value="{{ $cart->qty }}">
                                                <span class="qty-plus" onclick="if (!window.__cfRLUnblockHandlers) return false; var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;" data-cf-modified-09348e3610f2bea807759706-=""><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $total_harga += $cart->qty * $cart->barang->harga;
                                @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>@rupiah($total_harga)</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>@rupiah($total_harga)</span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <button type="submit" class="btn amado-btn w-100">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
