@extends('layouts.app')
@section('title', 'Profile')
@section('content')

<div class="container">	
<div class="row justify-content-center">	
	@foreach($posts as $post)
	<div class="row justify-content-center" style="margin-bottom: 20px;">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
						<span class="float-right">{{$post->category->name}}</span><br><br>
					<h4>{{$post->title}}</h4>
					<hr>
						@if(isset($post->image))
					<div class="image">
						<img src="{{asset('/storage/uploads/'.$post->image)}}" class="img-thumbnail" width="100%">
					</div>
					@endif
					<p>
						{{str_limit($post ->description, $limit=150, $end="...")}}
						
					</p>
					<div class="dateinfo">
						<p>Date: {{$post->created_at}}</p>
					</div>
					<button type="button" class="btn btn-warning"><a href="{{route('show',$post->id)}}">show</a></button>&nbsp;&nbsp;
					<a href="{{route('edit',$post->id)}}" class="btn btn-primary">Edit</a>&nbsp;&nbsp;<a href="{{route('postdelete',$post->id)}}" on click="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a><br><br>
					<span style="font-weight: bold;">By {{$post->user->name}}</span>
				</div>
			</div>
		</div>
	</div>              
	@endforeach
</div>
</div>	

@endsection