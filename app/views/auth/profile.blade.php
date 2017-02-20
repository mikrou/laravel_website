@extends('layouts.site')

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>
                <div class="panel-body">
                    <button class="btn btn-primary">Change Password</button>
                    <button class="btn btn-info">Delete Account</button>
                    <a href="/logout" class="btn btn-info">Log out</a>
                </div>
            </div>
        </div>
</div>
@endsection