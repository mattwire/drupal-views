<?php

/**
 * @file
 * Definition of Drupal\views\Plugins\Type\DisplayPluginManager.
 */

namespace Drupal\views\Plugins\Type;

use Drupal\Component\Plugin\PluginManagerBase;
use Drupal\Component\Plugin\Factory\DefaultFactory;
use Drupal\views\Plugins\Discovery\ViewsDiscovery;

class DisplayPluginManager extends PluginManagerBase {
  public function __construct() {
    $this->discovery = new ViewsDiscovery('views', 'display');
    $this->factory = new DefaultFactory($this->discovery);
  }
}
