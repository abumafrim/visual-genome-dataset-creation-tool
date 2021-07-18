<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Entry;
use App\Models\Task;

class ShowEntries extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $task;
	public $showAnnotate = false;
	public $updateAnnotate = [];
	public $editAnnotate = -1;

	public function annotateThis($id)
	{
		$entry = Entry::find($id);
		$entry->manualtext = $this->updateAnnotate[$id];
		$entry->save();
		$this->showAnnotate = false;
	}

	public function acceptThis($id)
	{
		$entry = Entry::find($id);
		$entry->manualtext = $entry->tgttext;
		$entry->save();
	}

	public function changeAnnotate($id)
	{
		if(!$this->showAnnotate){
			$entry = Entry::find($id);
			$this->updateAnnotate[$id] = ($entry->manualtext === "") ? $entry->tgttext : $entry->manualtext ;
			$this->editAnnotate = $id;
			$this->showAnnotate = true;
		}
	}

	public function closeAnnotate()
	{
		$this->showAnnotate = false;
	}

    public function render()
    {
        return view('livewire.show-entries', [
        	'entries' => Entry::where('task_id', '=', $this->task['id'])->paginate(50)
        ]);
    }
}