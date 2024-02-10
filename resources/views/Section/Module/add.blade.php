@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Module') }}</div>
                <div class="card-body">

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
                    <form method="POST" action="{{ route('Module.store',['id'=>$id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                          <label for="exampleInputEmail1">Name</label>
                          <input name="name" type="name" value="{{ old('name') }}" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required>
                        </div>
                        <div class="form-group mb-2">
                          <label for="exampleInputPassword1">Type</label>
                          <select name="type" class="form-control" id="exampleFormControlSelect1" aria-describedby="emailHelp" required>
                            <option value="image" >Image</option>
                            <option value="video">Video</option>
                            <option value="audio">Audio</option>
                          </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">File</label>
                            <input name="file" type="file" class="form-control" accept="audio/*,video/*,image/*" required>
                          </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
