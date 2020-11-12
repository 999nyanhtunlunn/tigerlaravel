@extends('layouts.app')
@section('title', 'Posts Create')
@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
			@if(session('success'))
			<div class="alert alert-success" role="alert">{{session('success')}}</div>
			@endif
				<div class="card">
					<div class="card-body">
							<form action="{{route('update', $post->id)}}" method="POST" enctype="multipart/form-data">
								
								@csrf

								<div class="form-group">
									<label>Post Title</label>
									<input type="text" name="title" class="form-control" value="{{$post->title}}">
									@error('title')
										<div style="color:red;">{{ $message }}</div>
									@enderror
								</div>

							 <div class="form-group">
						    <label for="exampleInputEmail1">Category</label>
						    <select class="form-control" name="category">
						    	@foreach($categories as $category)
						    
						    		
						    <option value="{{$category->id}}"{{($category->id==$post->category->id)?'selected':null}}>{{$category->name}}</option>

						    		
						    	@endforeach
						    </select>
						    @error('category')
						    	<small style="color:red;">{{$message}}</small>
						    @enderror
						  </div>
								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" name="description" rows="10">{{$post->description}}</textarea>
									@error('description')
									<div style="color:red;">{{ $message }}</div>
									@enderror


						<input type="file" name="image" class="form-control">
						@error('image')
							<div style="color:red;">{{ $message }}</div>
						@enderror
								</div>	

									<button type="submit" class="btn btn-primary">update</button>
							</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection	