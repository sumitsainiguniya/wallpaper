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
			<a class="btn btn-primary form-control mb-2" href="{{ url('photos/create') }}">Add New Category</a>
		</div>
	</div>
	<div class="row">
		@if(session ('status'))
		<div class="col-12 alert alert-success">
			{{session('status')}}
		</div>
		@endif
		@if(session ('alert'))
		<div class="col-12 alert alert-danger">
			{{session('alert')}}
		</div>
		@endif
	</div>
	<div class="row">
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Category Name</th>
				<th>Action</th>
			</tr>
			@foreach($cat as $p)
			<tr>
				<td>{{$p->id}}</td>
				<td>{{$p->name}}</td>
				<td>

					<a href="{{ url('photos/categorydetail/'.$p->id.'/edit') }}" class="float-left mr-2 btn btn-primary">Edit</a>
					<form action="{{ url('photos/categorydetail/'.$p->id) }}" method="post">
						{{csrf_field()}}
						@method('DELETE')
						<button onclick="return del();" type="submit" class="btn btn-primary">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
	<div class="row">
		<div class="col-sm-5 offset-4">
			{{ $cat->links() }}
		</div>
	</div>

</div>
@endsection