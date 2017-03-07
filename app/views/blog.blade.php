@extends('layouts.site')

@section('content')
            <div class="row">
            	<div class="col-md-12">
                <h1 class="pageTitle" style="text-align:left;">Mikael's Blog:</h1>
                <?php 
                if(Auth::user() && Auth::user()->isAdmin()) { 
                ?>
                    <a href="/blog/post" class="btn btn-primary">New Post</a>
                
                <?php
                }
                ?>
                <div class="blogContainer">
                <?php
                if(count($blogs) == 0) { ?>
                	<p>Sorry, There are currently no blogs posted yet.
                	This will get updated regularly, so check back soon!</p>
                <?php
                } else { 
                	for($i=0; $i< count($blogs); $i++){ 
                ?>
                	<div class="blog">
                		<div class="blogTitle"><a href="blog/<?php echo $blogs[$i]->id; ?>"><?php echo $blogs[$i]->title; ?></a></div>
                		<div class="description"><?php echo $blogs[$i]->small_desc; ?></div>
                        <?php if(isset($blogs[$i]->imageurl)){ ?>
                        <img src="<?php echo $blogs[$i]->imageurl; ?>">
                        <?php } ?>
                	</div>
                	<?php 
                	}
                }
                ?>
                </div>
            </div>
            </div>
@endsection