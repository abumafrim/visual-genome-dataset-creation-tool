<?php

namespace App\Imports;

use App\Models\Entry;
use Maatwebsite\Excel\Concerns\ToModel;

class EntriesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct($task_id)
    {
        $this->task_id = $task_id;
    }
    
    public function model(array $row)
    {
        return new Entry([
            'task_id'       => $this->task_id,
            'imageid'      => $row[0],
            'x'             => $row[1],
            'y'             => $row[2],
            'width'         => $row[3],
            'height'        => $row[4],
            'srctext'       => $row[5],
            'tgttext'       => $row[6],
            'manualtext'    => '',
        ]);
    }
}
