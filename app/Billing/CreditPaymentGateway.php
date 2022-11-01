<?php

namespace App\Billing;

use Illuminate\Support\Str;
use App\Repositories\UserRepository;
use App\Interfaces\PaymentGatewayContractInterface;

class CreditPaymentGateway implements PaymentGatewayContractInterface
{
    private $users;
    private $currency;
    private $discount;

    public function __construct($currency, UserRepository $users) {
        $this->users = $users;
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }

    public function charge($amount): array
    {
        $fees = $amount * 0.03;

        return [
            'company_name' => $this->users->getByTotalAmount($amount),
            'amount' => $amount - $this->discount + $fees,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount,
            'fees' => $fees,
        ];
    }
}
