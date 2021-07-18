<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Imports\EntriesImport;
use Livewire\WithFileUploads;
use Excel;
use Illuminate\Http\Request;

class CreateTask extends Component
{
	use WithFileUploads;

	public $name;
	public $srclang;
	public $tgtlang;
	public $gensystem;
	public $datafile;
	public $photos;
	public $task;

	protected $rules = [
		'name' => 'required|min:5',
		'srclang' => 'required|min:3',
		'tgtlang' => 'required|min:3',
		'gensystem' => 'required|min:3',
		'datafile' => 'required|mimes:xls,xlsx',
		'photos.*' => 'required|image',
	];

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

	public function saveTask(Request $request)
	{
		$validatedData = $this->validate();
		$task = Task::create($validatedData);

		$data = Excel::import(new EntriesImport($task->id), $this->datafile->path());

		foreach ($this->photos as $photo) {
            $photo->store('public/photos', $photo->getClientOriginalName());
        }
	}

    public function render()
    {
        return view('livewire.create-task');
    }
}
