@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Category items
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Count</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Updated</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($items->count() > 0)
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>
                                            <a href="/items/{{$item->id}}">{{$item->name}}</a>
                                        </td>
                                        <td>{{$item->count}}</td>
                                        <td>{{$item->price}}€</td>
                                        <td>{{$item->description}}</td>
                                        <td>{{$item->updated_at}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="center-td" colspan="6">This category has zero assigned items</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="inline-space">
                            <div>{{ $items->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
