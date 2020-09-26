if you have project in packages/dgera/ folder
then 
add in composer.json
"require": {
    "dgera/world-data-repo": "^1.0.7"
},
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/3WebBox/world-data-repo.git"
    }
],

run composer update / install

add in config/app.php providers array
Dgera\WorldDataRepo\WorldDataRepoServiceProvider::class,


run php artisan vendor:publish
select index of Dgera\WorldDataRepo\WorldDataRepoServiceProvider

you will have migrations in database/migrations/WorldDataMigrations
and seeders in seeders/WorldData.php
models in Models
and controllers to fetch data
and routes in routes/world_data_route.php
add require_once('world_data_route.php'); in api.php/web.php to fetch the records and only one will work at a time
