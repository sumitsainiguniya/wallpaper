@extends('layouts.new')
@section('content')
<script type="text/javascript">
	function del()
	{
		var answer = window.confirm('Are you Sure to Delete this Data');
		if (answer) 
		{
			return true;
		}
		else 
		{
			return false;
		}	
	}
</script>
<div class="container">
	<div class="row">
		<div class="col-sm-6 offset-3">
			<a class="btn btn-primary form-control mb-2" href="{{ url('photos/addwallpaper') }}">Add New Wallpaper</a>
		</div>
	</div>
	@if(session ('status'))
	<div class="row">
		<div class="col-12 alert alert-success">
			{{session('status')}}
		</div>
	</div>
	@endif
	<div class="row">
		@foreach($photo as $p)
		<div class="col-sm-4 pt-1"> 
			<p>{{$p->id.'.'.$p->name}}</p>
			<img class="img-thumbnail mb-2" style="height:250px;width:100%;" src="{{ url('images/'.$p->name) }}">
			<a href="{{ url('photos/'.$p->id.'/edit') }}" class="float-left mr-2 btn btn-primary">Edit</a>
			<form action="{{ url('photos/'.$p->id) }}" method="post">
				{{csrf_field()}}
				@method('DELETE')
				<button onclick="return del();" type="submit" class="btn btn-primary">Delete</button>
			</form>
			<hr>
		</div>
		@endforeach
	</div>
	<div class="row">
		<div class="col-sm-5 offset-4">
			{{ $photo->links() }}
		</div>
	</div>
</div>
@endsection