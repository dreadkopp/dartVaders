@extends('layouts.public')

@section('title')
    | {{ $page->title }}
@endsection

@section('content')


    <style>
        .userbox.col-sm-12.col-md-6 {
            padding: 2rem;
            background-color: #2e2e2e21;
        }
        .userbox.col-sm-12.col-md-6:nth-child(2n) {
            border-left: solid black 1px;
            margin-left: -1px;
        }
        .userbox.col-sm-12.col-md-6:nth-child(2n - 1) {
            border-right: solid black 1px;
            margin-right: -1px;
        }
        .deppenbild {
            margin-left:15%;
            border-radius: 50%;
            width: 70%;
            border-color: #2e2e2e;
            border-width: 3px;
            border-style: solid;
            box-shadow: 3px 2px 10px 0px #2e2e2e4a;;
        }

    </style>
    @if($page->image)
    <div class="row">
        <img class="img-fluid" src="storage/{{ $page->image }}"/>
    </div>
    @endif

    <div class="row user-listing">
    @foreach($users as $user)
        @include('parts.User')
    @endforeach
    </div>

    <div class="row mt-5">
        {!! $page->body !!}
    </div>
@endsection
