 @extends('main')
 	@section('title', '| View Post')
 	@section('content')

 	<div class="row">
 		<div class="col-md-8">
		 	<h1>{{ $post->title  }}</h1>
			 <p class="lead">{{ $post->body }}</p>
			 <hr>
			 <div class="tags">
				@foreach ($post->tags as $tag )
					<span class="label label-default">{{$tag->name}}</span>
				@endforeach 
			 </div>	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
		 </div>
		 

 		<div class="col-md-4">
 			<div class = "well">
 				<dl class="dl-horizontal">
 					<label>Url Slug:</label>
					 <!-- the below link is thesame thing as using the url link method in the welcome/index page -->
 					<p> <a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
 				</dl>

				 <dl class="dl-horizontal">
					<label>Category:</label>
					<!-- the below link is thesame thing as using the url link method in the welcome/index page -->
					<p>{{ $post->category->name }}</p>
				</dl>

 				<dl class="dl-horizontal">
 					<label>Create At:</label>
 					<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
 				</dl>
 				<dl class="dl-horizontal">
 					<label>Last Updated:</label>
 					<p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
 				</dl>
 				<hr>
 				 <div class="row">  
 				 	<div class="col-sm-6">
 				 		{!! Html::linkRoute('posts.edit','Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
 				 	</div>
 				 	<div class="col-sm-6">
 				 		{{-- we used laravel receieipies to sort out the form issues here which is a goog website --}}
 				 		{!! Form::open(['route'=>['posts.destroy',$post->id], 'method' => 'DELETE']) !!}


 				 		{{-- we are creating a delete button here --}}
 				 		{!! Form::submit('Delete', ['class' => 'btn btn-success btn-block']) !!}
 				 		
 				 		{!! Form::close() !!}
 				 	</div>
 				 </div>	

 				 <div class="row">
 				 	<div class="col-md-12">
 				 		{!! Html::linkRoute('posts.index', '<<See All Posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) !!}
 				 	</div>

 				 </div>		
 			</div>
 		</div>
 	</div>
 	@endsection
