@extends('layouts.site')

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>
                <div class="panel-body">
                  <?php if(Auth::user()->hasRole('siteadmin')) { ?>
                    <a href="{{ url('/admin/control-panel') }}" class="btn btn-default">Control panel</a>
                    <?php } ?>
                    <a href="{{ url('/changepassword') }}" class="btn btn-primary">Change Password</a>
                    <a href="{{ url('/changeEmail') }}" class="btn btn-primary">Change Email</a>
                    <form class="deleteUserForm" method="POST" action="{{ url('/removeuser') }}">
                    {{ csrf_field() }}
                    <button type='submit' class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
                    </form>
                    <a href="{{ url('/logout') }}" class="btn btn-info">Log out</a>

                </div>
            </div>
        </div>
</div>
@endsection
