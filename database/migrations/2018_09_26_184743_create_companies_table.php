<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id');
            $table->enum('owner_type', ['Company', 'Shareholder']);
            $table->string('name');
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('country')->nullable();
            $table->string('vat')->nullable();
            $table->string('logo');
            $table->float('capital', 10, 2);
            $table->integer('shares')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *s
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
