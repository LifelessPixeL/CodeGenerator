<?php

namespace App\Services;

use App\Imports\AwardsImport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;

class CsvHandlerService
{
    /**
     * @param UploadedFile $csv
     * @return RedirectResponse
     */
    public function importCsv(UploadedFile $csv): RedirectResponse
    {
        Excel::import(new AwardsImport, $csv);

        return back();
    }

}
