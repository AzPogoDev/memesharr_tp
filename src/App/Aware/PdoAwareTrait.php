<?php


namespace App\Aware;

use PDO;

trait PdoAwareTrait
{
    private ?PDO $pdo = null;

    public function setPdo(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}