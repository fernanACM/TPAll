# TPALL
[![](https://poggit.pmmp.io/shield.state/TPALL-PM4)](https://poggit.pmmp.io/p/TPALL-PM4)

[![](https://poggit.pmmp.io/shield.api/TPALL-PM4)](https://poggit.pmmp.io/p/TPALL-PM4)

![icon-tpall](https://user-images.githubusercontent.com/83558341/167649960-389dd644-3e52-4aa0-9de2-093313640694.png)


The TPAll plugin is for teleporting
all players on the server to you! You can use the plugin completely at events, survival events and everything else. I will be happy if you write something in the comments that will help me for the better plugin. Thank you for your support and listen!

<a href="https://discord.gg/YyE9XFckqb"><img src="https://img.shields.io/discord/837701868649709568?label=discord&color=7289DA&logo=discord" alt="Discord" /></a>

### ✔ Implementations
* Sounds.
* Message customization.
* Command [/tpall]

### 💾 Config
```yaml
---
#   _____               _      _   _
#  |_   _|  _ __       / \    | | | |
#    | |   | '_ \     / _ \   | | | |
#    | |   | |_) |   / ___ \  | | | |
#    |_|   | .__/   /_/   \_\ |_| |_|
#          |_|
#    by matymare and fernanACM

# Plugin created by matymare, Updated by fernanACM
# TPAll - It is a PocketMine-MP plugin by which you can port all players to one place
# The plugin must not be modified without asking the plugin owner
# You can write to me on Discord: Roospy#1666

# Configure the text and sound of the plugin, through the 'config.yml'. Minecraft sounds page:
# https://www.digminecraft.com/lists/sound_list_pe.php

# DO NOT TOUCH!
config-version: "1.0.0"
# ======(SETTINGS)======
Settings:
  # Prefix for Tpall message
  Prefix: "§l§f[§eTPAll§f]§8»§r "
  # Tpal's message
  Message-tpall: "§aTeleporting...\n"
  # Use "true" or "false" to enable/disable sound when using Tpall
  Tpall-no-sound: true
  # Type of sound when using Tpall
  Tpall-sound: "portal.portal"

  Form:
    content: "&bAre you sure you want to teleport everyone to your position?"
    confirm-button: "&l&2YES"
    decline-button: "&l&cNO"
...
```

### 💬 Commands
/tpall - Teleport all players to you!

### 🚫 Permissions

- Executing the command: `tpall.command`

## 🔔 Credits:

The plugin icon is created via [flaticon](www.flaticon.com)
