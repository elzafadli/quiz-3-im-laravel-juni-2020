@extends('layouts.master')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Artikel Page</h1>
    <a href="{{ url('artikel/create') }}" class="btn btn-success pull-right">Create</a>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered table-hover dataTable" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Slug</th>
                        <th>Tag</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $r)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$r->judul}}</td>
                            <td>{{$r->isi}}</td>
                            <td>{{$r->slug}}</td>
                            <td>{{$r->tag}}</td>
                            <td>
                                <div class="box-footer">
                                    <a href="{{ url('artikel/'.$r->id) }}" class="btn btn-success pull-right">View</a>
                                    <a href="{{ url('artikel/'.$r->id.'/edit') }}" class="btn btn-info pull-right">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('sbadmin2/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('sbadmin2/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
{{-- <script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> --}}
<script>
    $( document ).ready(function() {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data berhasil ditampilkan!',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    });

    $(function () {
        $("#dataTable").DataTable();
    });
</script>
@endpush