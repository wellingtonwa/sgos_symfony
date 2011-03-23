<?php

class frontendConfiguration extends sfApplicationConfiguration
{

  protected $backendRouting = null;

  public function generateFrontendUrl($name, $parameters = array())
  {
      $link = "http://sgospen.localhost/backend_dev.php";
      if (!in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1')))
      {
        $link = 'http://sgos.wellingtonwa.com/backend.php';
      }
        return $link.$this->getBackendRouting()->generate($name, $parameters);
  }

  public function getBackendRouting()
  {
    if (!$this->backendRouting)
    {
      $this->backendRouting = new sfPatternRouting(new sfEventDispatcher());

      $config = new sfRoutingConfigHandler();
      $routes = $config->evaluate(array(sfConfig::get('sf_apps_dir').'/backend/config/routing.yml'));

      $this->backendRouting->setRoutes($routes);
    }

    return $this->backendRouting;
  }


  public function configure()
  {
  }
}
