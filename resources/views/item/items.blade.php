@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                @include('modal')
                @include('success')
                <div class="card">
                    <div class="card-header">
                        Items
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Count</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Updated</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->category->name}}</td>
                                    <td>
                                        <a href="/item/{{$item->id}}">{{$item->name}}</a>
                                    </td>
                                    <td>{{$item->count}}</td>
                                    <td>{{$item->price}}€</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td class="text-center">
                                        <a href="{{route('item.edit', $item->id)}}" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a data-toggle="modal" data-target="#delete-modal" title="Delete"
                                           onclick="deleteData({{$item->id}}, '{{$item->name}}')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="inline-space">
                            <div>{{ $items->links() }}</div>
                            <div>
                                <a href="{{ route('item.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Add item
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
                let url = '{{ route('item.destroy', ':id') }}';
                url = url.replace(':id', id);
                document.getElementById('delete-info').innerText = 'Deleting item - ' + name;
                $("#delete-form").attr('action', url);
            }
        </script>
    @endpush
@endsection
