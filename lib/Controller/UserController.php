<?php
namespace OCA\ChitTalk\Controller;

use OCP\AppFramework\Controller;
use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;

class UserController extends Controller {
    public function __construct($appName, IRequest $request) {
        parent::__construct($appName, $request);
    }

    // Zeigt das Registrierungsformular an
    public function showRegisterForm() {
        return new TemplateResponse('chittalk', 'register');
    }

    // Bearbeitet die Registrierung
    public function register($firstname, $email, $username) {
        if (empty($firstname) || empty($email) || empty($username)) {
            return new DataResponse(['status' => 'Error', 'message' => 'Alle Felder sind Pflicht'], 400);
        }

        // Pseudocode: Nutzer speichern
        // $this->userService->createUser($firstname, $email, $username);

        return new DataResponse(['status' => 'Success', 'message' => 'User registered'], 201);
    }
}
?>
