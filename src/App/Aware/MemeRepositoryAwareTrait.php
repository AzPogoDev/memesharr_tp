<?php


namespace App\Aware;


use App\Repository\MemeRepository;

trait MemeRepositoryAwareTrait
{
    private ?MemeRepository $memerepo = null;

    public function setMemeRepository(MemeRepository $memerepository)
    {
        $this->memerepo = $memerepository;
    }

}