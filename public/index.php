<?php

use Controllers\AnswerController;
use Controllers\UserController;
use Controllers\QuestionController;
use Controllers\UpvoteController;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

require_once __DIR__ . '/../bootstrap.php';

$user = UserController::createUser(
    "user2",
    "user2@example.com",
    "user2_pass"
);

$question = QuestionController::createQuestion(
    "Who is the Prime Minister of India?",
    1
);

$answers = AnswerController::addAnswer(
    "Narendra Modi",
    1,
    2
);

$upvote = UpvoteController::upvoteAnswer(
    1,
    14
);
