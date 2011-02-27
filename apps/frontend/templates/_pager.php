<?php
	if (!isset($routeName))
	{
		$module = $sf_request->getParameter('module');
		$action = $sf_request->getParameter('action');		
		$routeName = $module.'/'.$action;
	}
	
	$p_first	= __('First page');
	$p_last		= __('Last page');
	$p_prev		= __('Previous page');
	$p_next		= __('Next page');
?>

<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for($routeName) 
		?>?page=1">
      <img src="/images/silk/resultset_first.png" alt="<?php 
		echo $p_first; ?>" title="<?php echo $p_first; ?>" />
    </a>
 
    <a href="<?php echo url_for($routeName) 
		?>?page=<?php echo $pager->getPreviousPage() ?>">
      <img src="/images/silk/resultset_previous.png" alt="<?php 
		echo $p_prev; ?>" title="<?php echo $p_prev; ?>" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for($routeName) 
			?>?page=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for($routeName) 
		?>?page=<?php echo $pager->getNextPage() ?>">
      <img src="/images/silk/resultset_next.png" alt="<?php 
		echo $p_next; ?>" title="<?php echo $p_next; ?>" />
    </a>
 
    <a href="<?php echo url_for($routeName) 
		?>?page=<?php echo $pager->getLastPage() ?>">
      <img src="/images/silk/resultset_last.png" alt="<?php 
		echo $p_last; ?>" title="<?php echo $p_last; ?>" />
    </a>
  </div>
<?php endif; ?>

 
<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> records
 
  <?php if ($pager->haveToPaginate()): ?>
    - page <strong><?php 
		echo $pager->getPage() ?>/<?php 
		echo $pager->getLastPage() 
	?></strong>
  <?php endif; ?>
</div>

<br/>
