@extends('layouts.organiq.mastermain')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('profile::layouts.sidebar-profile')
            </div>
            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('profileLang::profile.form_header.email') }}</div>
                    <div class="panel-body">
                        <div class="alert alert-info">{{ trans('profileLang::profile.field_information.email') }}</div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/set-email') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">{{ trans('profileLang::profile.field_name.email') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('profileLang::profile.button.update') }}

                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('profileLang::profile.form_header.password') }}</div>
                    <div class="panel-body">
                        <div class="alert alert-info">{{ trans('profileLang::profile.field_information.password') }}</div>

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/set-password') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">{{ trans('profileLang::profile.field_name.password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">{{ trans('profileLang::profile.field_name.cnfpassword') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('profileLang::profile.button.update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
