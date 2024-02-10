@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Section') }}</div>
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
                    <form method="POST" action="{{ route('Sections.update',$section) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group mb-2">
                          <label for="exampleInputEmail1">Name</label>
                          <input name="name" type="name" value="{{ $section->name }}" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required>
                        </div>
                        <div class="form-group mb-2">
                          <label for="exampleInputPassword1">Status</label>
                          <select name="status" class="form-control" id="exampleFormControlSelect1" aria-describedby="emailHelp" required>
                            <option value="active" @if($section->status=='active') selected @endif>Active</option>
                            <option value="inactive" @if($section->status=='inactive') selected @endif>Inactive</option>
                          </select>
                          <small id="emailHelp" class="form-text text-muted">geting list acording to this status</small>

                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
