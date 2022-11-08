<?php

namespace App\Billing;

use Illuminate\Support\Str;
use App\Repositories\UserRepository;
use App\Interfaces\PaymentGatewayContractInterface;

class BankPaymentGateway implements PaymentGatewayContractInterface
{
    public function __construct(
        private string $currency,
        private UserRepository $users,
        private int $discount = 0
    ) {
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
