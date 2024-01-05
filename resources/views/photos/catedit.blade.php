
@extends('layouts.new')
@section('content')

<div class="container"> 
	<div class="row">
		<div class="col-sm-6 offset-3">
			<h3>Edit Category</h3>
			<form action="{{url('photos/categorydetail/'.$category['id'])}}" method="post">
				{{csrf_field()}}
				@method('PUT')
				@if(session ('status'))
				<div class="alert alert-success">
					{{session('status')}}
				</div>
				@endif
				
				<input class="form-control" type="text" name="name" value="{{$category['name'] }}">
				<button class="form-control mt-2">Update</button>
				<a class="btn btn-primary form-control mt-2" href="{{ url('photos') }}">Back</a>
			</form>

		</div>
		
	</div>
</div>
@endsection