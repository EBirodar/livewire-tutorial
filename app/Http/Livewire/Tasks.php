<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tasks extends Component
{
    public $amount=1000;
    public $oldamount=1000;
    public $balance;
    public $newAmountUsd=0;
    public $newAmountUzs=0;
    public $newAmountEuro=0;
    public $usd=1;
    public $usz=11000;
    public $euro=1.1;
    public $currencies=[
        [
            'id'=>1,
            'name'=>'USD',
            'values'=>1
        ],
        [
            'id'=>2,
            'name'=>'UZS',
            'values'=>11000
        ],
        [
            'id'=>3,
            'name'=>'EURO',
            'values'=>1.1
        ],

    ];


    public function update()
    {

        $this->balance=$this->amount-$this->newAmountUsd;

    }
    public function mount()
    {
        $this->balance=$this->amount-$this->newAmountUsd;
    }
    public function render()
    {
        return view('livewire.tasks');
    }
}
