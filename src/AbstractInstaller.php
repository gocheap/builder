<?php
namespace wapmorgan\Builder;

use Symfony\Component\Console\Logger\ConsoleLogger;
use Psr\Log\LogLevel;

abstract class AbstractInstaller {
    public static function download($url_template, $version, $file, ConsoleLogger $logger) {
        $url = sprintf($url_template, $version);
        $logger->log('Generated download url: '.$url, LogLevel::INFO);

    }

    public static function checkHash($hashurl_template, $version, $file, ConsoleLogger $logger)
}
