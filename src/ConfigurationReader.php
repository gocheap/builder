<?php
namespace wapmorgan\Builder;

use Symfony\Component\Config\FileLocator;
use Yosymfony\ConfigLoader\Config;
use Yosymfony\ConfigLoader\Loaders\JsonLoader;
use Yosymfony\ConfigLoader\Loaders\TomlLoader;
use Yosymfony\ConfigLoader\Loaders\YamlLoader;

class ConfigurationReader {
    protected $config;
    protected $repository;

    public function __construct($file) {
        // Set up the paths
        $locator = new FileLocator(array());

        // Set up the config loader
        $config = new Config(array(
            new TomlLoader($locator),
            new YamlLoader($locator),
            new JsonLoader($locator),
        ));
        $this->repository = $config->load($file);
    }

    public function getRepository() {
        return $this->repository;
    }
}
