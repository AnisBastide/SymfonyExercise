<?php
namespace App\Controller;
use App\Entity\Articles;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
Use Symfony\Component\HttpFoundation\Response;


class ArticlesController
{

    /**
     * @var EntityManagerInterface
     */
    private $manager;

    public function index(Request $request)
    {
        $title = $request->query->get('title');
        $content = $request->query->get('content');
        $article = new Articles();
        $article->setTitle($title);
        $article->setContent($content);
        $this->manager->persist($article);
        $this->manager->flush();
        return new Response();
    }
    
    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

}