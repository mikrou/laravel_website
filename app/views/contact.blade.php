@extends('layouts.site')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Contact</div>
				<!-- <div class="panel-body email">You can contact me at <a href="mailto:mrouhiai@ualberta.ca">mrouhiai@ualberta.ca</a>. I am currently working on building a mail server, so an easy-to-use contact form will be coming soon!</div> -->
				<div class="panel-body">
				<form method="POST" class="form-horizontal">
					<div class="form-group">
                   		<label for="email" class=" col-md-2 control-label">Email:</label>
                    	<input type="email" name="email" class="col-md-4" required>
                	</div>
                <div class="form-group">
                    <label for="small_desc" class="col-md-2 control-label">Subject:</label>
                    <input type="text" name="subject" class="col-md-8" placeholder="(optional)">
                </div>
                <div class="form-group">
                    <label for="body" class="col-md-2 control-label">Message:</label>
                    <textarea type="text" name="body" class="col-md-9" rows="10" required></textarea>
                </div>
                <button type="submit" class="btn btn-info">Send</button>
				</form>
				</div>
			</div>
		</div>
	</div>
@endsection