<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id')->unique();
			$table->string('name')->nullable();
			$table->string('logo')->nullable();
			$table->string('url')->nullable();
			$table->string('description')->nullable();
			$table->string('production_url')->nullable();
			$table->string('development_url')->nullable();
			$table->string('test_url')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('company_id')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
