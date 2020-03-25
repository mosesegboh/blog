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
 ?>