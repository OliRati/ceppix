<?php

class UserRepository extends MainRepository
{
    private $table = "user";

    public function createUser($user)
    {
        global $pdo;

        $req = $pdo->prepare("INSERT INTO user (nom, email, pwd) VALUES (:nom, :email, :pwd)");
        $req->execute([
            ':nom' => $user->getNom(),
            ':email' => $user->getEmail(),
            ':pwd' => $user->getPwd()
        ]);
    }
}