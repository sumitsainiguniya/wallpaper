@extends('layouts.new')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-9">
			<h3 class="text-center">{{ $name}}</h3>
			<hr>
			<div class="row">
				@foreach($photo as $p)
				<div class="col-sm-4 mb-2">
					<img style="height:200px;width: 100%;"  src="{{ url('images/'.$p->name)}}">
					<!--<p class="mt-1 text-center">{{ pathinfo($p->name, PATHINFO_FILENAME) }}</p>-->
				</div>
				@endforeach
				<hr class="col-12 ">
				<div class="row">
					<div class="col-6 offset-6"> 
						{{ $photo->links() }}
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<a class="btn btn-primary form-control" href="{{ url('photos/categories')  }}">Categories</a>
			<ul class="mt-2 list-group">
				@foreach($cat as $c)
				<a class="list-group-item" href="{{url('photos/'.$c->uri)}}">{{ $c->name  }}</a>
				@endforeach
			</ul>
		</div>
	</div>
	
	
</div>
@endsection