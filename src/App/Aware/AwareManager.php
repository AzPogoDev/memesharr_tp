<?php

namespace App\Aware;

use App\Repository\CommentRepository;
use App\Repository\MemeRepository;
use PDO;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Symfony\Component\HttpFoundation\ParameterBag;

class AwareManager
{
    private Request $request;

    private ?PDO $pdo = null;

    private ?Environment $twig = null;

    private ?MemeRepository $memerepository = null;

    private ?CommentRepository $commentrepository = null;

    public function __construct(Request $request)
    {

        $this->request = $request;
    }

    public function manage(object $object)
    {
        if ($object instanceof PdoAware) {
            if (!$this->pdo) {
                $this->pdo = new PDO('mysql:host=localhost;dbname=memeshare', 'root');
            }

            $object->setPdo($this->pdo);
        }

        if ($object instanceof RequestAware) {
            $object->setRequest($this->request);
        }

        if ($object instanceof MemeRepositoryAware) {
            if (!$this->memerepository) {
                $this->memerepository = new MemeRepository();
                $this->manage($this->memerepository);
            }
            $object->setMemeRepository($this->memerepository);
        }

        if ($object instanceof CommentRepositoryAware) {
            if (!$this->commentrepository) {
                $this->commentrepository = new CommentRepository();
                $this->manage($this->commentrepository);
            }
            $object->setCommentRepository($this->commentrepository);
        }


        if ($object instanceof TwigAware) {
            if (!$this->twig) {
                $loader = new FilesystemLoader(__DIR__ . '/../Templates');
                $this->twig = new Environment($loader);
            }
            $object->setTwig($this->twig);
        }
    }
}
