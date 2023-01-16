<?php

namespace App\Imports;

use App\Ssb;
use Maatwebsite\Excel\Concerns\ToModel;
//use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BulkImport implements ToModel//, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Ssb([
            'Amount' => $row[0],
            'EmployeeId' => $row[1]
        ]);

    }
}
