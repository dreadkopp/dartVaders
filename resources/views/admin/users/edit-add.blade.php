@extends('voyager::master')

@section('page_title','Profi(l)')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        Profil
    </h1>
@stop

@section('content')

    <div class="page-content container-fluid">
        <form class="form-edit-add row" role="form"
              method="POST" enctype="multipart/form-data" autocomplete="off">


            <div class="col-md-4">
                <div class="panel panel panel-bordered panel-warning">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" data-name="name" name="name" value="{{ $user->name }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel panel-bordered panel-warning">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="current_pass">aktuelles Passwort</label>
                            <input type="text" data-name="current_pass" name="current_pass">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel panel-bordered panel-warning">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="new_pass">neues Passwort</label>
                            <input type="text" data-name="new_pass" name="new_pass">
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-2">
                <div class="panel panel panel-bordered panel-warning">
                    <div class="panel-body">
                        <img style="width:128px;height:128px" class="img-fluid" id="current_avatar" src="{{ asset($user->avatar) }}">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel panel-bordered panel-warning">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="avatar">Avatar</label>
                            <input type="file" data-name="avatar" name="avatar" id="avatar">
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-12">
                <div class="panel panel panel-bordered panel-warning">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea data-name="bio" name="bio" style="
                                      width: 100%;
                                      height: 12rem;
                                      ">{{ $user->bio }}</textarea>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="panel panel panel-bordered panel-warning">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="wurfhand">Wurfhand</label>
                            <select data-name="wurfhand" name="wurfhand">
                                <option value="rechts"
                                    @if($user->wurfhand === 'rechts')
                                        selected
                                    @endif
                                >rechts</option>
                                <option value="links"
                                    @if($user->wurfhand === 'links')
                                        selected
                                    @endif
                                >links</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
            <div class="panel panel panel-bordered panel-warning">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="fav_finish">Lieblingsfinish</label>
                        <input type="text" data-name="fav_finish" name="fav_finish" value="{{ $user->fav_finish }}"/>
                    </div>
                </div>
            </div>
            </div>

            <div class="col-md-4">
            <div class="panel panel panel-bordered panel-warning">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="entry_music">Einlaufmusik</label>
                        <input type="text" data-name="entry_music" name="entry_music" value="{{ $user->entry_music }}"/>
                    </div>
                </div>
            </div>
            </div>

            <div class="col-md-4">
            <div class="panel panel panel-bordered panel-warning">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="fav_player">Lieblingsspieler</label>
                        <input type="text" data-name="fav_player" name="fav_player" value="{{ $user->fav_player }}"/>
                    </div>
                </div>
            </div>
            </div>

            <div class="col-md-4">
            <div class="panel panel panel-bordered panel-warning">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="hundredeighties">180's</label>
                        <input type="number" data-name="hundredeighties" name="hundredeighties"
                               value="{{ $user->hundredeighties }}"/>
                    </div>
                </div>
            </div>
            </div>

            <div class="col-md-4">
            <div class="panel panel panel-bordered panel-warning">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="greatest_finish">Bestes Finish</label>
                        <input type="number" data-name="greatest_finish" name="greatest_finish"
                               value="{{ $user->greatest_finish }}"/>
                    </div>
                </div>
            </div>
            </div>

            <div class="col-md-12">
            <button class="btn btn-primary pull-right" id="user_save">
                {{ __('voyager::generic.save') }}
            </button>
            </div>
        </form>

    </div>
@stop

@section('javascript')
    <script>
        $('#user_save').on('click', function(e) {

            e.preventDefault();
            let data =  $('.form-edit-add').serialize();
            let url = "{{ route('voyager.users.update', \Illuminate\Support\Facades\Auth::user()->getKey()) }}";

            $.ajax({
                url: url,
                type: 'PATCH',
                data: data
            }).done(function(){
                location.reload();
            });
        });

        $('#avatar').on('change', function() {
            if ($(this).val()) {

                var form_data = new FormData();
                form_data.append('avatar',$('#avatar')[0].files[0]);


                $.ajax({
                    url : "{{ route('user.avatar.upload') }}",
                    type : 'POST',
                    data : form_data,
                    processData: false,
                    contentType: false,
                    success : function(resp){
                        $('#current_avatar').attr('src',resp.img);
                        $('#avatar').val('');
                    }
                });
            }
        });
    </script>
@stop
