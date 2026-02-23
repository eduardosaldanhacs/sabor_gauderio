<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Emit;

class Message extends Component
{
    public $show = false;
    public $type = 'success';
    public $title = '';

    #[On('notification')]
    public function showMessage($type, $title)
    {
        $this->type = $type;
        $this->title = $title;
        $this->show = true;
    }

    public function render()
    {
        return view('livewire.message');
    }
}
