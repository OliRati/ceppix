<?php
// Creation d'une class User

class User
{
    public function __construct($nom, $email, $password)
    {
        $this->setNom($nom);
        $this->setEmail($email);
        $this->setPwd($password);
    }

    // Propriétés
    private $nom;
    private $role = "ROLE_USER";
    private $email;
    private $password;

    // Methodes
    // Setter qui sert a controler les données attribuées aux propriétés de la classe
    public function setEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        }
    }

    public function setPwd($password)
    {
        /*
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{15,}$/', $password)) {
            throw new Exception("Le mot de passe doit faire au minimum 15 caractères, 1 chiffre, 1 lettre minuscule, 1 lettre majuscule, 1 caractère spécial.");
            return;
        }
        */

        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function getPwd()
    {
        return $this->password;
    }

    // Getter qui sert a retourner la valeur d'une propriété private
    public function getEmail()
    {
        return $this->email;
    }

    public function setNom($nom)
    {
        if (strlen($nom) > 20) {
            throw new Exception("Nom doit être inférieur à 20 caractères.", 1);
            return;
        }

        if (strlen($nom) < 2) {
            throw new Exception("Nom doit être supérieur à 2 caractères.", 1);
            return;
        }

        $this->nom = $nom;
    }

    public function getNom()
    {
        return $this->nom;
    }
}
