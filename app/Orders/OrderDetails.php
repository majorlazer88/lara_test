<?php

namespace App\Orders;

use App\Interfaces\PaymentGatewayContractInterface;

class OrderDetails
{
    private $paymentGateway;

    public function __construct(PaymentGatewayContractInterface $paymentGateway) {
        $this->paymentGateway = $paymentGateway;
    }

    public function all()
    {
        $this->paymentGateway->setDiscount(500);

        return [
            'name' => 'Victore',
            'address' => '123 Coder\'s Tape Street'
        ];
    }
}
