<?php


namespace App\Aware;

use Symfony\Component\HttpFoundation\Request;


trait RequestAwareTrait
{

    private ?Request $request = null;

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

}