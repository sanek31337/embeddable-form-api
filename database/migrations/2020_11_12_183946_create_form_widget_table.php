<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormWidgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('form_widget'))
        {
            Schema::create('form_widget', function(Blueprint $table) {
                $table->id()->unsigned()->autoIncrement();
                $table->string('userName', 255);
                $table->text('message');
                $table->string('pageUid', 64);
                $table->dateTimeTz('created');
                $table->charset = 'utf8mb4';
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('form_widget');
    }
}
