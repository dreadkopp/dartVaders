@extends('layouts.public')

@section('title')
    | {{ $title }}
@endsection

@section('content')

@foreach($posts as $post)
    @include('parts.post')
    <hr>
@endforeach


<div class="blognav d-flex justify-content-center">
    {!! $posts->links('parts.pagination') !!}
</div>
<style>
    .blognav svg {
        display: none;
    }
</style>
@endsection

