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
                    return false;
            }

            if ($_POST['confpwd'] !== $_POST['pwd'])
                return false;

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
            return true;
        }

        return false;
    }

    public static function nettoyage($postValue)
    {
        return htmlspecialchars($postValue);
    }

    public static function login()
    {
        if (isset($_POST['submit']) && !empty($_POST['submit'])) {
            $userRepository = new UserRepository;
            $newUser = $userRepository->getBy(['user', 'email', UserController::nettoyage($_POST['email'])]);

            if (sizeof($newUser) > 0) {
                if (password_verify($_POST['pwd'], $newUser[0]['pwd'])) {
                    $newUser = $newUser[0];
                    $user = new User($newUser['nom'], $newUser['email'], $newUser['pwd'], $newUser['roles'], $newUser['createdAt'], $newUser['updatedAt']);
                }
            }
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