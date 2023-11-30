@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one mt-5">{{ config('app.name') }}</h1>
                <p>Welcome My leader blog posts. The platform Gives opportunity to read, commwnt and post about leaders</p>
                <br>
                <a href="/blog/blog" class="btn btn-outline-primary">View all blogs</a> 
				<a href="./user/{{ Auth::user()->username ?? "" }}" class="btn btn-outline-secondary">Manage your posts</a></br>
            </div>
        </div>
		<br>
    </div>
	@auth
		<div class="alert alert-info" role="alert">
		You are logged in
		</div>
		@endauth
		@guest
		<div class="alert alert-warning" role="alert">
		You are not logged in
		</div>
		@endguest
@endsection