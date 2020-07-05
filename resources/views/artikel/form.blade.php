@extends('layouts.master')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Create Artikel</h1>

<form method="post" action="{{ isset($data->id) ? url('artikel/'.$data->id) : url('artikel') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Judul</label>
                <input class="form-control" name="judul" id="judul" required type="text" placeholder="judul" value="{{ isset($data) ? $data->judul : ''}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Isi</label>
                <textarea class="form-control" name="isi" id="isi" required placeholder="isi">{{isset($data) ? $data->isi : ''}}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Slug</label>
                <input class="form-control" name="slug" id="slug" required type="text" placeholder="slug" value="{{isset($data) ? $data->slug : ''}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Tag</label>
                <br>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" name="tag[]" id="tag1" value="politik" type="checkbox">
                    <label class="custom-control-label" for="tag1">Politik</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" name="tag[]" id="tag2" value="anime" type="checkbox">
                    <label class="custom-control-label" for="tag2">Anime</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" name="tag[]" id="tag3" value="game" type="checkbox">
                    <label class="custom-control-label" for="tag3">Game</label>
                </div>
            </div>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-info">{{ isset($data->id) ? 'Edit' : 'Submit' }}</button>
</form>
@endsection

