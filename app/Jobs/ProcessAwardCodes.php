<?php

namespace App\Jobs;

use App\Models\Award;
use App\Models\Code;
use App\Services\CodeGeneratorService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessAwardCodes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Award $award;

    /**
     * ProcessAwardCodes constructor.
     * @param Award $award
     */
    public function __construct(Award $award)
    {
        $this->award = $award;
    }

    /**
     * @param CodeGeneratorService $codeGenerator
     */
    public function handle(CodeGeneratorService $codeGenerator): void
    {
        //Generate codes for the award
        $codes = $codeGenerator->getAwardCodes($this->award);

        $insertCodes = collect($codes);

        //Massive insertion
        $chunks = $insertCodes->chunk(Award::CHUNK_NUMBER);

        foreach ($chunks as $chunk) {
            Code::insert($chunk->toArray());
        }
    }
}
