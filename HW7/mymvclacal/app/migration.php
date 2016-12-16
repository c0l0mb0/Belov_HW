<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Выполнение миграций.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('category');
            $table->string('amount');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Отмена миграций.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('goods');
    }
}

