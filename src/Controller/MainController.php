<?php
// src/Controller/MainController.php

namespace App\Controller;

use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Annotation\Method;

/**
 * @Route("/")
 */
class MainController extends Controller
{
    private $conn;

    public function __construct(Connection $conn)
    {
        $this->conn = $conn;
    }

    /**
     * @Route("/", name="main_index")
     */
    public function index(Request $request)
    {
        return $this->render('main/index.html.twig', [
            // ...
        ]);
    }

    /**
     * @Route("/hello/{name}", name="main_hello")
     */
    public function hello(Request $request, $name)
    {
        $greeting = "Hello {$name}!";

        return $this->render('main/hello-name.html.twig', [
            'greeting' => $greeting,
        ]);
    }

    /**
     * @Route("/items", name="main_items_index")
     */
    public function itemsIndex(Request $request, $name)
    {
        $sql = 'SELECT * FROM item';
        $items = $this->conn->fetchAll($sql);

        return $this->render('main/items-index.html.twig', [
            'items' => $items,
        ]);
    }

        /**
     * @Route("/secured", name="main_secured")
     */
    public function secured(Request $request)
    {
        return $this->render('main/secured.html.twig', [
            // ...
        ]);
    }
}
