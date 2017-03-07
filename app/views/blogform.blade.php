@extends('layouts.site')

@section('content')
            <div class="row">
            	<div class="col-md-12">
                    <h1 class="pageTitle" style="text-align:left;">Create a blog post:</h1>
                    <div class="panel panel-default">
                	<form class="blogpost form-horizontal" role="form" method="POST" action="{{ url('/blog/post') }}">
                     {{ csrf_field() }}
                     <div class="form-group">
                		<label for="title" class=" col-md-2 control-label">Title:</label>
                        <input type="text" name="title" class="col-md-4">
                    </div>
                    <div class="form-group">
                        <label for="small_desc" class="col-md-2 control-label">Small description:</label>
                        <input type="text" name="small_desc" class="col-md-8">
                    </div>
                    <div class="form-group">
                        <label for="body" class="col-md-2 control-label">Blog body:</label>
                        <textarea type="text" name="body" class="col-md-9" rows="18"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imageurl" class="col-md-2 control-label">Image url (optional):</label>
                        <input type="text" name="imageurl" class="col-md-8">
                    </div>
                        <button type="submit">Create blog post</button>
                	</form>
                    </div>
                </div>
            </div>
@endsection