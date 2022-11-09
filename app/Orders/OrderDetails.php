<?php

namespace App\Orders;

use App\Events\PaymentDiscountSet;
use App\Interfaces\PaymentGatewayContractInterface;
use App\Models\User;

class OrderDetails
{
    private $paymentGateway;

    public function __construct(PaymentGatewayContractInterface $paymentGateway) {
        $this->paymentGateway = $paymentGateway;
    }

    public function all()
    {
        $this->paymentGateway->setDiscount(500);

        $user = User::findOrFail(1);

        // https://laravel.com/docs/9.x/mocking#event-fake
        PaymentDiscountSet::dispatch($user);
        // PaymentDiscountSet::dispatchIf($condition, $user);
        // PaymentDiscountSet::dispatchUnless($condition, $user);

        return [
            'name' => 'Victore',
            'address' => '123 Coder\'s Tape Street'
        ];
    }
}
