@extends('layouts.public')

@section('title')
    | {{ $page->title }}
@endsection

@section('content')
    <div class="col">
        <img class="img-fluid" src="{{ $page->image }}"/>
    </div>
    {!! $page->body !!}
@endsection
