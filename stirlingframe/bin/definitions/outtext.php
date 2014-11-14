<?php
use stirlingframe\libs\Utilities\Utils;
use stirlingframe\libs\Enums\STATUS;

//OUTPUTS
define("SUCCESS_HEADER", Utils::colorize('[SUCCESSED]', STATUS::SUCCESS));

//ERRORS
define("ERROR_INVALID_PARAMS", Utils::colorize('[ERROR]', STATUS::FAILURE)." Invalid parameters.");
