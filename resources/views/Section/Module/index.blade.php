@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Section Module') }}</div>

                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href='{{ route('Module.create',['id'=>$id]) }}' class='btn btn-info mb-2'>Add Module</a>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Module Name</th>
                            <th scope="col">Module Type</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($module as $item)
                            <tr>
                                <th scope="row">{{ $loop->index + 1}}</th>
                                <td>{{  $item->name }}</td>
                                <td>
                                    {{  $item->type }}
                                </td>
                                <td>
                                    <form method="POST" action='{{  route('Module.destroy',['id'=>$item->section_id,'Module'=>$item]) }}' id="delete_module_{{ $item->id }}">
                                    <a href="{{ $item->file_name }}" class="btn btn-primary" target="_blank"><i class="fa fa-film" aria-hidden="true"></i>                                    </a>
                                    <a href="{{ route('Module.edit',['id'=>$item->section_id,'Module' => $item]) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        @csrf
                                        @method('DELETE')

                                        <a onclick="myFunction('delete_module_{{ $item->id }}')" class="btn btn-danger" data-value="delete_section_{{ $item->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </form>
                                </td>
                              </tr>
                            @empty
                            <tr>
                                <th colspan="4" class="text-center" scope="row"> No Data Found</th>
                              </tr>

                            @endforelse

                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
