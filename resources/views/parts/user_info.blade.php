@if($user->$prop)
    <h4>{{ ucfirst($name ?? $prop) }}: <span class="text-right pull-right">{{$user->$prop}}</span></h4>
@endif
