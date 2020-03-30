<?php 
//the slash in routes is basically your base url
//always label your routes from the top
//we should not have a function in our routes file
//namespacing basicallly means the code belongs to a certian controller or diretory in controllers
//if we want the controllers to access something else then we will use the keyword use  in ocntrollers
//the offset in bootstrap is used as a column seperator,also take note of versions when coding
 //@means you are writing a blade code
//a model should be the singular form of your tabble name
//string can only hold max of 255 characters
//unsigned big is just positive above 255 n vice versa
//patch ot put is actually an updating request in http request while the other is get or post
//php artisan route:list for the list of routes available
//i didnt install carbon 2 in ths tutorial
//this tutorial is for 5.1 and 5.2 some difference includes 1. middle ware in the routes file and carbon when updating composer and 3.importing laravel form helpers and the syntax for forms in form helpers
//{!! is the opposite of echosing out the data !!}
//{{ is not echoing out the data }}
//if you get a parse error,it basically means its a php syntax error
 //in the restful rable post.store creates a new role while posts.update overwrites an existing row
 //this error means you will have to set a form method in your form MethodNotAllowedHttpException in RouteCollection.php line 218:
//becasue laravel will automatically do a post request in a form when you submit but when you are updting you need to specify the one you need in the route list
//if you are making a post and you see error which states that you cannot identify an object and something that has being working before,i think you need to check if that item actually exist
 //carbon mainly has to do with date and time functions,like posted ...days ago or for addition and substracting time
//FatalThrowableError in PagesController.php line 11:
//Class 'App\Http\Controllers\Post' not foundthis error is caused because 
//the above error is caused because we used the name spacing,we are using post in another controller which does not belong there,
//so to solve this issue, we need to use/import above App/Post o whatever applies in the situation
 //in the env. developmemt is developing locally and production is on the live server.so change that when deploying
 //ERROR-ErrorException in 7177567e2e21e6fbe09b9c5081ac820b line 8:
//Trying to get property of non-object (View: C:\wamp64\www\laravel\blog\resources\views\posts\show.blade.php)
 //the above error means you are tyring to access somthing in the database that does not exist say id or something else
 //processes for web development.1. discovery,design(wireframes and design mockups, code and development,Q and A testing),then deployment.
 //try to index a column you will be searching a lot when dealing with your database,it speeds up the query response time and 
 //when creating adding a slug column to the databse with data in it already in which the slug is already in it,you will run into an error because data is already in it.
 //database seeding is basically adding data to a seed file so that when you run migration and all your data clears,you can prgrammatically repopulate the data after that
 //its usually haradcoded inside the seed file so that when you run the seed file it can just repopulate the database.
//you do php artisan db:seed but you will have to create the seed file first
 //to make any change to your model...you can access the model class gangan for changes.
 //the remember me feature basically saved a harshed value in your database column with a cookie saved in your browser to remember you
 //a similar thing happpens with email verification and tokens
 //salted is basically adding an additional random encryption to already hasrshed password becasue a harshed dpassword can be unharshed
 //protected means you are actually overiding the functions of an external class
 //if you are using the form manually use the csrf protection line otherwise your form will always fail
 //the Auth::Check is a basic laravel method for checking if a user is logged in or not
 //the 1 line if statement is called the itenerary operator
 //you need to specify which middle ware we want our app to pass through in the middle ware controller
 //to protect certain pages in auth, we use the middleware construct and put it in our controller as displayed
 //not found http exception in route collection line 161 is when laravel can't find a route.
 //more functions on like how to get user info of logged in user or user functions check video part 28 and time: 34:00
 //url generator is a route issue because it cant generate the url,so you edit your route and use uses as displayed
 //PDOException in Connector.php line 55:
//SQLSTATE[HY000] [2054] The server requested authentication method unknown to the client
 //the above is a server error,try restarting your local database server
 //always reference your route list for route issues


   /**
      *======================
      *I added this manually
      *======================
     * Display the password reset view for the given token.
     * 
     * If no token is present,display the link request form
     *
     * @param \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Http\Response
     */
    // public function showResetForm(Request $request, $token = null)
    // {
    //     if (is_null($token)) {
    //         return $this->getEmail();
    //     }

    //     $email = $request->input('email');

    //     if (property_exists($this, 'resetView')){
    //         return view($this->resetView)->with(compact('token', 'email'));
    //     }

    //     if (view()->exists('auth.passwords.reset')){
    //         return view('auth.passwords.reset')->with(compact('token','email'));
    //     }

    //     return view('auth.reset')->with(compact('token', 'email'));
    // }


    //authentication routes
//as is what is used to name your route,the eidt we did below basically names our route for use and you can also view it in the route list
// Route::get('auth/login', ['as' => 'login','uses' => 'Auth\AuthController@getLogin'] );
// Route::post('auth/login', 'Auth\AuthController@postLogin' );
// Route::get('auth/logout', ['as' => 'logout','uses' => 'Auth\AuthController@getLogout'] );

// //registration routes
// Route::get('auth/register', 'Auth\AuthController@getRegister' );
// Route::post('auth/register', 'Auth\AuthController@postRegister' );


// //passwords reset routes
// //the question mark below means that the token might not really exist
//  //the controller method in this route is located in the address as shown below, but you need to access laravel/vendor folders to get to it
// Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
// Route::post('password/email', 'Auth\AuthController@sendResetLinkEmail');
// Route::post('password/reset/', 'Auth\PasswordController@reset');

//the url takes you to the particular url but routes takes you to whats definde in the routes
 //any changes made to the environment file, you will need to reset the server
 //in routes, the reset/token routes will not work unless you setup the whole process and test it because it is already prebuilt with laravel read documentation
 ?>