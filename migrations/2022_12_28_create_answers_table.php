<?php

use Illuminate\Database\Capsule\Manager as Capsule;


Capsule::schema()->create('answers', function ($table) {
    $table->increments('id');
    $table->text('answer');
    $table->foreignId('user_id');
    $table->foreignId('question_id');
    $table->timestamps();
});
