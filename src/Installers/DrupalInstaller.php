<?php
namespace wapmorgan\Builder\Installers;

use wapmorgan\Builder\AbstractInstaller;

use Symfony\Component\Console\Logger\ConsoleLogger;
use Psr\Log\LogLevel;

use \Exception;

class DrupalInstaller extends AbstractInstaller {
    static public function createConfiguration(array $data, $directory, ConsoleLogger $logger) {
        if (!file_exists($directory.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR.'default.settings.php'))
            throw new Exception('Inconsistency in drupal directory "'.$directory.'". File sites/default/default.settings.php does not exist!');
        if (!copy($directory.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR.'default.settings.php', $directory.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR.'settings.php'))
            throw new Exception('Could not copy sample configuration to original configuration in directory "'.$directory.'"!');

        if (!chmod($directory.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR.'default.settings.php', 0666))
            throw new Exception('Could not change permissions of configuration file in directory "'.$directory.'"!');
        $logger->log(LogLevel::INFO, 'Configuration saved');
    }

    static public function createFilesDir(array $data, $directory, ConsoleLogger $logger) {
        if (is_dir($directory.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR.'files') && !fileperms($directory.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR.'files') !== 0755) {
            if (!chmod($directory.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR.'files', 0755))
                throw new Exception('Could not change permissions of files directory in directory "'.$directory.'"!');
            $logger->log(LogLevel::INFO, 'Files dir exist and is writable');
        } else {
            if (!mkdir($directory.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR.'files', 0755))
                throw new Exception('Could not create new files dir with all permissions in directory "'.$directory.'"!');
            $logger->log(LogLevel::INFO, 'Files dir created');
        }
    }
}
