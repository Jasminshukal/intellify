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

                    <a href='{{ route('Sections.create') }}' class='btn btn-info mb-2'>Add Serction </a>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Section Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($section as $item)
                            <tr>
                                <th scope="row">{{ $loop->index + 1}}</th>
                                <td>{{  $item->name }}</td>
                                <td>
                                    {{  $item->status }}
                                </td>
                                <td>
                                    <form method="POST" action='{{  route('Sections.destroy',$item) }}' id="delete_section_{{ $item->id }}">
                                    <a href="{{ route('Module.index',['id'=>$item->id]) }}" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Module</a>
                                    <a href="{{ route('Sections.edit',$item) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        @csrf
                                        @method('DELETE')

                                        <a href="JavaScript:void(0)" class="btn btn-danger show-alert" data-value="delete_section_{{ $item->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
