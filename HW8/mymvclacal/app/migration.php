<?php

require 'Illuminate.php';

$capsule::schema()->create('goods', function ($table) {
    $table->increments('id')->unsigned();
    $table->string('name');
    $table->string('category');
    $table->integer('id_user');
    $table->integer('amount');
    $table->timestamps();
});
