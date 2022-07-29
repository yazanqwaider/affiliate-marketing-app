@extends('layouts.master')

@section('content')
    <div>

        @include('categories.create')

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->type }}</td>
                    </tr>

                    @include('categories.edit', ['category' => $category])
                @endforeach
            </tbody>
        </table>
    </div>
@endsection