<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        $data = 'Wellcome to livewire';
        return view('livewire.blog', compact('data'));
    }
}
