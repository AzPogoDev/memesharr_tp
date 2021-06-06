<?php

namespace App\Controller;

use App\Aware\PdoAware;
use App\Aware\PdoAwareTrait;

use App\Aware\MemeRepositoryAware;
use App\Aware\MemeRepositoryAwareTrait;

use App\Aware\TwigAware;
use App\Aware\TwigAwareTrait;

use App\Aware\RequestAware;
use App\Aware\RequestAwareTrait;

use App\Entity\Meme;

use Symfony\Component\HttpFoundation\Response;

class HomeController implements PdoAware, RequestAware, TwigAware, MemeRepositoryAware
{

    use PdoAwareTrait;
    use MemeRepositoryAwareTrait;
    use TwigAwareTrait;
    use RequestAwareTrait;



    public function home(): Response
    {

        $meme = null;

        if ($this->request->request->has('memesub')) {

            $memecontent = $this->request->request->get('memecontent');

            $newmeme = new Meme('Anonmye', $memecontent);

            $this->memerepo->addMeme($newmeme);

        }

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.imgflip.com/get_memes",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);

        $response = json_decode($response,true);
        $response = $response['data']['memes'];

        curl_close($curl);


        return new Response($this->twig->render(
            'home.html.twig',
            ['memes' => $this->memerepo->getRecentsArticles(10),
                'apimeme' => $response]));
    }

}


