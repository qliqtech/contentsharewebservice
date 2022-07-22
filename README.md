<h1>My Template for Laravel Projects</h1>

<p>This is a template used in starting Laravel Projects </p>

<p>It is created using Laravel Framework</p>

<p>Written and Designed By David Kumi</p>


<h3>Requirements</h3>


<ol>
  <li>PHP >= 7.2.5 </li>
  <li>Composer</li>
  <li>Laravel </li>
  <li>apache/nginx </li>


</ol>

<h3>Setup</h3>

<ol>
  <li>Install Laravel <a href="https://laravel.com/docs/8.x/installation" >Reference</a> </li>
  <li>Set database variables in .env file <a href="https://lavalite.org/blog/connecting-your-laravel-project-to-mysql-database" >Reference</a></li>
  <li>Run  "php artisan migrate:refresh --seed" command to seed data </li>
  <li>Run php artisan serve command to start laravel serve </li>
 <li>Get API documentation: <a href="https://documenter.getpostman.com/view/18259928/UzBmMn12" >API doc</a> </li>

</ol>

<h3>How it works</h3>
When migration is run, the data is moved from the csv files into the
database. I have created a temporary database on AWS RDS for this
assignment with credentials in the .env file.<br>
You can create your own DB in MYSQL and change to your credentials
<br>
The methods uploadCurrencyIntoDb() and uploadCountryIntoDb() in the
CountryCurrencyImplementationService::class are run. These methods get data from the CSV fils in the storage folder in the project and loads them into the database
<br>
You can refer to the API doc for its usage:<br>
<a href="https://documenter.getpostman.com/view/18259928/UzBmMn12" >API doc</a>









