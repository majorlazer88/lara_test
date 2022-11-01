<?php

namespace App\Interfaces;

interface PaymentGatewayContractInterface
{
    public function setDiscount($amount);
    public function charge($amount);
}
