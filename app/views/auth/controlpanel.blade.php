@extends('layouts.site')

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Control panel:</div>
                <div class="panel-body">
                    <div class="panel-heading">Site Users:</div>
                    <?php foreach($users as $user){ ?>
                      <div class="panel-body">
                        <div>Name:<?php echo $user->name; ?></div>
                        <div>Email:<?php echo $user->email; ?></div>
                        <div>Roles: </div>
                          <span><?php echo ($user->hasRole('siteadmin')? 'siteadmin' :'');?> </span>
                          <span><?php echo ($user->hasRole('blogger')? 'blogger': '');?></span>

                      </div>
                      <?php } ?>
                </div>
            </div>
        </div>
</div>
@endsection
