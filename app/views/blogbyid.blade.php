@extends('layouts.site')
<script>
  function confirmDelete() {
    var x = confirm('Are you sure you want to delete this post?');
    if(x){
      return true;
    } else {
      return false;
    }
  }
</script>
@section('content')
<?php
if(Auth::user() && Auth::user()->isAdmin()) {
?>
    <a href="/blog/<?php echo $blog->id;?>/edit" class="btn btn-primary">Edit</a>
    <form class="deletePostForm" action="/blog/<?php echo $blog->id;?>/remove" method="get" onsubmit="return confirm('Are you sure you want to delete this post?')">
      <button type="submit" class="btn btn-primary">Delete</button>
    </form>

<?php
}
?>
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
