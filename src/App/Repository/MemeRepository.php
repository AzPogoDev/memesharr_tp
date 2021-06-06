<?php

namespace App\Repository;

use App\Aware\PdoAware;
use App\Aware\PdoAwareTrait;

use App\Entity\Meme;
use PDO;

class MemeRepository implements PdoAware
{

    use PdoAwareTrait;


    public function getAll()
    {
        $query = $this->pdo->prepare('SELECT * FROM `meme`');
        $query->execute();
        $memes = [];

        return $query->fetchAll();
    }

    public function getRecentsArticles(int $number)
    {

        $query = $this->pdo->prepare('SELECT * FROM `meme` LIMIT :limitnumber');

        $query->bindParam('limitnumber', $number, PDO::PARAM_INT);

        $query->execute();

        return $query->fetchAll();
    }

    public function getById(int $number)
    {

        $query = $this->pdo->prepare('SELECT * FROM `meme` WHERE id = :id');

        $query->bindParam('id', $number, PDO::PARAM_INT);

        $query->execute();

        return $query->fetch();
    }


    public function addMeme(Meme $meme)
    {
        $query = $this->pdo->prepare('INSERT INTO `meme`( `author`, `img`) VALUES ( :author, :memecontent)');

        $query->execute([
            'author' => $meme->getAuthor(),
            'memecontent' => $meme->getContent(),
        ]);

        return $query->fetchAll();
    }

}