<?php

namespace App\Billing;

use Illuminate\Support\Str;
use App\Repositories\UserRepository;
use App\Interfaces\PaymentGatewayContractInterface;

class BankPaymentGateway implements PaymentGatewayContractInterface
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
        return [
            'company_name' => $this->users->getByTotalAmount($amount),
            'amount' => $amount - $this->discount,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount,
        ];
    }
}
