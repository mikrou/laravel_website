@extends('layouts.site')

@section('content')
            <div class="row">
            	<div class="col-md-12">
                <h1 class="pageTitle" style="text-align:left;"><?php echo $blog->title; ?></h1>
                <div class="blogContainer">
                	<div class="blog">
                        <?php if(isset($blog->imageurl)){ ?>
                        <img src="<?php echo $blogs[$i]->imageurl; ?>">
                        <?php } ?>
                		<div class="blogTitle"><?php echo $blog->small_desc; ?></div>
                		<div class="body"><?php echo $blog->body; ?></div>
                        
                	</div>
                </div>
            </div>
            </div>
@endsection