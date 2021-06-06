<?php


namespace App\Aware;

use App\Repository\CommentRepository;

trait CommentRepositoryAwareTrait
{
    private ?CommentRepository $commentrepo = null;

    public function setCommentRepository(CommentRepository $commentrepository)
    {
        $this->commentrepo = $commentrepository;
    }

}