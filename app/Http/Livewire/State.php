<?php

namespace App\Http\Livewire;

use App\Billing\Invoice\Invoice;
use Livewire\Component;

class State extends Component
{
    public function render()
    {
        $inv1 = new Invoice(500, "Apple");
        $inv2 = new Invoice(2500, "Banan");
        $inv3 = new Invoice(0, "Weed");

        return view('livewire.state', [
            'inv1' => $inv1,
            'inv2' => $inv2,
            'inv3' => $inv3,
        ]);
    }
}
