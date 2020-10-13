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
        return $this->render("articles/show.html.twig", [
            "article" => $article
        ]);
    }
}
