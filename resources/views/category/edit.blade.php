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
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                        <form method="post" action="{{ route('cat.update', $category->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="name">Name*</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}"/>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
