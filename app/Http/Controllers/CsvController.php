<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessAwardCodes;
use App\Models\Award;
use App\Services\CsvHandlerService;
use App\Http\Requests\UploadCsvRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CsvController extends Controller
{
    protected CsvHandlerService $csvHandler;

    /**
     * CsvController constructor.
     * @param CsvHandlerService $csvHandler
     */
    public function __construct(CsvHandlerService $csvHandler)
    {
        $this->csvHandler = $csvHandler;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('uploadcsv');
    }

    /**
     * @param UploadCsvRequest $request
     * @return RedirectResponse
     */
    public function processCsv(UploadCsvRequest $request): RedirectResponse
    {
        $this->csvHandler->importCsv($request->file('csv'));

        $this->processCsvRaws();

        return redirect('/result');
    }

    private function processCsvRaws(): void
    {
        while ($award = Award::where('processed', false)->first()) {
            $award->processed = true;
            $award->save();

            ProcessAwardCodes::dispatch($award);
        }
    }
}
