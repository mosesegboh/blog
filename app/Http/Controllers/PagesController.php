<?php 
//namespacing basicallly means the code belongs to a certian controller or diretory in controllers
//if we want the controllers to access something else then we will use the keyword use  in ocntrollers
//controllers are php classes
namespace App\Http\Controllers;

class PagesController extends Controller {
	//try to follow the convention of naming your function according to the type of http request it wants to make,such as post get ,put,delete
	public function getIndex(){
		return view('pages.welcome');
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

}



 