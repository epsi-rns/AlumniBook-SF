<?php 

class item_base {
	
	/** @var section table class name */
	public $css = 'sectiontableentry';

	/** @var http request */
	public $mode	= null; 
	public $showEmpty	= FALSE; 

	public function showRowValue ($onevalue, &$k, $name, $title=null) { ?>
	    <tr class="<?php echo $this->css.($k+1); ?>"
		<?php echo $title ? 'title="'.$title.'">' : '>'; ?>
	      <td nowrap vAlign="top"><?php echo $name; ?></td>
	      <td><?php echo empty($onevalue) ? "-" :  $onevalue;?></td>
	    </tr>
	  <?php $k = 1 - $k; 
	}

	protected function showChkRowValue ($onevalue, &$k, $name, $title=null) { 
	  if (!empty($onevalue) || $this->showEmpty) $this->showRowValue($onevalue, $k, $name, $title); 
	}

	public function showContact (&$contacts, &$k) {
		if ($contacts->count()) { 
			foreach ($contacts as $contact) {
				$this->showRowValue($contact->getContact(), $k, $contact->getContactType()); 
		}} 
	}

	private function showContactItem (&$contacts, &$k, $ctid, $contactname) {
	  if (!empty($contacts)) { foreach ($contacts as $contact) { 
	    if ($contact->CTID==$ctid) { $items[] = $contact->CONTACT; } 
	  }}
	  $text = empty($items) ? "" : implode(', ', $items);
	  $this->showChkRowValue ($text, $k, $contactname); 
	}

	public function showAddress (&$rows, &$k, $text) {
		if ($rows->count()) { 
			foreach ($rows as $address) 
			{ 
				$value = $address->getAddress()."<br/>".$address->getRegion();
				$this->showRowValue($value, $k, $text);
			}
		} elseif ($this->showEmpty) 
			$this->showRowValue('-', $k, $text); 
	}

	public function ci_showAddress (&$rows, &$k, $text) {
	  if (!empty($rows)) { foreach ($rows as $address) { 
		$value = $address->ADDRESS."<br/>".$address->REGION;
		$this->showRowValue($value, $k, $text);
	  }} elseif ($this->showEmpty) $this->showRowValue('-', $k, $text); 
	}

	public function showMapDetail (&$map, &$k) 
	{
		$this->showChkRowValue ($this->refOccupation($map), $k, __('Occupation'));
		$this->showChkRowValue ($this->refJobPosition($map), $k, __('Job Position')); 
		
		$jobPos = $map->getJobPosition();
		$dept = $map->getDepartment();
		if (!empty($jobPos) && !empty($dept)) $k = 1 - $k;
		$this->showChkRowValue ($dept, $k, __('Department'));
	}
	
	public function refOccupation (&$map) 
	{ 
		$text = $map->getJobType();
		$link = 'amap/filter?id='.$map->getJobTypeId();
		return link_to($text, $link);
	}

	public function refJobPosition (&$map) 
	{
		$items = array();
		if ( $map->getFungsional()  ) $items[] = $map->getFungsional();
		if ( $map->getStruktural()  ) $items[] = $map->getStruktural();
		if ( $map->getDescription() ) $items[] = $map->getDescription(); 
		$desc = empty($items) ? "" : ": ".implode(', ', $items); 
	  
		$text = $map->getJobPosition();
		$link = 'omap/filter?id='.$map->getJobPositionId();
		return "\t\t".link_to($text, $link).$desc."\n";
	}

	/* Index by community and field */

	public function showCommunity (&$communities, &$k) 
	{
		$same_community = __('Browse alumni with same community');
		if (!empty($communities)) { 
			foreach ($communities as $community) {		
				$ref = "\t\t".link_to($community->getRefText(), $community->getRefLink())."\n";
				$this->showRowValue($ref, $k, __('Community'), $same_community); 
		}} 
	}

	public function showField (&$rows, &$k) 
	{
		$same_field = __('Browse organization with same business field');
		foreach ($rows as $field) 
		{ 
			$decription = $field->getDescription();
			$desc = empty($decription) ? "" : " (".$decription.")";
			$text = $field->getBizField();
			$link = 'ofields/filter?id='.$field->get('biz_field_id');
			$ref = "\t\t".link_to($text, $link).$desc."\n";
			$this->showRowValue($ref, $k, __('Business Field'), $same_field);
		}
	}
} // end of class

?>
