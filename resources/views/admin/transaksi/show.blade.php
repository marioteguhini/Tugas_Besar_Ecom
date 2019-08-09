@extends('admin.layout')

@section('js')
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/select2/select2.full.min.js"></script>
@endsection
@section('script')
    <script>
        $('.select2').select2();

        $('.gambar').on('change', function(){
            var input = this;
            var url = $(this).val();
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.img-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin-asset/assets') }}/js/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('admin-asset/assets') }}/js/plugins/select2/select2-bootstrap.min.css">

@endsection
@section('style')
    <style>
        .img-preview{
            width: 100px;
            margin-bottom: 20px;
            display: block;
        }
    </style>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header row mb-1">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Detail Transaksi</h3>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                <a class="btn btn-info round box-shadow-2 px-2" id="btnGroupDrop1" href="{{ url('/admin/transaksi') }}">
                    <i class="la la-dollar icon-left"></i> Daftar Transaksi
                </a>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section class="card">
            <div id="invoice-template" class="card-body">
                <!-- Invoice Company Details -->
                <div id="invoice-company-details" class="row">
                    <div class="col-md-6 col-sm-12 text-center text-md-left">
                        <div class="media">
                            <div class="media-body">
                                <ul class="ml-2 px-0 list-unstyled">
                                    <li class="text-bold-800">PT. Teguh Koko Sejahtera</li>
                                    <li>Pasteur No. 17,</li>
                                    <li>Bandung 40192,</li>
                                    <li>Indonesia</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-center text-md-right">
                        <h2>INVOICE</h2>
                        <p class="pb-3"># INV-{{ $transaksi->id }}</p>
                        <ul class="px-0 list-unstyled">
                            <li>Balance Due</li>
                            <li class="lead text-bold-800">@rupiah($transaksi->total_harga)</li>
                        </ul>
                    </div>
                </div>
                <!--/ Invoice Company Details -->
                <!-- Invoice Customer Details -->
                <div id="invoice-customer-details" class="row pt-2">
                    <div class="col-sm-12 text-center text-md-left">
                        <p class="text-muted">Bill To</p>
                    </div>
                    <div class="col-md-6 col-sm-12 text-center text-md-left">
                        <ul class="px-0 list-unstyled">
                            <li class="text-bold-800">Mr./Mrs. {{ $transaksi->delivery->nama }}</li>
                            <li>{{ $transaksi->delivery->alamat }},</li>
                            <li>{{ $transaksi->delivery->kode_pos }},</li>
                            <li>{{ $transaksi->delivery->no_telp }},</li>
                            <li><a href="mailto:{{ $transaksi->delivery->email }}">{{ $transaksi->delivery->email }}</a>.</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12 text-center text-md-right">
                        <p>
                            <span class="text-muted">Invoice Date :</span> @date($transaksi->created_at)</p>
                    </div>
                </div>
                <!--/ Invoice Customer Details -->
                <!-- Invoice Items Details -->
                <div id="invoice-items-details" class="pt-2">
                    <div class="row">
                        <div class="table-responsive col-sm-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item & Description</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Qty</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transaksi->detail as $key => $detail)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>
                                        <p>{{ $detail->barang->nama_barang }}</p>
                                        <p class="text-muted">{{ $detail->barang->deskripsi }}</p>
                                    </td>
                                    <td class="text-right">@rupiah($detail->barang->harga)</td>
                                    <td class="text-right">{{ $detail->qty }}</td>
                                    <td class="text-right">@rupiah($detail->barang->harga*$detail->qty)</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <th colspan="4" class="text-right">Total</th>
                                    <th class="text-right">@rupiah($transaksi->total_harga)</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
