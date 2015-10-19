<?php
namespace wapmorgan\Builder\Installers;

use wapmorgan\Builder\AbstractInstaller;

use Symfony\Component\Console\Logger\ConsoleLogger;
use Psr\Log\LogLevel;

use \Exception;

class CoppermineInstaller extends AbstractInstaller {
    static public function setPermissions(array $data, $directory, ConsoleLogger $logger) {
        if (!chmod($directory.DIRECTORY_SEPARATOR.'albums', 0777))
            throw new Exception('Could not change permissions of albums directory in directory "'.$directory.'"!');
        if (!chmod($directory.DIRECTORY_SEPARATOR.'include', 0777))
            throw new Exception('Could not change permissions of include directory in directory "'.$directory.'"!');
        $logger->log(LogLevel::INFO, 'Albums and include dirs exist and are writable');
    }
}
