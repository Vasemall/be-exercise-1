@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-12 pt-2 ">
                 <div class="row justify-content-center">
                    <div class="col-8 text-center">
                        <h1 class="display-one ">Admin</h1>
                        <p>List of blogs about outstanding leaders in our society</p>
						<p>Enjoy reading. Know Your leader</p>
                    </div>
                    <div class="col-4 right-justify">
                        <p>Create new Post</p>
                        <a href="/blog/blog.create" class="btn btn-secondary btn-lg">Add a Blog</a>
                    </div>
  

                </div> 
			@foreach ($admins as $admin)				
               
				<div class="list-group col-8">
                    <ul>
                        <li class="list-group-item"><a href="blog/blog.show/{{ $admin->id }}">{{ ucfirst($admin->title) }}</a><pre>Blog by {{ucfirst($admin->username)}}</li>
                    </ul>
					</div>
					<div class="d-flex justify-content-center">
			<a href="/blog/blog.edit/{{ $admin->id }}" class="btn btn-outline-primary">Edit Post</a>					
                <form id="delete-frm" class="" action="{{route('blog.destroy', [$admin->id])}}" method="get">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-outline-danger" type = "submit" name = "delete">Delete Post</button>
                </form>
				
				</div>
              @endforeach
					<div class="d-flex justify-content-center">	
	

				{{$admins->links('pagination::bootstrap-5') }}
			
				</div>
				</div>
			
 
						
       
            </div>
        </div>
    </div>
@endsection