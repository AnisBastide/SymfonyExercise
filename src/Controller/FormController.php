<?php
namespace App\Controller;
use App\Entity\Articles;
use App\Form\Form;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
Use Symfony\Component\HttpFoundation\Response;

class FormController extends AbstractController
{

    /**
     * @var EntityManagerInterface
     */
    private $manager;

    public function formInit(Request $request)
    {
        $articles = new Articles();

        $form = $this->createForm(Form::class,$articles);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($articles);die;
        }
        return $this->render('Articles/form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function getArticle(int $id){

    }

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

}
