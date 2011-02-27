<?php
/**
 * sfDcotrineRouteCollectionMaster represents
 * a master-detail table collection routes.
 *
 * @package    alumni
 * @subpackage routing
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class sfDoctrineRouteCollectionMaster extends sfObjectRouteCollection
{
  protected
    $routeClass = 'sfDoctrineRoute';
    
  // give a chance of index to have a filter form send by post  
  protected function getRouteForCreate()
  {
    return new $this->routeClass(
      sprintf('%s/%s.:sf_format', $this->options['prefix_path'], 'create'),
      array_merge(array('module' => $this->options['module'], 
			'action' => $this->getActionMethod('create'), 'sf_format' => 'html'), 
		$this->options['default_params']),
      array_merge($this->options['requirements'], array('sf_method' => 'post')),
      array('model' => $this->options['model'], 'type' => 'object')
    );
  }
}
