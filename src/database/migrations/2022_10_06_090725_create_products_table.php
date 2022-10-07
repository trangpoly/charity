<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 100);
            $table->text('desc');
            $table->string('avatar', 150);
            $table->string('unit', 10);
            $table->float('weight');
            $table->date('expiration');
            $table->integer('quantity');
            $table->string('weight_unit', 10);
            $table->string('address', 100);
            $table->string('phone', 11);
            $table->integer('stock');
            $table->integer('status');
            $table->uuid('category_id');
            $table->uuid('owner_id');
            $table->softDeletes('delete_at');
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
        Schema::dropIfExists('products');
    }
};
