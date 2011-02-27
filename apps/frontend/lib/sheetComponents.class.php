<?php

/**
 * sheet components.
 *
 * @package    alumni
 * @subpackage sheet
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class sheetComponents extends sfComponents
{
	private $isGrouping = false;

	protected $buffer = '';
	
	protected function write()
	{
		echo $this->buffer;
		$this->buffer = '';
	}	
	
	protected function th($str)
	{
		$this->buffer .= "\t\t".'<th>'.__($str).'</th>'."\n";
		return $this;
	}			
	
	protected function td($str, $attr = null)
	{
		if (!empty($attr)) $attr = ' '.$attr;
		$this->buffer .= "\t\t".'<td'.$attr.'>'.__($str).'</td>'."\n";
		return $this;
	}		
		
	public function executeShow()
	{
		$this->isGrouping=method_exists($this, 'getGroupStr');	// prevent call to abstract
		$isRowTitle=method_exists($this, 'getTitle');		// prevent call to abstract
	    		
		echo '<div class="sheet">';
		$n = $this->rows->count();
		foreach($this->rows as$i => $row)
		{ 
			if ($i==0) $this->tableHead($row); 
			elseif ($this->isGrouping) $this->checkGrouping($row); 

			$title = ($isRowTitle) ? ' title="'.$this->getTitle($row).'"' : ''; 

?>			
    <tr class="<?php echo (($i % 2) ? 'even' : 'odd'); ?>"<?php echo $title; ?>>
      <td valign="top" width="2%"><?php echo $i+1; ?></td>
	    <?php $this->doRow($row); /* call abstract */ ?>	
	  </tr>
	<?php 
			if ($i==$n-1) $this->tableFoot(); 	
		} 		
		echo '</div>';
		
		return sfView::NONE;
	}
	
	// $row = first row in rows, reserved argument for inheritance
	protected function tableHead($row) 
	{ 
		if ($this->isGrouping) 
		{
			$this->groupStr = $this->getGroupStr($this->order_by, $row);
			echo '<i>'.$this->groupStr.'</i>';
		}
	?>  
<table>
  <thead>
    <tr>
      <th width="20">#</th>
      <?php $this->doTableHeader(); /* call abstract */ ?>
    </tr>
  </thead>
  <tbody>	
	<?php }	
	
	protected function tableFoot() { ?>
  </tbody>
	<?php if (method_exists($this, 'doTableFooter')) { ?>
	  <tfoot>
	  <tr>
		<td></td>
	    <?php $this->doTableFooter(); /* call abstract */ ?>
	  </tr>
	  </tfoot>
	<?php } ?>
</table>
<br/>	
	<?php }	

	private function checkGrouping($row) 
	{
	  if ($this->groupStr <> $this->getGroupStr($this->order_by, $row)) 
	  {
	    $this->tableFoot();
	    $this->tableHead($row);
	  }
	}
}
