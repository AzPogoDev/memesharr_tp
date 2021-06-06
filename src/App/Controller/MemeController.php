<?php

namespace App\Controller;

use App\Aware\PdoAware;
use App\Aware\PdoAwareTrait;

use App\Aware\MemeRepositoryAware;
use App\Aware\MemeRepositoryAwareTrait;

use App\Aware\CommentRepositoryAware;
use App\Aware\CommentRepositoryAwareTrait;

use App\Aware\TwigAware;
use App\Aware\TwigAwareTrait;

use App\Aware\RequestAware;
use App\Aware\RequestAwareTrait;

use App\Entity\Comment;

use Symfony\Component\HttpFoundation\Response;


use Symfony\Component\HttpFoundation\ParameterBag;

class MemeController implements PdoAware, RequestAware, TwigAware, MemeRepositoryAware, CommentRepositoryAware
{
    use  PdoAwareTrait;
    use MemeRepositoryAwareTrait;
    use TwigAwareTrait;
    use RequestAwareTrait;
    use CommentRepositoryAwareTrait;

    public function memes(): Response
    {

        return new Response($this->twig->render(
            'memes.html.twig',
            ['memes' => $this->memerepo->getAll()]));
    }

    public function show(): Response
    {
        $comment = null;

        if ($this->request->request->has('commentadd')) {

            $comment = $this->request->request->get('commentairemg');

            $newcomment = new Comment('Anonyme', $comment, $this->request->query->get('id'));

            $this->commentrepo->addComment($newcomment);

        }


        return new Response($this->twig->render(
            'meme.html.twig',
            [
                'memesingle' => $this->memerepo->getById($this->request->query->get('id')),
                'comments' => $this->commentrepo->GetComments($this->request->query->get('id')),
            ],


        ));
    }


}
