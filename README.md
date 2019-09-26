
# SIMPLE PHP GAME

# Instal 

- require:{ 
php version >= 7.0,
composer
}
- Guide:
1. Just clone this repository to your local server.
2. Open in "/simple_console_php_game"  direction terminal.
3. Run "composer instal"

# Info

Project structure : 

- /simple_console_php_game 
	- /kernel (logic folder)
	-	/ModeSelector.php (Class to recognize argv and select what mode to run)
	-	/Player.php (Class to set player as object ,and return what move to do)
	-	/PlayerPool.php (Class init Player object and select what Player need to be return )
	-	/PlayStart.php (Class init PlayerPool and cary game)
	-	/Statistic.php (Class to save winners names and ad 1 point to winner)
-	/public (public folder)
	-	/index.php (start point to user)
-	/storage (storage folder)
	-	/static.txt (File to save statistics)
-	/composer.json


# Run
1. Open in direction "/simple_console_php_game/public" terminal.
2. Run "php idex.php" to get instruction to run script with mode you need
2.1 To play run "php idex.php -play random_players User Computer"
