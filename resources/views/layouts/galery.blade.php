@extends('layouts.public')

@section('title')
    | Bilder
@endsection

@section('content')
<div class="row">
    @foreach($images as $image)
        @include('parts.imagebox')
    @endforeach
</div>
@endsection
