<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @var ContactRepository
     */
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request): Response
    {
        return $this->render('contact/index.html.twig', [
            "contact" => $this->contactRepository->findAll(),
        ]);
    }

    /**
     * @Route("/contact/{id}", name="contactId")
     */
    public function ContactIds(Request $request, int $id): Response
    {
        //$name = $request->query->get('name');
        return $this->render('pages/contact.html.twig', [
            'contact' => $this->contactRepository->find($id)
        ]);
    }
}