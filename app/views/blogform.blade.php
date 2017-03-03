@extends('layouts.site')

@section('content')
            <div class="row">
            	<div class="col-md-12">
                    <h1 class="pageTitle" style="text-align:left;">Create a blog post:</h1>
                    <div class="panel panel-default">
                	<form class="blogpost form-vertical" role="form" method="POST" action="{{ url('/blog/post') }}">
                     {{ csrf_field() }}
                		<label for="title">Title:</label>
                            <input type="text" name="title">
                        <label for="small_desc">Small description:</label>
                        <input type="text" name="small_desc">
                        <label for="body">Blog body:</label>
                        <input type="text" name="body">
                        <button type="submit">Create blog post</button>
                        <label for="imageurl">Image url (optional)</label>
                        <input type="text" name="imageurl">
                        <button type="submit">Create blog post</button>
                	</form>
                    </div>
                </div>
            </div>
@endsection