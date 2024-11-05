<?php

namespace App\Livewire;

use App\Services\Midtrans;
use Livewire\Component;

class Form extends Component {
    public string $message;

    public function render() {
        return view( 'livewire.form' );
    }

    public function mount() {
    }

    public function sendComment() {
        $validated = $this->validate( [
            'message' => 'required',
        ] );

    }
}
