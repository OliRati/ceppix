<?php

class UserController
{
    // le static me permet d'appeler une propriété ou une methode de class
    // sans avoir besoin d'instancier cette dernière
    public static function register()
    {
        if (isset($_POST['submit']) && !empty($_POST['submit'])) {

            foreach ($_POST as $key => $value) {
                $_POST[$key] = htmlspecialchars($value);
                if (empty($value))
                    return;
            }

            if ($_POST['confpwd'] !== $_POST['pwd'])
                return;

            $date = new DateTime();
            $date = $date->format("Y-m-d H:i:s");

            $user = new User($_POST['nom'], $_POST['email'], $_POST['pwd'], "ROLE_USER", $date, $date);

            $userRepository = new UserRepository;

            $arrayUser = [
                "nom" => $user->getNom(),
                "email" => $user->getEmail(),
                "pwd" => $user->getPwd(),
                "roles" => $user->getRoles(),
                "createdAt" => $user->getCreatedAt(),
                "updatedAt" => $user->getUpdatedAt()
            ];

            $userRepository->create($arrayUser, "user");
        }
    }

    public static function getUserByEmail()
    {
        $userRepository = new UserRepository;
        var_dump($userRepository->getBy(["user", "email", "baob@bob.com"]));

        $userRepository->create([
            "nom" => "Bob",
            "email" => "baob@bob.com",
            "pwd" => "azerty"
        ], "user");
    }
}