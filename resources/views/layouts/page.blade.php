@extends('layouts.public')

@section('title')
    | {{ $page->title }}
@endsection

@section('content')
    <div class="row">
        <img class="img-fluid" src="storage/{{ $page->image }}"/>
    </div>

    <div class="row mt-5">
        {!! $page->body !!}
    </div>
@endsection
