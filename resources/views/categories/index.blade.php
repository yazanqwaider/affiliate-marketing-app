@extends('layouts.master')

@section('content')
    <div>

        <div>
            <button type="button" class="btn btn-outline-success btn-sm my-1" data-toggle="modal" data-target="#createCategoryModal">
                Create Category
            </button>

            @include('categories.create')
        </div>

        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->type }}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$category->id}}Modal">
                                Edit
                            </button>
                            {{-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#edit{{$category->id}}Modal">
                                Delete
                            </button> --}}
                        </td>
                    </tr>

                    @include('categories.edit', ['category' => $category])
                @endforeach
            </tbody>
        </table>
    </div>
@endsection