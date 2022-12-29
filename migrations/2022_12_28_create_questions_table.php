<?php

use Illuminate\Database\Capsule\Manager as Capsule;


Capsule::schema()->create('questions', function ($table) {
    $table->increments('id');
    $table->text('question');
    $table->foreignId('user_id');
    $table->timestamps();
});
