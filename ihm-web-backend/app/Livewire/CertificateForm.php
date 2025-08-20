<?php

namespace App\Livewire;

use Livewire\Component;

class CertificateForm extends Component
{
    public $count = [1];
    public $c = 0;
 
    public function add()
    {
        array_push($this->count, $this->c);
        $this->c += 1;
    }

    public function remove($index) {
        array_splice($this->count, $index, 1);
    }

    public function render()
    {
        return view('livewire.certificate-form');
    }
}
