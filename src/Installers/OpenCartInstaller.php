<?php
namespace wapmorgan\Builder\Installers;

use wapmorgan\Builder\AbstractInstaller;

use Symfony\Component\Console\Logger\ConsoleLogger;
use Psr\Log\LogLevel;

use \Exception;

class OpenCartInstaller extends AbstractInstaller {
    static public function createConfiguration(array $data, $directory, ConsoleLogger $logger) {
        if (!file_exists($directory.DIRECTORY_SEPARATOR.'config-dist.php'))
            throw new Exception('Inconsistency in opencart directory "'.$directory.'". File config-dist.php does not exist!');
        if (!copy($directory.DIRECTORY_SEPARATOR.'config-dist.php', $directory.DIRECTORY_SEPARATOR.'config.php'))
            throw new Exception('Could not copy sample configuration to original configuration in directory "'.$directory.'"!');

        if (!file_exists($directory.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'config-dist.php'))
            throw new Exception('Inconsistency in opencart directory "'.$directory.'". File admin/config-dist.php does not exist!');
        if (!copy($directory.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'config-dist.php', $directory.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'config.php'))
            throw new Exception('Could not copy sample admin configuration to original configuration in directory "'.$directory.'"!');
    }
}
