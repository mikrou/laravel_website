@extends('layouts.site')

@section('content')
	<div id="artCarousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#artCarousel" data-slide-to="0" class="active"></li>
			<?php for($i = 1; $i<= 4; $i++){ ?>
			<li data-target="#artCarousel" data-slide-to"<?php echo $i; ?>"></li>
			<?php
			}
			?>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img class="0-slide" src="/images/hamsteri.jpg">
			</div>
			<div class="item">
				<img class="1-slide" src="/images/penguinsSketch.jpg">
			</div>
			<div class="item">
				<img class="2-slide" src="/images/pocketwatch.jpg">
			</div>
			<div class="item">
				<img class="3-slide" src="/images/wolf.jpg">
			</div>
			<div class="item">
				<img class="4-slide" src="/images/sunglasses.jpg">
			</div>
		</div>
		<a class="left carousel-control" href="#artCarousel" role="button" data-slide="prev"></a>
		<a class="right carousel-control" href="#artCarousel" role="button" data-slide="next"></a>
@endsection