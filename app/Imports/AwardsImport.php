<?php

namespace App\Imports;

use App\Models\Award;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AwardsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return Award
     */
    public function model(array $row): Award
    {
        return new Award(
            [
                'name' => $row['award'],
                'stock' => $row['stock'],
            ]
        );
    }
}
