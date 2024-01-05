
@extends('layouts.new')
@section('content')

<div class="container"> 
	<div class="row">
		<div class="col-sm-6 offset-3">
			<form action="{{url('photos/'.$photo['id'])}}" method="post">
				{{csrf_field()}}
				@method('PUT')
				@if(session ('status'))
				<div class="alert alert-success">
					{{session('status')}}
				</div>
				@endif
				<img class="img-thumbnail" src="{{url('images/'.$photo['name'])  }}">
				<select class="form-control" name="cat">
					<option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
					@foreach($category as $c)
					<option value="{{ $c->id }}">{{$c->name }}</option>
					@endforeach
				</select>


				<button class="form-control mt-2">Update</button>
				<a class="btn btn-primary form-control mt-2" href="{{ url('photos') }}">Back</a>
			</form>

		</div>
		
	</div>
</div>
@endsection