@extends('client.layout')

@section('content')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="cart-title mt-50">
                        <h2>My Orders</h2>
                    </div>
                    <div class="cart-table clearfix">
                        @include('message')
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>No. Inv</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Detail Order</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($orders->count() == 0)
                                <tr>
                                    <th colspan="6">No data order.</th>
                                </tr>
                            @endif
                            @foreach($orders as $key => $order)
                                <tr>
                                    <td><strong>#{{ $order->id }}</strong></td>
                                    <td>{{ $order->delivery->nama }}</td>
                                    <td>{{ $order->delivery->alamat }}</td>
                                    <td>
                                        <ol>
                                            @foreach($order->detail as $detail)
                                                <li>{{ @$detail->barang->nama_barang }} ({{ $detail->qty }} pcs)</li>
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td>@rupiah($order->total_harga)</td>
                                    <td>
                                        <span class="d-block">
                                            {{ app('order_status')['name'][$order->status] }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($order->status == 1)
                                            <a href="{{ url('/payment-info/'.$order->id) }}" class="btn btn-primary btn-sm mt-2">Bayar</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
