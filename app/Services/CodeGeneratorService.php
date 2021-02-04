<?php

namespace App\Services;

use App\Models\Award;

class CodeGeneratorService
{
    const LONG = 16;
    const CHARS = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const NUM_CODES = 1000000;

    /**
     * @param Award $award
     * @return array
     */
    public function getAwardCodes(Award $award): array
    {
        $codes = [];

        for ($i = 0; $i < self::NUM_CODES; $i++) {
            $code = $this->generateUniqueCode($codes);

            $prize = $i < $award->stock;

            $codes[$code] = [
                'award_id' => $award->id,
                'code'     => $code,
                'prize'    => $prize
            ];
        }

        return $codes;
    }

    /**
     * @param array $codes
     * @return string
     */
    private function generateUniqueCode(array $codes): string
    {
        $code = substr(str_shuffle(self::CHARS), 0, self::LONG);

        return !isset($codes[$code]) ? $code : $this->generateUniqueCode($codes);
    }

}
