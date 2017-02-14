@extends('layouts.site')

@section('content')
<div class="loginBox">
	<div class="loginForm">
		<h2>Login</h2>
		<label>Username or email</label>
		<input type='text' class="username" placeholder="username or email">
		<label>Password</label>
		<input type="password" class="password" placeholder="password">
		<button type="submit">Sign in</button>
		<a href="/register"><button>Create a Free Account</button></a>
	</div>
</div>
@endsection