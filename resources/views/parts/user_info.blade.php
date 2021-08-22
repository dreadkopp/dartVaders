@if($user->$prop)
    <h4>{{ ucfirst($name ?? $prop) }}: {{$user->$prop}}</h4>
@endif
