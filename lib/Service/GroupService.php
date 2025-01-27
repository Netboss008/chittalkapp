<?php

namespace OCA\ChitTalk\Service;

use OCP\IGroupManager;
use OCP\ILogger;

class GroupService {
    private $groupManager;
    private $logger;

    /**
     * Konstruktor für GroupService.
     * @param IGroupManager $groupManager
     * @param ILogger $logger
     */
    public function __construct(IGroupManager $groupManager, ILogger $logger) {
        $this->groupManager = $groupManager;
        $this->logger = $logger;
    }

    /**
     * Erstellt eine neue Gruppe, wenn sie noch nicht existiert.
     * @param string $groupName
     * @return \OCP\IGroup|null
     */
    public function createGroup(string $groupName) {
        try {
            if (empty($groupName)) {
                throw new \InvalidArgumentException("Der Gruppenname darf nicht leer sein.");
            }

            if (!$this->groupManager->groupExists($groupName)) {
                $group = $this->groupManager->createGroup($groupName);
                $this->logger->info("Gruppe '{$groupName}' wurde erfolgreich erstellt.", ['app' => 'chittalk']);
                return $group;
            } else {
                $this->logger->warning("Gruppe '{$groupName}' existiert bereits.", ['app' => 'chittalk']);
                return null;
            }
        } catch (\Exception $e) {
            $this->logger->error("Fehler beim Erstellen der Gruppe '{$groupName}': " . $e->getMessage(), ['app' => 'chittalk']);
            return null;
        }
    }
}
?>
