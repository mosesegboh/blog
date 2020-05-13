<?php 
//namespacing basicallly means the code belongs to a certian controller or diretory in controllers
//if we want the controllers to access something else then we will use the keyword use  in ocntrollers
//controllers are php classes
namespace App\Http\Controllers;
//to be able to use requests in this controller, we need to add a namespace here.because we will need it in the post contact method
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
//the reason we didnt use App/mail is because mail id a fascade
use Mail;
use Session;

class PagesController extends Controller {
	//try to follow the convention of naming your function according to the type of http request it wants to make,such as post get ,put,delete
	public function getIndex(){
		//to pull posts from our database
		$posts = Post::orderBy('created_at','desc')->limit(4)->get();

		//return the view with posts variable
		return view('pages.welcome')->withPosts($posts);
		//process for what we do in controllers include
		//process variable data or params
		//talk to the model
		//receive data back from the model
		//compile or process data from the model if neede
		//pass the data to the  correct view
		//you can use . instead of slash and it willl work aswell
	}

	public function getAbout(){
		$first = 'Egboh';
		$last = 'moses';
		$fullname = $first . " " . $last;
		$email = 'mosesegboh@yahoo.com';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;

		//the with function is what we use to access the variables in the view accesses it in the view the parameters is fullname which is set to $full whcih is the variable
		//i changed it to another short cut below
		return view('pages.about')->withData($data);
	}

	public function getContact(){
		return view('pages.contact');
	}

	public function postContact(Request $request){
		$this->validate($request, ['email' => 'required|email', 'subject'=>'min:3', 'message' => 'min:10']);
	
			
		$data = [
			//laravel will automatically create a variable for the  key below which we will use below so you wont need to access it in the view the  normal way
			'email' => $request->email,
			'subject' => $request->subject,
			//laravel already has an inbuilt message variable for handling message so we use a differnt name
			'bodyMessage' => $request->message ];
		
			//the mail function here is what handles the sending of emails
		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('mosesegboh@yahoo.com');
			$message->subject($data['subject']);
		});
		Session::flash('success','Your email was sent!');
		return redirect()->url('/');
	}
}



 