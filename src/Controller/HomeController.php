<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;


class HomeController
{

    /**
     * @var Environment
     */
    private $twig;

    public function index()
    {
        $articles = [
            [
                'titre' => 'titre1',
                'contenu1' => 'contenu1',
                'image' => 'https://picsum.photos/200',
                'etoiles' => 4,
            ],
            [
                'titre' => 'titre2',
                'contenu1' => 'contenu2',
                'image' => 'https://picsum.photos/200',
                'etoiles' => 2,
            ]
        ];
        $content=$this->twig->render("Home/index.html.twig",[
            'articles'=>$articles
        ]);
        return new Response($content);
    }

    public function __construct(Environment $twig)
    {
        $this->twig=$twig;
    }

}