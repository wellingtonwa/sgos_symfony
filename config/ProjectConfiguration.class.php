<?php

require_once dirname(__FILE__).'/../lib/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->setWebDir($this->getRootDir().'/public_htm/sgos');
    //$this->setCacheDir($this->getRootDir().'/cache');
    //$this->setLogDir($this->getRootDir().'/tmp/symfony_logs');
    //$this->setWebDir($this->setRootDir($rootDir)."/public_html");
  }
}