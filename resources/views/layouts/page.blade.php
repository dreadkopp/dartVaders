@extends('layouts.public')

@section('title')
    | {{ $page->title }}
@endsection

@section('content')
    @if($page->impressum)
    <div class="row">
        <img class="img-fluid" src="storage/{{ $page->image }}"/>
    </div>
    @endif

    <div class="row mt-5">
        {!! $page->body !!}
    </div>
@endsection
