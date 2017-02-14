@extends('layouts.site')

@section('content')
<div class="loginBox">
	<div class="loginForm">
		<h2>Create an Account:</h2>
		<label>Username</label>
		<input type='text' class="username" placeholder="username">
		<label>Email</label>
		<input type='text' class="email" placeholder="email">
		<label>Password</label>
		<input type="password" class="password" placeholder="password">
		<button type="submit">Register</button>
		<a href="/"><button>Cancel</button></a>
	</div>
</div>
@endsection