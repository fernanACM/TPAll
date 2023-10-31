<?php

declare(strict_types=1);

/*
 * Plugin created by matymare
 * TPAll - It is a PocketMine-MP plugin by which you can port all players to one place
 * The plugin must not be modified without asking the plugin owner
 * You can write to me on Discord: Roospy#1666
 */

# Credits - fernanACM

namespace matymare\tpall;

use pocketmine\player\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\utils\TextFormat;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
# Lib
use DaPigGuy\libPiggyUpdateChecker\libPiggyUpdateChecker;

use Vecnavium\FormsUI\FormsUI;
use Vecnavium\FormsUI\ModalForm;
# My files
use matymare\tpall\utils\PluginUtils;

class Main extends PluginBase{

    # CheckConfig
    private const CONFIG_VERSION = "1.0.0";

    /**
     * @return void
     */
    protected function onEnable(): void{
        $this->saveDefaultConfig();
        $this->loadCheck();
        $this->loadVirions();
    }

    /**
     * @param CommandSender $sender
     * @param Command $command
     * @param string $label
     * @param array $args
     * @return boolean
     */
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if($command->getName() == "tpall"){
            if(!($sender instanceof Player)){
                $sender->sendMessage("Use this command in-game");
                return true;
            }
            $this->confirmationMenu($sender);
            return true;
        }
        return false;
    }

    /**
     * @return void
     */
    private function loadCheck(){
        # CONFIG
        if((!$this->getConfig()->exists("config-version")) || ($this->getConfig()->get("config-version") != self::CONFIG_VERSION)){
            rename($this->getDataFolder() . "config.yml", $this->getDataFolder() . "config_old.yml");
            $this->saveResource("config.yml");
            $this->getLogger()->critical("Your configuration file is outdated.");
            $this->getLogger()->notice("Your old configuration has been saved as config_old.yml and a new configuration file has been generated. Please update accordingly.");
        }
    }

    /**
     * @return void
     */
    private function loadVirions(): void{
        foreach([
            "FormsUI" => FormsUI::class,
            "libPiggyUpdateChecker" => libPiggyUpdateChecker::class
            ] as $virion => $class
        ){
            if(!class_exists($class)){
                $this->getLogger()->error($virion . " virion not found. Please download TPALL from Poggit-CI or use DEVirion (not recommended).");
                $this->getServer()->getPluginManager()->disablePlugin($this);
                return;
            }
        }
        # Update
        libPiggyUpdateChecker::init($this);
    }

    /**
     * @param Player $player
     * @return void
     */
    private function confirmationMenu(Player $player): void{
        $form = new ModalForm(function(Player $player, $data){
            if(is_null($data)){
                PluginUtils::PlaySound($player, "mob.villager.no");
                return;
            }
            switch($data){
                case true:
                    foreach($this->getServer()->getOnlinePlayers() as $players){
                        $players->teleport($player->getPosition());
                    }
                    $player->sendMessage(TextFormat::colorize($this->getConfig()->getNested("Settings.Prefix")) . TextFormat::colorize($this->getConfig()->getNested("Settings.Message-tpall")));
                    if($this->getConfig()->getNested("Settings.Tpall-no-sound")){
                        PluginUtils::PlaySound($player, $this->getConfig()->getNested("Settings.Tpall-sound"));
                    }
                break;

                case false:
                    PluginUtils::PlaySound($player, "mob.villager.no");
                break;
            }
        });
        $form->setTitle(TextFormat::colorize("&l&9TPALL"));
        $form->setContent(TextFormat::colorize($this->getConfig()->getNested("Settings.Form.content")));
        $form->setButton1(TextFormat::colorize($this->getConfig()->getNested("Settings.Form.confirm-button")));
        $form->setButton2(TextFormat::colorize($this->getConfig()->getNested("Settings.Form.decline-button")));
        $player->sendForm($form);
    }
}
