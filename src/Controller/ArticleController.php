<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index()
    {
        return $this->render("articles/index.html.twig");
    }

    /**
     * @Route("/article/{article}",name="article_show")
     */
    public function show(Article $article) {
        $this->denyAccessUnlessGranted("read_article",$article);
        /*$user = $this->getUser();
        if($user !== $article->getAuteur()){
            throw $this->createAccessDeniedException();
        }*/
        return $this->render("articles/show.html.twig", [
            "article" => $article
        ]);
    }
}
