<?php

namespace App\Repository\Eloquent;

use App\Models\Award;
use App\Repository\AwardRepositoryInterface;
use Illuminate\Support\Collection;

class AwardRepository implements AwardRepositoryInterface
{

    protected Award $award;

    /**
     * AwardRepository constructor.
     * @param Award $award
     */
    public function __construct(Award $award)
    {
        $this->award = $award;
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->award->all();
    }
}
