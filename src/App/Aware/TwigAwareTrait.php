<?php


namespace App\Aware;

use Twig\Environment;

trait TwigAwareTrait
{


    private ?Environment $twig = null;

    public function setTwig(Environment $twig)
    {
        $this->twig = $twig;
    }
}