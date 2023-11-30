@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one">{{ ucfirst($post->title) }} Posted by {{$post->username}}</h1>
                <p>{!! $post->body !!}</p> 
                <hr>
                @if (Auth::user()->username === $post->username )
                <div class="d-flex flex-md-row flex-column justify-content text-center">
               @auth<a href="/blog/blog.edit/{{ $post->id }}" class="btn btn-outline-primary">Edit Post</a>@endauth
			  
				@auth
                <form id="delete-frm" class="" action="{{route('blog.destroy', [$post->id])}}" method="get">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-outline-danger" type = "submit" name = "delete">Delete Post</button>
                </form>
				@endauth
				@endif
				</div> <br><br>
				<h3 class="display-one">comments</h3>
				<?php
				$connection = mysqli_connect("localhost", "root", "", "my_blog");
				$SQL = "SELECT * FROM comments WHERE blog_id = $post->id";
		$result = mysqli_query($connection, $SQL);
		$num_rows = mysqli_num_rows($result);
		
		
		//IF USERNAME IS NOT UNIQUE, RETURNS TO FORM FOR NEW USERNAME OR LOGS THE USER IN IF SUCCESFUL REGISTRATION
		while($row = mysqli_fetch_assoc($result)){
		
		print  "<p class=text-md-start>".$row['comment']."<br>. </p>";
		print "from"." ". $row['username']."<br>. ";
		?>
		@if (Auth::user()->username === $post->username or $row['username'])
                <div class="d-flex flex-md-row flex-column col-8">
				@auth
                <form id="delete-frm" class="" action="{{route('show.destroy', [$row['comment']])}}" method="get">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-outline-danger" type = "submit" name = "delete">Delete Post</button>
                </form>
				</div>
				@endauth
				@else
				
				@endif
		<?php	
		}
		
		if (mysqli_connect_errno()) {
			print "Connect failed:". mysqli_connect_error();
			exit();
		}
				
				?>
				
				<br><br>
				<div class="form-group">
				@auth
				 <form action="{{route('comment.create', [$post->id])}}" method="post">
                        @csrf
                                        <div class="row">
                            <div class="control-group col-12">
							<input type="hidden" id="post_id" class="form-control" name="blog_id" value="{{ $post->id }}"
                                       placeholder="write your comment here" required>
									 
                                <input type="text" id="comment" class="form-control" name="comment"
                                       placeholder="write your comment here" required>
                            </div>
                             </div>
						
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" name = "submit" type ="submit" class="btn btn-primary">
                                    share comment
                                </button>
                            </div>
                        </div>
                    </form>
					@endauth
				</div>
				@guest
				<div class="alert alert-info" role="alert">
				Only authorized users can edit, delete or comment Your are not logged in.
				</div>
				@endguest
				
            </div>
        </div>
    </div>
@endsection