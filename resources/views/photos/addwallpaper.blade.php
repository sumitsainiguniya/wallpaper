@extends('layouts.new')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-6 offset-3">
			<h4>Add Wallpaper</h4>
			@if(session ('alert'))
			<div class="alert alert-danger">
				{{session('alert')}}
			</div>
			@endif
			<form action="{{ url('photos/addwallpaper') }}" method="Post" enctype="multipart/form-data">
				{{csrf_field()}}
				@if ($message = Session::get('success'))
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{ $message }}</strong>
				</div>
				<img class="img-thumbnail" src="{{url('images/'.Session::get('image'))  }}">
				@endif
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<input class="mb-2 form-control" type="file" name="image" id="fileToUpload">
				<select class="mb-2 form-control" name="cat">
					<option value="0">Select Categiores</option>
					@foreach($cat as $c)
					<option value="{{ $c->id }}">{{ $c->name }}</option>
					@endforeach
				</select>
				<button class="btn btn-primary" type="submit">Upload</button>
				<!--<input class="btn btn-primary" type="submit" value="Upload">-->
			</form>
			
		</div>
	</div>
</div>
@endsection
