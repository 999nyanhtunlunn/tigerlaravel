@extends('layouts.app')
@section('title','Posts Create')
@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					
					<form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
						@csrf
					<div class="form-group">
						<label>Post title</label>
						<input type="text" name="title" class="form-control" value="{{old('title')}}">
						@error('title')
							<div style="color:red;">{{ $message }}</div>
						@enderror
					</div>

					<div class="form-group">
						    <label for="exampleInputEmail1">Category</label>
						    <select class="form-control" name="category">
						    	@foreach($categories as $category)
						    	<option value="{{$category->id}}"
						    		{{($category->id==old('category'))?'selected':null}}>{{$category->name}}</option>

						    		
						    	@endforeach
						    </select>
						    @error('category')
						    	<small style="color:red;">{{$message}}</small>
						    @enderror
					 </div>


					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" name="description" rows="10">{{old('description')}}</textarea>
						@error('description')
							<div style="color:red;">{{ $message }}</div>
						@enderror
						
						<input type="file" name="image" class="form-control">
						@error('image')
							<div style="color:red;">{{ $message }}</div>
						@enderror
					</div>

					<button type="submit" class="btn btn-primary">Post</button>

					</form>


				</div>
			</div>
		</div>
	</div>
</div>



@endsection