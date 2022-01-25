Test for Eugene...

I will write here some of the main changes to the code done during the developing.
I will also comment the code, but one of the idea behind Solid, not a principle however, is to write code that
should be self-explanatory. I will try not to comment on simple stuff.

1) Created the base code (Laravel standard installation) and GitHub structure (as IDE, I use PHPStorm)
"laravel new EugeneTest --github="--public"

IT IS IMPORTANT TO NOTICE THAT THE TEST DOESN'T REQUIRE TO STORE ANY DATA, SO WE WILL NOT USE ANY DB, MODEL STRUCTURES
OR CREATING ANY CRUD LOGIC FOR OUR DATA.
Also, not using Model for now, we cannot use, for example, 'php artisan make:controller PhotoController --model=Photo --resource --requests'
to create automatically our controller using a model. We can still create a CRUD for our controller with the command
'php artisan make:controller MyController' but this doesn't make any sense, as we are not asked to do store or modify any
data.
ALSO, our logic could be probably all created using only Routes components (I don't know only about the api requests creation, as I never saw such a case),
but I will use also controllers to better show the SOLID structure.

2) I can use Laravel Collective (a package provided by Laravel) to create the form logic, but instead I will create it
using Blade Components or standard HTML 5.
I will clearly create the view logic using the Blade structure.
As for registering any service in Laravel, we clearly have to update the ServiceProvider somehow.
We can manually write down the route of a new service in the ServiceProvider or update it automatically.


3) I create the classes to manage the form logic. Note that we don't need to create any model for now as we don't 
have plan to use a database. I will also create some security and checkings logic. I will also request artisan to create
a PHPUnit test for my main FormController
'php artisan make:controller FormController --test'

4) I created the logic for the HTTP requests for the API of the two banks, one JSON and one XML. I clearly used two different
classes to adhere to SOLID.

5) I will now add the PHP unit testing in at least one controller, as requested, and I also have, unfortunately, a strange 
routing bug that it happened just now.

