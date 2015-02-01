<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('product');
			$table->string('model');
			$table->float('price')->unsigned();
			$table->float('gain')->unsigned();
			$table->float('price_iva')->unsigned();
			$table->integer('reorderpoint')->unsigned();
			$table->integer('reserve')->unsigned();			
			$table->enum('status',['r','pr']);
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
		Schema::drop('products');
	}

}
