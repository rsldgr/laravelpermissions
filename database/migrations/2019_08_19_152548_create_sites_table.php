<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('languages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('language');
            $table->string('code');
            $table->boolean('cantranslate')->default(false);
            $table->timestamps();
        });

        Schema::create('sitetypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });


        Schema::create('scripts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->json('settings');
            $table->timestamps();
        });

        Schema::create('sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('language_id')->unsigned();
            $table->bigInteger('translate_id')->unsigned();
            $table->bigInteger('type_id')->unsigned();
            $table->bigInteger('script_id')->unsigned();
            $table->json('categories');	
            $table->json('options');	
            $table->text('editor_message');	
            $table->string('token', 80);
            $table->string('url')->unique();
            $table->date('expiration_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users');
                
            $table->foreign('type_id')
                ->references('id')->on('sitetypes');

            $table->foreign('language_id')
                ->references('id')->on('languages');

            $table->foreign('translate_id')
                ->references('id')->on('languages');

            $table->foreign('script_id')
                ->references('id')->on('scripts');

            $table->unique('language_id', 'translate_id');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
        Schema::dropIfExists('languages');
        Schema::dropIfExists('scripts');
        Schema::dropIfExists('sitetypes');
        

    }
}
