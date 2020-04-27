@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('modal')
                @include('error')
                @include('success')
                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Updated</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>
                                        <a href="/category/{{$category->id}}">{{$category->name}}</a>
                                    </td>
                                    <td>{{$category->updated_at}}</td>
                                    <td class="text-center">
                                        <a href="{{route('cat.edit', $category->id)}}" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a data-toggle="modal" data-target="#delete-modal" title="Delete"
                                           onclick="deleteData({{$category->id}}, '{{$category->name}}')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="inline-space">
                            <div>{{ $categories->links() }}</div>
                            <div>
                                <a href="{{ route('cat.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Add category
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            function deleteData(id, name) {
                let url = '{{ route('cat.destroy', ':id') }}';
                url = url.replace(':id', id);
                document.getElementById('delete-info').innerText = 'Deleting category - ' + name;
                $("#delete-form").attr('action', url);
            }
        </script>
    @endpush
@endsection
