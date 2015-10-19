<?php
namespace wapmorgan\Builder\Installers;

use wapmorgan\Builder\AbstractInstaller;

use Symfony\Component\Console\Logger\ConsoleLogger;
use Psr\Log\LogLevel;

use \Exception;

class GalleryInstaller extends AbstractInstaller {
    static public function createVarDir(array $data, $directory, ConsoleLogger $logger) {
        if (is_dir($directory.DIRECTORY_SEPARATOR.'var') && !fileperms($directory.DIRECTORY_SEPARATOR.'var') !== 0777) {
            if (!chmod($directory.DIRECTORY_SEPARATOR.'var', 0777))
                throw new Exception('Could not change permissions of var directory in directory "'.$directory.'"!');
            $logger->log(LogLevel::INFO, 'Var dir exist and is writable');
        } else {
            if (!mkdir($directory.DIRECTORY_SEPARATOR.'var', 0777))
                throw new Exception('Could not create new var dir with all permissions in directory "'.$directory.'"!');
            $logger->log(LogLevel::INFO, 'Var dir created');
        }
    }
}
