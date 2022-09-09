<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tasks extends Component
{
    public $amount=1000;
    public $newbalance;
    public $oldamount=1000;
    public $balance;
    public $currencyType=1;
    public $usd=1;
    public $usz=11000;
    public $currencyy = [];
    public $euro=1.1;
    public $currencies=[
        [
            'id'=>1,
            'name'=>'USD',
            'value'=>1
        ],
        [
            'id'=>2,
            'name'=>'UZS',
            'value'=>11000
        ],
        [
            'id'=>3,
            'name'=>'EURO',
            'value'=>1.1
        ],

    ];


    public function updated()
    {

        $this->balance=$this->amount;
        if(isset($this->currencyy)){
            foreach ($this->currencyy as $key=>$item){

                $x=$this->currencies[$key-1]['value'];
                if($item==null){
                    $item=0;
                }
                $this->newbalance=$item*$this->currencyType/$x;
                $this->balance-=$this->newbalance;
            }
            $this->balance=$this->balance/$this->currencyType;
        }

    }

    public function render()
    {
        return view('livewire.tasks');
    }
}
