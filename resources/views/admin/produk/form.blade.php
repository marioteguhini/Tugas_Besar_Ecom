@extends('admin.layout')

@section('js')
    <script type="text/javascript" src="{{ asset('app-assets') }}/vendors/js/ui/jquery.sticky.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/forms/selects/select2.min.css">
@endsection
@section('style')
    <style>
        .img-preview{
            width: 200px;
            margin-bottom: 20px;
            display: block;
        }
    </style>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header row mb-1">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">{{ $title }} Produk</h3>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                <a class="btn btn-info round box-shadow-2 px-2" id="btnGroupDrop1" href="{{ url('/admin/barang') }}">
                    <i class="ft-pie-chart icon-left"></i> Daftar Produk
                </a>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Zero configuration table -->
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="card-body">
                                @include('message')
                                <form class="form-horizontal" action="{{ $url }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if($title != 'Tambah')
                                        @method('put')
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-12">Gambar</label>
                                        <div class="col-lg-10">
                                            <img class="img-preview" src="{{ @$barang->gambar ? asset('uploads/barang/'.$barang->gambar) : '' }}" alt="" onerror="this.src='{{ asset('app-assets/images/avatar.jpg') }}'">
                                            <input type="file" name="gambar" class="gambar" accept="image/jpeg;images/png">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12">Nama Produk</label>
                                        <div class="col-md-12">
                                            <input type="text" name="nama_barang" value="{{ @old('nama_barang') ?? @$barang->nama_barang }}" class="form-control" placeholder="Masukan nama barang">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12">Kategori</label>
                                        <div class="col-md-12">
                                            <select class="select2 form-control" name="kategori_id[]" multiple="multiple" data-placeholder="Masukan 1 atau lebih karakter untuk mencari..">
                                                @foreach($kategoris as $kategori)
                                                    <option value="{{ $kategori->id }}" {{ (@old('kategori_id') && in_array($kategori->id, explode(',', old('kategori_id')))) ? 'selected' : ((@$barang->kategori_id && in_array($kategori->id, explode(',', @$barang->kategori_id))) ? 'selected' : '') }}>{{ $kategori->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12">Stok</label>
                                        <div class="col-md-12">
                                            <input type="number" name="stok" value="{{ @old('stok') ?? @$barang->stok }}" class="form-control" placeholder="Masukan jumlah stok">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12">Harga satuan</label>
                                        <div class="col-md-12">
                                            <input type="number" name="harga" value="{{ @old('harga') ?? @$barang->harga }}" class="form-control" placeholder="Masukan harga barang">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12">Deskripsi</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="deskripsi" cols="20" rows="5" placeholder="Masukan deskripsi barang">{{ @old('deskripsi') ?? @$barang->deskripsi }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- END Dynamic Table Full -->
@endsection
