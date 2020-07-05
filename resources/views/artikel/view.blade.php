@extends('layouts.master')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Create Artikel</h1>
<a href="{{ url('artikel/'.$data->id.'/edit') }}" class="btn btn-info pull-right">Edit</a>
<button onclick="deleteData()" class="btn btn-danger pull-right">Delete</button>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Judul</label>
            <input class="form-control" name="judul" id="judul" required type="text" value="{{$data->judul}}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Isi</label>
            <input class="form-control" name="isi" id="isi" required type="text" value="{{$data->isi}}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Slug</label>
            <input class="form-control" name="slug" id="slug" required type="text" value="{{$data->slug}}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Tag</label>
            <br>
            @foreach ($data->tag as $r)
                <span class="badge badge-info">{{$r}}</span>
            @endforeach
            {{-- <input class="form-control" name="tag" id="tag" required type="text" value="{{$data->tag}}"> --}}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function deleteData(){
        $.ajax({
            type : 'delete',
            url : '{{ url('artikel/'.$data->id) }}',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data berhasil di hapus!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                window.location.href = "{{ url('artikel') }}";
            }
        });
    }
</script>
@endpush
