@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-12 pt-2 ">
                 <div class="row justify-content-center">
                    <div class="col-8 text-center">
                        <h1 class="display-one ">Your Page</h1>
                        <p>View your blogs</p>
						<p>Add more</p>
                    </div>
                    <div class="col-4 right-justify">
                        <p>Create new Post</p>
                        <a href="/blog/blog.create" class="btn btn-secondary btn-lg">Add a Blog</a>
                    </div>
                </div>
			 @foreach ($user as $users)
               @if (Auth::user()->username === $users->username) 
               
				<div class="list-group col-8">
                    <ul>
                        <li class="list-group-item"><a href="/blog/blog.show/{{ $users->id }}">{{ ucfirst($users->title) }}</a></li>
                    </ul>
					</div>
							<div class="d-flex flex-md-row justify-content-center">
               @auth<a href="/blog/blog.edit/{{ $users->id }}" class="btn btn-outline-primary">Edit Post</a>@endauth
			   
				@auth
                <form id="delete-frm" class="" action="{{route('blog.destroy', [$users->id])}}" method="get">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-outline-danger" type = "submit" name = "delete">Delete Post</button>
                </form>

			  </div>
				@endauth
				
				<br><br>
				@endif 
              @endforeach
			
					<div class="d-flex justify-content-center">	
				{{$user->links('pagination::bootstrap-5') }}
			
				</div>
			
 
						
       
            </div>
        </div>
    </div>
@endsection