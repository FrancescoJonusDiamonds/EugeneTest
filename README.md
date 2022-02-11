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
The Http facade's fake method allows you to instruct the HTTP client to return dummy responses when requests are made. 
We will use the Faking Responses possibility of Laravel to faking an answer to our API request, and, in particular,
we will fake the specific URLs of the two given banks.
I've used PHPUnit for now, but I can introduce Guzzle possibilities if requested, as it is supported by Laravel.

Other IMPORTANT NOTES:
1) I could possibly adhere more to the SOLID principles using one class to execute the code:
   $replacements = array('cvv' => '000', 'merchant_id' => 456, 'merchant_key' => 'asdf');
   $finalArray = array_replace($request, $replacements);
That is present in the two different classes that manage the creation of the requests for the two given banks.
However, there is not really a change of logic between the these two pieces of code for the two classes, and creating
another class will just make it taking again the given parameters and only execute array_replace() and then returning
the array. It doesn't seem correct to do so.

NEW NOTES FOR EUGENE

I will create the two different classes that extend the interface (contract), as we said, and manage the logic to assign
to them the correct values, included the ones stored in the .env configuration package. Also, I will create a PHPUnit test
for one or both of them, and I will especially mock the creation of one of them, expecting to receive an object with the
correct values taken from the .env package for that specific class.
NOTE: I am still using the last 8.x version available for Laravel, not the new earlier versions of 9.x

NEW NOTES
Used mockery and solved the env problem creating a file in the config folder (config/keyConfig) and I add an array being
returned inside of it containing the environment variable id and key. I then instruct the FormController to use the new 
config file to access these variables (use Illuminate\Support\Facades\Config) ($merchant_id = Config::get('keyConfig.merchant_id_NAB');)
After any change to the config files, we need to run php artisan config:cache to register the changes.
