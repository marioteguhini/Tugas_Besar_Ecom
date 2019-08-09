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
            width: 80px;
            margin-right: 30px;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Daftar User</h3>
            </div>
        </div>
        <div class="content-body">
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ url('/admin/user/create') }}" class="btn btn-success"><i class="ft ft-plus-square"></i> Tambah User</a>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    @include('message')
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Tanggal dibuat</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    <strong>{{ $user->nama }}</strong>
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <div class="badge badge-{{ app('user_level')['color'][$user->level] }}">
                                                        {{ app('user_level')['name'][$user->level] }}
                                                    </div>
                                                </td>
                                                <td>@datetime($user->created_at)</td>
                                                <td class="text-center">
                                                    <a href="{{ url('admin/user/'.$user->id.'/edit') }}" class="btn btn-warning"><i class="ft ft-edit"></i></a>
                                                    <a href="#" class="btn btn-danger btnDelete" data-url="{{ url('/admin/user/'.$user->id) }}"><i class="ft ft-trash"></i></a>
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
