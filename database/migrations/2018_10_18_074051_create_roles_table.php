<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        // Create two roles for the application
        DB::table('roles')->insert(
            array(
                'id' => 1,
                'name' => 'Administrator',
                'description' => 'Administrator of the system'
            )
        );
        DB::table('roles')->insert(
            array(
                'id' => 2,
                'name' => 'User',
                'description' => 'Regular User'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
