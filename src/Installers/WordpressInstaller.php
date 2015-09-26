<?php
namespace wapmorgan\Builder\Installers;

use wapmorgan\Builder\AbstractInstaller;

use Symfony\Component\Console\Logger\ConsoleLogger;
use Psr\Log\LogLevel;

use \Exception;

class WordpressInstaller extends AbstractInstaller {
    static public function createConfiguration(array $data, $directory, ConsoleLogger $logger) {
        if (isset($data['database'])) {
            if (!file_exists($directory.DIRECTORY_SEPARATOR.'wp-config-sample.php'))
                throw new Exception('Inconsistency in wordpress directory "'.$directory.'". File wp-config-sample.php does not exist!');
            if (!copy($directory.DIRECTORY_SEPARATOR.'wp-config-sample.php', $directory.DIRECTORY_SEPARATOR.'wp-config.php'))
                throw new Exception('Could not copy sample configuration to original configuration in directory "'.$directory.'"!');

        } else {
            $logger->log(LogLevel::NOTICE, 'Skipping step due to missing database configuration');
            return true;
        }
    }
}
