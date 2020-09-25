<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * The database schema.
     *
     * @var \Illuminate\Database\Schema\Builder
     */
    protected $schema;

    /**
     * Create a new migration instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->schema = Schema::connection($this->getConnection());
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('iso2',3);
            $table->string('iso3',3);
            $table->string('name',255);
            $table->string('capital',255)->nullable();
            $table->string('currency',255)->nullable();
            $table->string('phonecode',255)->default(0);
            $table->string('phonedigit',255)->default(0);
            $table->timestamps();
        });
        // Artisan::call('db:seed', ['--class' => 'CountryTableSeeder',]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }

    /**
     * Get the migration connection name.
     *
     * @return string|null
     */
    public function getConnection()
    {
        return config('worlddatarepo.database.connection');
    }
}
