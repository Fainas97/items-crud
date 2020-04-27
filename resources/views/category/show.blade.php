@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                @include('success')
                <div class="card">
                    <div class="card-header">Category review</div>

                    <div class="card-body">
                        <div class="row border">
                            <div class="col center-text">
                                <b>Name:</b>&nbsp;{{ $category->name }}
                            </div>
                        </div>
                        <div class="row border">
                            <div class="col border-right center-text">
                                <b>Created:</b>&nbsp;{{$category->created_at}}
                            </div>
                            <div class="col center-text">
                                <b>Updated:</b>&nbsp;{{$category->updated_at}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
