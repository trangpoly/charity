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
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('expiration', 'expire_at');
            $table->integer('quantity')->nullable()->change();
            $table->integer('stock')->nullable()->change();
            $table->text('desc')->nullable()->change();
            $table->string('unit', 10)->nullable()->change();
            $table->string('district', 50)->after('weight_unit');
            $table->string('city', 50)->after('district');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['district', 'city']);
            $table->renameColumn('expire_at', 'expiration');
        });
    }
};
