<?php

namespace OCA\ChitTalk\AppInfo;

use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IRegistrationContext;

class Application extends App {
    public function __construct(array $urlParams = []) {
        parent::__construct('chittalk', $urlParams);
    }

    public function register(IRegistrationContext $context): void {
        // CSRF-Schutz für bestimmte Endpunkte deaktivieren
        $context->registerMiddleware(function () {
            \OC::$server->getCsrfTokenManager()->disableApp('chittalk');
        });
    }

    public function boot(IBootContext $context): void {
        // Zusätzlicher Boot-Code falls nötig
    }
}
