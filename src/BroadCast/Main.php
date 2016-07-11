<?php

namespace BroadCast;


use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("enabled");
    }

    public function onDisable()
    {
        $this->getLogger()->info("disabled");
    }

    public function onCommand(CommandSender $sender, Command $command, $label, array $args)
    {
        switch ($command->getName()) {
            case "warning":
                if ($sender->hasPermission(broadcast . warning)) {
                    $sender->sendMessage(TextFormat::GRAY . "Warning sended!");
                    $sender->getServer()->broadcastMessage(TextFormat::RED . "[Warning] " . implode(TextFormat::GRAY . " ", $args));
                }
            case "server":
                if ($sender->hasPermission(broadcast . warning)) {
                    $sender->sendMessage(TextFormat::GRAY . "Server message sended!");
                    $sender->getServer()->broadcastMessage(TextFormat::BLUE . "[Server] " . implode(TextFormat::GRAY . " ", $args));
                }

        }
    }
}
