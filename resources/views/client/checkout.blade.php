@extends('client.layout')

@section('content')
    <div class="cart-table-area section-padding-100">
        <form action="{{ url('/checkout') }}" method="post">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">
                            <div class="cart-title">
                                <h2>Checkout</h2>
                            </div>
                            @include('message')
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <input type="text" class="form-control" name="nama" placeholder="Full Name" required="required" value="{{ @$delivery->nama ? @$delivery->nama : auth()->user()->nama }}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required="required" value="{{ @$delivery->email ? @$delivery->email : auth()->user()->email }}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="alamat" cols="30" rows="5" class="form-control" placeholder="Address">{{ @$delivery->alamat }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="kode_pos" placeholder="ZIP Code" required="required" value="{{ @$delivery->kode_pos }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="no_telp" placeholder="No. HP" required="required" value="{{ @$delivery->no_telp }}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Total Payment</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>@rupiah($totalPayment)</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>@rupiah($totalPayment)</span></li>
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
