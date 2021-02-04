<?php

namespace App\Http\Controllers;

use App\Repository\AwardRepositoryInterface;
use Illuminate\Contracts\View\View;

class ResultController extends Controller
{
    private AwardRepositoryInterface $awardRepository;

    /**
     * ResultController constructor.
     * @param AwardRepositoryInterface $awardRepository
     */
    public function __construct(AwardRepositoryInterface $awardRepository)
    {
        $this->awardRepository = $awardRepository;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $awards = $this->awardRepository->all();

        return view('results', ['awards' => $awards]);
    }
}
