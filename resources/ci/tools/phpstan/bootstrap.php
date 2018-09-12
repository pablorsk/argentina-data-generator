<?php
/**
 * Copyright (C) 1997-2018 Reyesoft <info@reyesoft.com>.
 *
 * This file is part of JsonApiPlayground. JsonApiPlayground can not be copied and/or
 * distributed without the express permission of Reyesoft
 */

declare(strict_types=1);

$helper_meta_file = './resources/_ide_helper_meta.php';
if(!file_exists($helper_meta_file)) {
    exec('composer ide-helper');
}
require $helper_meta_file;

define('LARAVEL_START', microtime(true));
