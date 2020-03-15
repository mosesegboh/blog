 @if(Session::has('success'))
 {{-- to handle success --}}
	<div class="alert alert-success" role="alert">
		<strong>Success:</strong>{{ Session::get('success') }}
	</div> 	
 @endif

 {{-- to handle errors --}}
 @if (count($errors) > 0)
 	<div class="alert alert-danger" role="alert">
		<strong>Errors:</strong><ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach 
		</ul>
	</div> 	
 @endif