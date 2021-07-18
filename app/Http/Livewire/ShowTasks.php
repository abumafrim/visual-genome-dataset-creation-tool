<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Imports\EntriesImport;
use App\Exports\EntriesExport;
use Livewire\WithFileUploads;
use Excel;

class ShowTasks extends Component
{
	use WithFileUploads;

	public $tasks;
	public $showCreate = false;
	public $name;
	public $srclang;
	public $tgtlang;
	public $gensystem;
	public $datafile;
	public $photos = [];

	protected $rules = [
		'name' => 'required|min:5',
		'srclang' => 'required|min:3',
		'tgtlang' => 'required|min:3',
		'gensystem' => 'required|min:3',
		'datafile' => 'required|mimes:xls,xlsx',
	];

	public function mount()
	{
		$this->tasks = Task::latest()->get();
	}

	public function exportall($id)
	{
		return Excel::download(new EntriesExport($id), 'data.xlsx');
	}

	public function exportannotated()
	{
		# code...
	}

	public function createTask()
	{
		$this->validate();

		$task = Task::create([
			'name' => $this->name,
			'srclang' => $this->srclang,
			'tgtlang' => $this->tgtlang,
			'gensystem' => $this->gensystem,
		]);

		$data = Excel::import(new EntriesImport($task->id), $this->datafile->path());

		foreach ($this->photos as $photo) {
            $photo->storeAs('public/photos', $photo->getClientOriginalName());
        }

		$this->showCreate = false;
		$this->name = "";
		$this->srclang = "";
		$this->tgtlang = "";
		$this->gensystem = "";
		$this->datafile = "";
		$this->tasks = Task::latest()->get();
	}

	public function remove($id)
	{
		$task = Task::find($id);
		$task->delete();

		$this->tasks = Task::latest()->get();
	}

	public function changeCreate()
	{
		$this->showCreate = true;
	}

	public function closeCreate()
	{
		$this->showCreate = false;
	}

    public function render()
    {
        return view('livewire.show-tasks')->layout('base');
    }
}
