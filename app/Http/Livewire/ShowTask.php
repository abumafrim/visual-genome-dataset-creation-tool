<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class ShowTask extends Component
{
	public $task;

	public function mount(Task $task)
	{
		$this->task = $task;
	}

    public function render()
    {
        return view('livewire.show-task')->layout('base');
    }
}
