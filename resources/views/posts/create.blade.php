@extends('main')

@section('title', '-create a new post')

@section('stylesheets')
	{!! Html::style('css/parsley.css')  !!}
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script>tinymce.init({
		selector: 'textarea', 
		plugins: 'link code',
		menubar: false,
		
	  });</script>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2"> <!-- the offset 2 will create 2 columns on the left and rigth side -->
			<h1>Create New Post</h1>
			<hr> 
				{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate'=>'', 'files'=>true)) !!}
				    {!! Form::label('title', 'Title:') !!} 
				    {!! Form::text('title', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'255')) !!}
					
					{!!  Form::label('slug', "Slug :")   !!}
					{!!   Form::text('slug', null, array('class'=>'form-control', 'required'=>'', 'minlength' => '5', 'maxlength' => '255')) !!}

					{!!  Form::label('category_id', "Category :")   !!}
					<select class="form-control" name="category_id" id="">
						@foreach ($categories as $category )
					<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>

					{!! Form::label('featured_image','Upload Image:',  ["class"=>'form-spacing-top']) !!}
					{!! Form::file('featured_image') !!}

					{!!  Form::label('tag_id', "Tags :", ["class"=>'form-spacing-top'])   !!}
					{{-- the array in the tag below is basically for storing the several items selected from the tag input feild --}}
					<select class="select2-multi form-control" name="tags[]" multiple="multiple">
						@foreach ($tags as $tag )
					<option value="{{$tag->id}}">{{$tag->name}}</option>
						@endforeach
					</select>

					{!!  Form::label('body', "Post Body:")   !!}
					{!!   Form::textarea('body', null, array('class'=>'form-control form-spacing-top')) !!}

					{!! Form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;' )) !!}

				{!! Form::close() !!}
		</div>
	</div>
	@section('scripts')
	{!! Html::style('js/parsley.min.js')  !!}
	<script>
		$('.select2-multi').select2();
	</script>
	@endsection
@endsection