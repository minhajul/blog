<?php

declare(strict_types=1);

namespace App\Livewire;

use Livewire\Component;

final class TestLivewire extends Component
{
    public int $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.test-livewire');
    }
}
