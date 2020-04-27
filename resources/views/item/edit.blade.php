@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add item</div>
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

                        <form method="post" action="{{ route('item.update', $item->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-3">
                                    <label for="category_id">Category*</label>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            @if ($item->category->id == $category->id)
                                                <option selected value="{{$category->id}}">{{$category->name}}</option>
                                            @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="count">Count*</label>
                                    <input type="number" class="form-control" name="count" value="{{ old('count', $item->count) }}"/>
                                </div>
                                <div class="form-group col-3">
                                    <label for="price">Price*</label>
                                    <input type="number" class="form-control" name="price" value="{{ old('price', $item->price) }}"/>
                                </div>
                                <div class="form-group col-3">
                                    <label for="name">Name*</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $item->name) }}"/>
                                </div>
                                <div class="form-group col-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" rows="3">{{ old('description', $item->description) }}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save item</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
