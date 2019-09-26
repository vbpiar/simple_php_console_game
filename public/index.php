<?php

require_once "../vendor/autoload.php";

/*
 * init page
 *
 * after startup script goes to mode selector to chose what action need to be done
 * it require that we send  argv arguments when init this file from command line
 *
 * */

 new \kernel\ModeSelector($argc,$argv);


