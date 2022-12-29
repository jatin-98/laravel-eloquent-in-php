<?php

namespace Controllers;

use Models\Answer;

class AnswerController
{
    public static function addAnswer($answer, $question_id, $user_id)
    {
        $answer = Answer::create([
            'answer' => $answer,
            'question_id' => $question_id,
            'user_id' => $user_id
        ]);
        return $answer;
    }
}
