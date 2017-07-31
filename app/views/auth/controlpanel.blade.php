@extends('layouts.site')

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Control panel:</div>
                <div class="panel-body">
                    <div class="panel-heading">Site Users:</div>
                      <table class="table">
                        <thead class="thead-inverse">
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Options</th>
                          </tr>
                        </thead>
                    <tbody>
                    <?php foreach($users as $user){ ?>
                      <tr>
                        <th scrope="row"><?php echo $user->id; ?></th>
                          <td><?php echo $user->name; ?></td>
                          <td><?php echo $user->email; ?></td>
                          <td>
                            <span><?php echo ($user->hasRole('siteadmin')? 'siteadmin' :'');?> </span>
                            <span><?php echo ($user->hasRole('blogger')? 'blogger': '');?></span>
                          </td>
                          <td>
                            <button class="btn btn-sm btn-warning">Edit User</button>
                            <button class="btn btn-sm btn-danger">Delete User</button>
                          </td>
                      </tr>

                      <?php } ?>
                    </tbody>
                  </table>
                </div>
            </div>
  </div>
</div>
@endsection
