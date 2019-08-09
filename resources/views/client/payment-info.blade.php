@extends('client.layout')

@section('content')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="checkout_details_area mt-50 clearfix">
                        <div class="cart-title">
                            <h2>Payment Information</h2>
                        </div>
                        @include('message')
                        <p>Silahkan transfer 1 x 24 jam untuk melakukan pembelian.</p>
                        <p class="text-center"><strong>PT. TeguhKoko Sejahtera</strong></p>
                        <div class="row">
                            <div class="col-6 text-center">
                                <img src="{{ asset('client/img/bni.png') }}" alt="" style="width: 60%">
                                <p>0464314612 <br> Sdr Muhammad Teguh Kurnianto</p>
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ asset('client/img/bri.jpg') }}" alt="" style="width: 60%">
                                <p>10516232 <br> Sdr Koko Chiggo</p>
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ asset('client/img/mandiri.png') }}" alt="" style="width: 60%">
                                <p>1051226 <br> Sdr Hamba Allah</p>
                            </div>
                            <div class="col-6 text-center">
                                <img src="{{ asset('client/img/bca.png') }}" alt="" style="width: 60%">
                                <p>12341234 <br> Sdr Atta Halilintar </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>Total Payment</h5>
                        <ul class="summary-table">
                            <li><span>subtotal:</span> <span>@rupiah($transaksi->total_harga)</span></li>
                            <li><span>delivery:</span> <span>Free</span></li>
                            <li><span>total:</span> <span>@rupiah($transaksi->total_harga)</span></li>
                        </ul>
                        <div class="cart-btn mt-100">
                            <a href="{{ url('/order') }}" class="btn amado-btn w-100">Go to my orders</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
