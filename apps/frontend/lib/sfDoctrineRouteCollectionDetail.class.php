<?php
/**
 * sfDcotrineRouteCollectionDetail represents
 * a master-detail table collection routes.
 *
 * @package    alumni
 * @subpackage routing
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class sfDoctrineRouteCollectionDetail extends sfObjectRouteCollection
{
  protected
    $routeClass = 'sfDoctrineRoute';
    
  // sfRouteCollection.class.php should have configure() method
  public function __construct(array $options)
  {
    $this->options = array_merge(array(
      'column_parent' => $options['column_parent'],
    ), $this->options);    

    $this->options['requirements'] = array_merge(array($this->options['column_parent'] => '\d+'), $options['requirements']);    

    parent::__construct($options);
    /*
    $this->options['segment_names']['list'] = 'list';
    $this->options['segment_names']['index'] = 'index';
    $this->options['segment_names']['create'] = 'create';
    */
    if (!isset($this->options['column_parent']))
      throw new InvalidArgumentException(sprintf('You must pass a "column_parent" option to %s ("%s" route)', get_class($this), $this->options['name']));
  }
  
  protected function getRouteForIndex()
  {
    return new $this->routeClass(
      sprintf('%s.:sf_format', $this->options['prefix_path']),
      array_merge(array('module' => $this->options['module'], 'action' => $this->getActionMethod('index'), 'sf_format' => 'html'), $this->options['default_params']),
      array_merge($this->options['requirements'], array('sf_method' => 'get')),
      array('model' => $this->options['model'], 'type' => 'object', 'method' => $this->options['model_methods']['object'])
    );    
  }  
  
  protected function getRouteForList()
  {
    return new $this->routeClass(
      sprintf('%s/:%s/%s.:sf_format', $this->options['prefix_path'], 
		$this->options['column_parent'], 'list'),
      array_merge(array('module' => $this->options['module'], 
			'action' => $this->getActionMethod('list'), 'sf_format' => 'html'), 
		$this->options['default_params']),
      array_merge($this->options['requirements'], 
		array('sf_method' => 'get', $this->options['column_parent'] => '\d+')),
      array('model' => $this->options['model'], 'type' => 'object', 
		'method' => $this->options['model_methods']['object'])
    );
  }
  
  protected function getRouteForNew()
  {
    return new $this->routeClass(
      sprintf('%s/:%s/%s.:sf_format', $this->options['prefix_path'], 
		$this->options['column_parent'], $this->options['segment_names']['new']),
      array_merge(array('module' => $this->options['module'], 
			'action' => $this->getActionMethod('new'), 'sf_format' => 'html'), 
		$this->options['default_params']),
      array_merge($this->options['requirements'], 
		array('sf_method' => 'get', $this->options['column_parent'] => '\d+')),
      array('model' => $this->options['model'], 'type' => 'object', 
		'method' => $this->options['model_methods']['object'])
    );
  }  
  
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
  
  protected function getDefaultActions()
  {
    return array_merge(array('index'), parent::getDefaultActions());
  }  
  
  protected function getRoute($action)
  {
    return 'index' == $action ? $this->options['name'] : $this->options['name'].'_'.$action;
  }

  protected function getActionMethod($action)
  {
    return 'index' == $action ? 'index' : $action;
  }
}
