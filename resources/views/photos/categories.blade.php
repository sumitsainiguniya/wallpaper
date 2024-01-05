@extends('layouts.new')
@section('content')
<div class="container">
	<div class="row justify-content-md-center">
		<h3 class="btn btn-primary text-center">Categories</h3>
	</div>
	<div class="row mt-2 border">
		@foreach($cat as $c)
		<div class="col-sm-2 p-2 ml-2 mb-2">
			<a class="btn btn-secondary" style="width: 100%" href="{{ url('photos/'.$c->uri) }}">{{ $c->name }}</a>
		</div>
		@endforeach
	</div>
	<div class="row justify-content-md-center">
		{{ $cat->links() }}
	</div>
</div>

@endsection