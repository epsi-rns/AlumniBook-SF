<?php

/**
 * Organization form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class OrganizationForm extends BaseOrganizationForm
{
  public function configure()
 {
    // create a new widget to represent this category's "parent"
    /*
    $this->widgetSchema['parent'] =     
	new sfWidgetFormDoctrineChoiceNestedSet(array(
      'model'     => 'Organization',
      'add_empty' => true,
    ));
    */
    $this->widgetSchema['parent'] = new sfWidgetFormInputLookupModal(
		array(	'model' => 'Organization', 
				'link_text' => 'Pick Parent ', 
				'link_route' => 'modal/org'),
		array(	'class' => 'icon_pick', 
				'title' => 'Lookup Parent Name')
	);
	//$this->validatorSchema['parent'] = new sfValidatorPass() 

    // if the current category has a parent, make it the default choice
    $node = $this->getObject()->getNode();
    if ($node->hasParent())
    {
		$parent_index = $node->getParent()->get('org_id');		
		$this->setDefault('parent', $parent_index);
    }

    // only allow the user to change the name of the category, and its parent
    $this->useFields(array(
      'name', 'parent', 'product', 'note' 
    ));
    // set labels of fields
    $this->widgetSchema->setLabels(array(
      'name'   => 'Organization',
      'parent' => 'Parent organization',
    ));
    // set a validator for parent which prevents a category being moved to one of its own descendants
    $this->setValidator('parent', new sfValidatorDoctrineChoiceNestedSet(array(
      'required' => false,
      'model'    => 'Organization',
      'node'     => $this->getObject(),
    )));
    $this->getValidator('parent')->setMessage('node', 
		'A category cannot be made a descendent of itself.');

	
	//---------------------
    $this->getWidgetSchema()->moveField('note', sfWidgetFormSchema::LAST);

  }
  
  /**
   * Updates and saves the current object. Overrides the parent method
   * by treating the record as a node in the nested set and updating
   * the tree accordingly.
   *
   * @param Doctrine_Connection $con An optional connection parameter
   */
  public function doSave($con = null)
  {
    // save the record itself
    parent::doSave($con);
    // if a parent has been specified, add/move this node to be the child of that node
    if ($root_id = $this->getValue('parent'))
    {
		$parent = Doctrine::getTable('Organization')
			->findOneBy('org_id', $root_id);
      
		$node = $this->getObject()->getNode();
		if ($this->isNew())
			$node->insertAsLastChildOf($parent);
		else
			$node->moveAsLastChildOf($parent);
	}
    // if no parent was selected, add/move this node to be a new root in the tree
    else
    {
		$categoryTree = Doctrine::getTable('Organization')->getTree();
      
		if ($this->isNew())
			$categoryTree->createRoot($this->getObject());
		else
		{
			$root_id = $this->getObject()->get('root_id');
			$this->getObject()->getNode()->makeRoot($root_id);
		}
    }
  }

}
