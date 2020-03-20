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
 ?>