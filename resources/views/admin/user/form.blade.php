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
            <h3 class="content-header-title mb-0">{{ $title }} User</h3>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                <a class="btn btn-info round box-shadow-2 px-2" id="btnGroupDrop1" href="{{ url('/admin/user') }}">
                    <i class="ft-pie-chart icon-left"></i> Daftar User
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
                                <form class="form" action="{{ $url }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if($title != 'Tambah')
                                        @method('put')
                                    @endif

                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-12">Nama</label>
                                            <div class="col-md-12">
                                                <input type="text" name="nama" value="{{ @old('nama') ?? @$user->nama }}" class="form-control" placeholder="Masukan nama user">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" name="email" value="{{ @old('email') ?? @$user->email }}" class="form-control" placeholder="Masukan email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Level</label>
                                            <div class="col-md-12">
                                                <select class="select2 form-control" name="level">
                                                    @foreach(app('user_level')['name'] as $key => $status)
                                                        @if($key == 0)
                                                            @continue
                                                        @endif
                                                        <option value="{{ $key }}" {{ (@old('level') && old('level') == $key) ? 'selected' : ((@$user->level && $user->level == $key) ? 'selected' : '') }}>{{ $status }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Password</label>
                                            <div class="col-md-12">
                                                <input type="password" name="password" value="{{ @old('password') ?? @$user->password }}" class="form-control" placeholder="Masukan Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 text-right">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
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
