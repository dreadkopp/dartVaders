<div class="userbox col-sm-12 col-md-8">
    <div class="row">
        <div class="col-sm-5">
            <img src="{{asset('/storage/'.$user->avatar)}}" class="img-fluid deppenbild"/>



            <div class="padding_left_15_inner padding_right_15_inner margin-left-15 margin-right-15">
            <h3 class="margin_top_30">Titel: {{ $user->title }}</h3>

            @include('parts.user_info',['prop' => 'patches'])
            @include('parts.user_info',['prop' => 'wurfhand'])
            @include('parts.user_info',['prop' => 'greatest_finish','name' => 'Bestes Finish'])
            @include('parts.user_info',['prop' => 'fav_finish','name' => 'Lieblingsfinish'])
            @include('parts.user_info',['prop' => 'fav_player','name' => 'Lieblingsspieler'])
            </div>
        </div>
        <div class="col-sm-7">
            <h2>{{ $user->name }}</h2>
            <hr>
            <span class="bioclass">{{$user->bio}}</span>
            @if($user->setup_board)
            <hr>

                <h4>Board</h4>
                <span>{{$user->setup_board}}</span>
            @endif
            @if($user->setup_arrows)
            <hr>
                <h4>Pfeile</h4>
                <span>{{$user->setup_arrows}}</span>
            @endif
        </div>
    </div>
</div>
<div class="display-sm-none col-md-4"></div>
<div class="display-sm-none col-md-4"></div>
