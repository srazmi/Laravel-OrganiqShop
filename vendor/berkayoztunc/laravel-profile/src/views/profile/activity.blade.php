@extends('layouts.organiq.mastermain')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('profile::layouts.sidebar-profile')
            </div>

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('profileLang::profile.form_header.activitys') }}</div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>{{ trans('profileLang::profile.table.id') }}</td>
                                    <td>{{ trans('profileLang::profile.table.action') }}</td>
                                    <td>{{ trans('profileLang::profile.table.resources_name') }}</td>
                                    <td>{{ trans('profileLang::profile.table.resources_id') }}</td>
                                    <td>{{ trans('profileLang::profile.table.action_time') }}</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($activitys as $activity)
                                <tr>
                                    <td>{{ $activity->ip }}</td>
                                    <td>{{ $activity->action }}</td>
                                    <td>{{ $activity->record_name }}</td>
                                    <td>{{ $activity->trackable_id }}</td>
                                    <td>{{ $activity->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
