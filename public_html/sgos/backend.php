<?php


require_once(dirname(__FILE__).'/../../sgos/config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('backend', 'prod', false);
sfContext::createInstance($configuration)->dispatch();
