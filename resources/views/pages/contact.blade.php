@extends('main')
  
  @section('title', '- Contact')
    @section('content')
        <div class="row">
          <div class="col-md-12">
            <h1>Contact Me</h1>
            <hr>
            {{-- the reason why we didnt use route below which you could is because we didnt have it set up in the routelist...but you could but we didnt set it up here --}}
            <form action="{{url('contact')}}" method="POST">
              {{csrf_field()}}

              <div class="form-group">
                <label name="email">Email:</label>
                <input id="email" name="email" class="form-control">
              </div>

               <div class="form-group">
                <label name="subject">Subject:</label>
                <input id="subject" name="subject" class="form-control">
              </div>

                <div class="form-group">
                <label name="subject">Message:</label>
                <textarea id="subject" name="subject" class="form-control">Type Your Message here.....</textarea>
              </div>

              <input type="submit" value ="Send Message"  class = "btn btn-success">
            </form>
          </div>
        </div>
    @endsection
    