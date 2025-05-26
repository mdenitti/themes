<?php

namespace App\Livewire;

use Livewire\Component;

class Luggage extends Component
{
    public $passengers = 1;
    public $checkedBaggage = 0;
    public $handBaggage = false;
    
    public $checkedBaggagePrice = 150; // EUR per item
    public $handBaggagePrice = 50; // EUR per item
    
    public function calculateTotal()
    {
        $total = 0;
        
        // Calculate checked baggage cost
        $total += $this->passengers * $this->checkedBaggage * $this->checkedBaggagePrice;
        
        // Add hand baggage cost if selected
        if ($this->handBaggage) {
            $total += $this->passengers * $this->handBaggagePrice;
        }
        
        return $total;
    }
    
    public function render()
    {
        $total = $this->calculateTotal();
        
        return view('livewire.luggage', [
            'total' => $total
        ]);
    }
}
