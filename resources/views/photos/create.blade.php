
@extends('layouts.new')
@section('content')

<div class="container"> 
	<div class="row">
		<div class="col-sm-6 offset-3">
			<form action="{{url('photos')}}" method="post">
				{{csrf_field()}}
				<h3>Create New Categoires</h3>
				@if(session ('status'))
				<div class="alert alert-success">
					{{session('status')}}
				</div>
				@endif
				@if(session ('alert'))
				<div class="alert alert-danger">
					{{session('alert')}}
				</div>
				@endif
				<input class="form-control mt-2" type="text" name="name" placeholder="Categoires Name">
				<button class="form-control mt-2">Submit</button>
				<a class="form-control mt-2 btn btn-primary" href="{{ url('photos') }}">Home</a>
			</form>
		</div>
		
	</div>
</div>
@endsection