<?php

namespace App\Repository;

use App\Aware\PdoAware;
use App\Aware\PdoAwareTrait;

use App\Entity\Comment;

use PDO;

class CommentRepository implements PdoAware
{
    use PdoAwareTrait;


    public function GetComments(int $memeId)
    {
        $query = $this->pdo->prepare('SELECT * FROM `comment` WHERE memeId = :memeid');

        $query->bindParam('memeid', $memeId, PDO::PARAM_INT);

        $query->execute();

        return $query->fetchAll();
    }

    public function addComment(Comment $comment)
    {
        $query = $this->pdo->prepare('INSERT INTO `comment`( `author`, `content`, `memeId`) VALUES (:author , :content, :memeid)');

        $query->execute([
            'author' => $comment->getAuthor(),
            'content' => $comment->getContent(),
            'memeid' => $comment->getMemeId()
        ]);

        return $query->fetchAll();
    }

}