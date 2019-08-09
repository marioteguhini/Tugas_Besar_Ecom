@extends('admin.layout')

@section('js')
    <script type="text/javascript" src="{{ asset('app-assets') }}/vendors/js/ui/jquery.sticky.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
@endsection
@section('script')
    <script src="{{ asset('app-assets') }}/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>
    <script>
        $('.selectStatus').on('change', function(){
            var val = $(this).val();

            $(this).parents('form').submit();
        });
    </script>
@endsection

@section('css')
@endsection
@section('style')
    <style>
        .table .img-preview{
            width: 70px;
            margin-right: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Daftar Transaksi</h3>
            </div>
        </div>
        <div class="content-body">
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>No. Struk</th>
                                            <th>User</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($transaksis as $transaksi)
                                            <tr>
                                                <td>#{{ $transaksi->id }}</td>
                                                <td>
                                                    <a href="{{ url('admin/user/'.$transaksi->user_id.'/edit') }}">{{ $transaksi->user->nama }}</a>
                                                </td>
                                                <td>{{ $transaksi->delivery->nama }}</td>
                                                <td>{{ $transaksi->created_at }}</td>
                                                <td>
                                                    <form action="{{ url('admin/transaksi/'.$transaksi->id) }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <select name="status" class="form-control select2 selectStatus">
                                                            <option value="1" {{ $transaksi->status == 1 ? 'selected' : '' }}>Belum dibayar</option>
                                                            <option value="2" {{ $transaksi->status == 2 ? 'selected' : '' }}>Sudah Bayar</option>
                                                            <option value="3" {{ $transaksi->status == 3 ? 'selected' : '' }}>Dalam Pengiriman</option>
                                                            <option value="4" {{ $transaksi->status == 4 ? 'selected' : '' }}>Selesai</option>
                                                        </select>
                                                    </form>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ url('/admin/transaksi/'.$transaksi->id) }}" class="btn btn-primary"><i class="ft ft-eye"></i></a>
                                                    <a href="#" class="btn btn-danger btnDelete" data-url="{{ url('/admin/transaksi/'.$transaksi->id) }}"><i class="ft ft-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <form action="#" method="post" id="formDelete" class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Zero configuration table -->
        </div>
    </div>
@endsection
