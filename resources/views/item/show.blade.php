@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                @include('success')
                <div class="card">
                    <div class="card-header">Item review</div>

                    <div class="card-body">
                        <div class="row border">
                            <div class="col center-text">
                                <b>Name:</b>&nbsp;{{ $item->name }}
                            </div>
                        </div>
                        <div class="row border">
                            <div class="col border-right center-text">
                                <b>Count:</b>&nbsp;{{ $item->count }}
                            </div>
                            <div class="col center-text">
                                <b>Price:</b>&nbsp;{{ $item->price }}€
                            </div>
                        </div>
                        <div class="row border">
                            <div class="col center-text">
                                <b>Description</b>
                            </div>
                        </div>
                        <div class="row border">
                            <div class="col">
                                {{ $item->description }}
                            </div>
                        </div>
                        <div class="row border">
                            <div class="col border-right center-text">
                                <b>Created:</b>&nbsp;{{$item->created_at}}
                            </div>
                            <div class="col center-text">
                                <b>Updated:</b>&nbsp;{{$item->updated_at}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
