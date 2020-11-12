@extends('layouts.app')
@section('title', 'Posts')
@section('content')


	<div class="container">

		<div class="row justify-content-center">
			
			<div class="col-md-8">

				

				<div class="card">
					
					<div class="card-body">
						<span class="float-right">{{$post->category->name}}</span>

						<p>
							{{Carbon\Carbon::parse($post->created_at)->format('y_M-d')}}
						</p>
						
						<h5>{{$post->title}}</h5>

						<hr>

					
					
						<img src="{{asset('/storage/uploads/'.$post->image)}}" class="img-thumbnail" width="100%">
					
					
					<p>
						{{$post ->description}}
					</p>

					</div>

				</div>


			</div>

		</div>

	</div>




@endsection