<?php
namespace App\Repository;

use App\Models\Award;
use Illuminate\Support\Collection;

interface AwardRepositoryInterface
{
    public function all(): Collection;
}