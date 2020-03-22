
  @extends('main')
  @section('title', '- Home')
   
    @section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
              <h1>Welcome to Mozetty Laravel Blog</h1>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
              <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
            </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)


           <div class="post">
              <h3>{{ $post->title }}</h3>
              <!-- we truncated the body below with the substr function -->
              <p>{{ substr($post->body, 0,300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
              <a href="#" class="btn btn-primary">Read more</a>
           </div>        
           <hr>

         @endforeach
        </div>

        <div class="col-md-3 col-md-offset-1" >
            <h2>Sidebar</h2>

        </div>
      </div>
    @endsection

    



    