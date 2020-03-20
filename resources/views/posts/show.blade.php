 @extends('main')
 	@section('title', '| View Post')
 	@section('content')

 	<div class="row">
 			<div class="col-md-8">
 		
 		<h1>{{ $post->title  }}</h1>


 		<p class="lead">{{ $post->body }}</p>
 		</div>

 		<div class="col-md-4">
 			<div class = "well">
 				<dl class="dl-horizontal">
 					<dt>Create At:</dt>
 					<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
 				</dl>
 				<dl class="dl-horizontal">
 					<dt>Last Updated:</dt>
 					<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
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

 			</div>

 		</div>
 	</div>
 	@endsection
