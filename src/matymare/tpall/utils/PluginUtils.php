<?php

/*
 * Plugin created by matymare
 * TPAll - It is a PocketMine-MP plugin by which you can port all players to one place
 * The plugin must not be modified without asking the plugin owner
 * You can write to me on Discord: Roospy#1666
 */

# Credits - fernanACM

declare(strict_types=1);

namespace matymare\tpall\utils;

use pocketmine\player\Player;

use pocketmine\network\mcpe\protocol\PlaySoundPacket;
class PluginUtils{

    /**
     * @param Player $player
     * @param string $sound
     * @param integer $volume
     * @param integer $pitch
     * @return void
     */
    public static function PlaySound(Player $player, string $sound, $volume = 1, $pitch = 1) {
        $playerPosition = $player->getPosition();
        $packet = PlaySoundPacket::create(
            $sound,
            $playerPosition->getX(),
            $playerPosition->getY(),
            $playerPosition->getZ(),
            $volume,
            $pitch
        );
        $player->getNetworkSession()->sendDataPacket($packet);
    }
}
