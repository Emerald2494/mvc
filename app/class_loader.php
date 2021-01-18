<?php

require_once 'config/config.php';
require_once 'helpers/url_helpers.php';
require_once 'helpers/message_helpers.php';
require_once 'helpers/userValidator.php';
// require_once 'libraries/Core.php';

// require_once 'libraries/Controller.php';
// require_once 'libraries/Database.php';
// require_once 'models/UserModel.php';

spl_autoload_register(function($class) {
    require_once 'libraries/'. $class . '.php';
});

