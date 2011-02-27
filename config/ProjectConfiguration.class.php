<?php

require_once '/usr/share/php/symfony/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineNestedSetPlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('sfThemeOriclonePlugin');
    $this->enablePlugins('sfMootoolsPlugin');
    $this->enablePlugins('sfMooDatePickerPlugin');
    $this->enablePlugins('sfMooNoobSlidePlugin'); 
    $this->enablePlugins('sfMooTwitterGitterPlugin');
    $this->enablePlugins('sfMooSideBarMenuPlugin');
    $this->enablePlugins('sfMooDiaBoxPlugin');
    $this->enablePlugins('sfFormInputLookupModalPlugin');
  }
}
