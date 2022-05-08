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
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedbigInteger('customer_id');
            $table->foreign('customer_id',)->references('id')->on('customers');

            $table->unsignedbigInteger('user_id');
            $table->foreign('user_id',)->references('id')->on('users');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->unsignedbigInteger('user_id');
            $table->foreign('user_id',)->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
        });
    }
};
