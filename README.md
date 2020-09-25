if you have project in packages/dgera/ folder
then 
add in composer.json
"autoload": {
    "psr-4": {
        "Dgera\\WorldDataRepo\\": "packages/dgera/WorldDataRepo/src/"
    }
}

"require": {
    "dgera/world-data-repo": "~1.0-dev"
},
"repositories": [
    {
        "type": "vcs",
        "url": "git repo url"
    }
],

add in config/app.php providers array
Dgera\WorldDataRepo\WorldDataRepoServiceProvider::class,


run php artisan vendor:publish
select index of Dgera\WorldDataRepo\WorldDataRepoServiceProvider
