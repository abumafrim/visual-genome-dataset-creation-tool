<?php

namespace App\Exports;

use App\Models\Entry;
use Maatwebsite\Excel\Concerns\FromCollection;

class EntriesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($task_id)
    {
        $this->task_id = $task_id;
    }

    public function collection()
    {
        return Entry::where('task_id', '=', $this->task_id)
        			->select('imageid', 'x', 'y', 'width', 'height', 'srctext', 'tgttext', 'manualtext')
        			->get();
    }
}
