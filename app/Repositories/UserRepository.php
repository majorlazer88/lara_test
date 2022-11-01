<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Recipient;

use function PHPUnit\Framework\isEmpty;

class UserRepository
{
    public function getByTotalAmount(int $amount): array
    {
        // $recipient = User::find(1)->recipients()->get();
        //                 // ->where('country', 'Estonia')
        //                 // ->first();
        ///////
        // $recipient = Recipient::find(1);
        ///////
        $users = User::where('user_total_amount_spent_float', '<', $amount)->get();

        if ($users->isEmpty()) {
            return [];
        }

        $recipients = Recipient::whereBelongsTo($users)->get();

        return $recipients->last()->toArray();
    }
}
