<?php

namespace App\Controller;

use App\Entity\Player;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use PhpParser\Node\Scalar\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function MongoDB\BSON\toJSON;

class SecurityController extends AbstractController
{
    #[Route('/api/login_check', methods:['POST'])]
    public function login():Response {
        return new Response('');
    }

    #[Route('/register', methods: ['POST'])]
    public function register(ManagerRegistry $doctrine): Response {
        set_error_handler(/**
         * @throws \ErrorException
         */ fn() => throw new \ErrorException());

        try {
//            $params = json_decode(Request::createFromGlobals()->getContent(), true);
            $params = $_POST;
            var_dump($params);
            $pw = password_hash($params['password'], PASSWORD_DEFAULT);
            $user = new User($params['email'], ['ROLE_USER'], $pw);
            $em = $doctrine->getManager();
            $em->persist($user);
            $em->flush();
            return new Response("", 201, ['test']);
        } catch (\ErrorException $e) {
            return new Response($e,400);
        }
    }
}
