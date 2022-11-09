<?php

namespace App\Http\Controllers;

use App\Orders\OrderDetails;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Interfaces\PaymentGatewayContractInterface;
use App\Models\Recipient;

class UserController extends Controller
{
    public function show(
        $amount,
        OrderDetails $details,
        PaymentGatewayContractInterface $payment,
        Recipient $recipient,
    )
    {
        // if (!Gate::allows('update-recipient', $recipient)) {
        //     abort(403);
        // };

        $order = $details->all();
        $payment = $payment->charge($amount);

        return view('components.users', [
            'payment' => $payment,
        ]);
    }

    public function update(
        $recipient_id,
        User $user,
        Request $request,
        Recipient $recipient
    )
    {
        $this->authorize('update', User::class);

        // if (!Gate::allows('update-recipient', $recipient)) {
        //     abort(403);
        // };

        return 'can update';
    }
}
