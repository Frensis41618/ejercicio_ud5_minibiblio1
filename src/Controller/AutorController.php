<?php
// src/Controller/AutorController.php
namespace App\Controller;
use App\Entity\Autor;
use App\Repository\AutorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class AutorController extends AbstractController
{
    #[Route('/autor/{id}', name: 'autor_detalle')]
    final public function detalle(Autor $autor): Response
    {
        return $this->render('autor/detalle.html.twig', [
            'autor' => $autor
        ]);
    }
}