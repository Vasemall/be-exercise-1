@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-12 pt-2 ">
                 <div class="row justify-content-center">
                    <div class="col-8 text-center">
                        <h1 class="display-one ">My Leader</h1>
                        <p>List blogs about outstanding leaders in our society</p>
						<p>Enjoy reading. Know Your leader</p>
                    </div>
                    <div class="col-4 right-justify">
                        <p>Create new Post</p>
                        <a href="/blog/blog.create" class="btn btn-secondary btn-lg">Add a Blog</a>
                    </div>
                </div>                
                @foreach ($posts as $post)
				<div class="list-group col-8">
                    <ul>
                        <li class="list-group-item"><a href="./blog.show/{{ $post->id }}">{{ ucfirst($post->title) }} </a><pre>Blog by {{ucfirst($post->username)}}</li>
                    </ul>
					</div>
              @endforeach
					<div class="d-flex justify-content-center">	
				{{$posts->links('pagination::bootstrap-5') }}
			
				</div>
			
 
						
       
            </div>
        </div>
    </div>
@endsection