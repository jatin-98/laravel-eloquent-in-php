<?php

use Illuminate\Database\Capsule\Manager as Capsule;


Capsule::schema()->create('upvotes', function ($table) {
    $table->increments('id');
    $table->foreignId('answer_id');
    $table->foreignId('user_id');
    $table->timestamps();
});
