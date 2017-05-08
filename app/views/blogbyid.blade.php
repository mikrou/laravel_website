@extends('layouts.site')

@section('content')
            <div class="row">
            	<div class="col-md-12">
                <h1 class="pageTitle" style="text-align:left;"><?php echo $blog->title; ?></h1>
                <div class="blogContainer">
                	<div class="blog">
                        <?php if(isset($blog->imageurl)){ ?>
                        <img src="<?php echo $blog->imageurl; ?>">
                        <?php } ?>
                		<div class="blogTitle"><?php echo $blog->small_desc; ?></div>
                		<div class="body"><?php 
                        $paragraphs = explode("\n", $blog->body);
                        foreach($paragraphs as $paragraph){
                        ?>
                            <p><?php
                                echo $paragraph;
                            ?>
                            </p>
                        <?php 
                        }
                        ?>
                        </div>
                        
                	</div>
                </div>
            </div>
            </div>
@endsection