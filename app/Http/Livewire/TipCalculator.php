<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TipCalculator extends Component
{
    public $amount;
    public $percentage;
    public $tip;
    public $total;

    public function mount()
    {
        $this->percentage = 10;
    }

    public function updated()
    {
        $this->validate([
            'amount' => 'required|integer',
            'percentage' => 'required|integer|max:100'
        ]);

        $this->tip = ($this->percentage * $this->amount) / 100;
        $this->total = $this->tip + $this->amount;
    }

    public function render()
    {
        return view('livewire.tip-calculator');
    }
}
