<?php
//Cambiar con tu db
define('DB_NAME', 'triviamec');
/** MySQL database username */
define('DB_USER', 'root');
/** MySQL database password */
define('DB_PASSWORD', '');
/** MySQL hostname */
define('DB_HOST', '127.0.0.1');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'UTF8');
//Universal dir
if (!defined('FatherDir')){
	define('FatherDir', dirname(__FILE__).'/');
}
//Otras definiciones importantes
define('MODULES', realpath(FatherDir .'modules'));
define('CONNECTION', realpath(FatherDir .'connection'));
define('THEMES', realpath(FatherDir .'themes'));
