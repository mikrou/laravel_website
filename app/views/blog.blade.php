@extends('layouts.site')

@section('content')
            <div class="row">
            	<div class="col-md-12">
                <h1 class="pageTitle" style="text-align:left;">Mikael's Blog:</h1>
                <?php
                if(Auth::user() && Auth::user()->hasRole('siteadmin')) { 
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
                	foreach($blogs as $blog){
                ?>
                	<div class="blog">
                		<div class="blogTitle"><a href="blog/<?php echo $blog->id; ?>"><?php echo $blog->title; ?></a>
                        </div>
                        <?php if(isset($blog->imageurl)){ ?>
                        <img src="<?php echo $blog->imageurl; ?>">
                        <?php } ?>
                		<div class="description"><?php echo $blog->small_desc; ?></div>
                        <div class="postDate">Posted: <?php echo $blog->updated_at; ?></div>
                	</div>
                	<?php
                	}
                }
                ?>
                </div>
            </div>
            </div>
@endsection
