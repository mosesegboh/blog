@extends ('main')

	@section('title', '-Edit Blog Post')

	@section('content')


		<div class="row">
			{{-- we will be doing form binding below for editing --}}
				{!! Form::model($post,['route' => ['posts.update', $post->id], 'method' => 'PATCH']) !!}
 			<div class="col-md-8">

				{!! Form::label('title', 'Title:') !!}
				{!! Form::text('title', null, ["class" => 'form-control input-lg']) !!}

				{!! Form::label('slug', 'Slug:', ["class"=>'form-spacing-top']) !!}
				{!! Form::text('slug', null, ["class" => 'form-control']) !!}

				{!! Form::label('category_id', 'Category:', ["class"=>'form-spacing-top']) !!}
				{!! Form::select('category_id', $categories, null, ["class" => 'form-control']) !!}
				
				{!! Form::label('tags', 'Tags:') !!}
{!! Form::select('tags[]', $tags, $post->tags->pluck('id')->toArray(), ['class' => 'form-control select2' , 'multiple' => 'multiple']) !!} 

				{!! Form::label('body', 'Body:', ["class"=>'form-spacing-top']) !!}
				{!! Form::textarea('body', null, ["class" => 'form-control']) !!}
 			</div>

			<div class="col-md-4">
				<div class = "well">
					<dl class="dl-horizontal">
						<dt>Created At:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
					</dl>
					<dl class="dl-horizontal">
						<dt>Last Updated:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">  
						<div class="col-sm-6">
							{!! Html::linkRoute('posts.show','Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{!! Form::submit('Save', ['class' => 'btn btn-success btn-block']) !!}
						</div>

					</div>			
				</div>
			</div>
 		{!! Form::close() !!}
 	</div>{{-- end of form --}}
@stop
 


@section('scripts')
	 {!! Html::script('js/select2.min.js') !!}

	 <script>
		 //the get relatedtags function below is  laravel helper that gets the id of posts instead of the whole post in an array basically
		 //we use json encode below to convert from a javascript array to a php array.
		 $('.select2.multi').select2();
		 $('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
	</script>	
	
@endsection