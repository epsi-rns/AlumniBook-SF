<?php 
	include_once('ItemBaseHelper.php');

class item_org extends item_base {

	// need a simple name ref...!!
	public function showAlumnaMapInOrg (&$map, &$k)
	{
		$text = $map->getAlumni()->getFullname();
		$link = 'alumni/detail?aid='.$map->getAid();
		echo link_to($text, $link);
	}
	
	public function showParent (&$one, &$k)	
	{
		$node = $one->getNode();
		if ($node->hasParent())
		{
			// performance warning: getParent() will run above sql again
			$org = $node->getParent();	
			
			$text = '<strong>'.$org->getFullname().'</strong>';
			$link = 'org/detail?org_id='.$org->getOrgId();
			$ref = "\t\t".link_to($text, $link)."\n";
			$this->showRowValue ($ref, $k, __('Parent')); 
		}
	}
	
	public function showBranch (&$one, &$k)	
	{
		$node = $one->getNode();
		$branches = $node->getChildren();
		if ($node->hasChildren())
			foreach ($branches as $org)
			{
				$text = '<strong>'.$org->getFullname().'</strong>';
				$link = 'org/detail?org_id='.$org->getOrgId();
				$ref = "\t\t".link_to($text, $link)."\n";
				$this->showRowValue ($ref, $k, __('Branch')); 
			}
	}

	public function showProduct (&$one, &$k)	
		{ $this->showChkRowValue ($one->getProduct(), $k, __('Product')); }

	// deprecated after rewrite to symfony
	public function showOtherOrg (&$orgs, &$k, $text) {
	  if (!empty($orgs)) { foreach ($orgs as $org) { 
	      $this->showRowValue ("<strong>".$this->ref->org($org)."</strong>", $k, $text); 
	  }} 
	}

} // end of class

?>
