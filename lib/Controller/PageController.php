<?php

namespace OCA\ChitTalk\Controller;

use OCP\AppFramework\Controller;
use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;

class PageController extends Controller {

    /**
     * Lädt die Hauptseite der Anwendung.
     * @return TemplateResponse
     */
    public function index() {
        return new TemplateResponse('chittalk', 'main');
    }

    /**
     * Registriert einen neuen Benutzer.
     * @param IRequest $request
     * @return DataResponse
     */
    public function register(IRequest $request) {
        $params = $request->getParams();

        // Beispiel für eine Datenbankinteraktion (dies muss angepasst werden)
        // $username = $params['username'] ?? '';
        // $email = $params['email'] ?? '';
        // Datenbanklogik hinzufügen
        
        return new DataResponse(['message' => 'Registrierung erfolgreich', 'data' => $params]);
    }

    /**
     * Authentifiziert einen Benutzer beim Login.
     * @param IRequest $request
     * @return DataResponse
     */
    public function login(IRequest $request) {
        $params = $request->getParams();

        // Beispiel für die Login-Logik (dies muss angepasst werden)
        // $username = $params['username'] ?? '';
        // $password = $params['password'] ?? '';
        // Authentifizierungslogik hinzufügen

        return new DataResponse(['message' => 'Login erfolgreich', 'user' => $params['username'] ?? '']);
    }
}
?>
