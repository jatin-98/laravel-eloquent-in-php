<?php

namespace Controllers;

use Models\Upvote;

class UpvoteController
{
    public static function upvoteAnswer($answer_id, $user_id)
    {
        $upvote = Upvote::create([
            'answer_id' => $answer_id,
            'user_id' => $user_id
        ]);
        return $upvote;
    }
}
