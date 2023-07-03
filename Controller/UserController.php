<?php
class UserController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function login($dni, $contraseña) {
        $user = $this->model->getUserByUsername($dni);
        
        if ($user && password_verify($contraseña, $dni['contraseña'])) {
            // Inicio de sesión exitoso
            $_SESSION['id'] = $user['id'];
            $_SESSION['dni'] = $user['dni'];
            // Puedes redirigir al usuario a otra página después del inicio de sesión exitoso
            exit();
        } else {
            // Credenciales inválidas
            return "Credenciales inválidas. Por favor, inténtalo de nuevo.";
        }
    }
}
?>
