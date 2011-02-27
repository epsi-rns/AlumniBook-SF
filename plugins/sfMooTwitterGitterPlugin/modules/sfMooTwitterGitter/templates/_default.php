<?php
	$params = $sf_data->getRaw('params');
	
	$script		= '';
	$content	= '';
	if (isset($params['usernames']))
	{
		$usernames=explode(',', $params['usernames']);	
		
		$names = array();
		foreach ($usernames as $username) $names[] = "'".$username."'";

		$script = "\t".'var tweet_usernames = ['.implode($names,', ').'];'."\n";
		$content	= '<div id="tweets-here"></div>'."\n";
	}
	else
	if (isset($params['username']))
	{
		$username=$params['username'];	
		$script = "\t".'var tweet_username = '."'".$username."'".';'."\n";
		$content	= '<div id="tweet-one"></div>'."\n";
	}
	else	
	if (isset($params['random']))
	{
		$usernames=explode(',', $params['random']);	
		
		$rand_keys = array_rand($usernames, 1);
		$username =$usernames[$rand_keys];

		$script = "\t".'var tweet_username = '."'".$username."'".';'."\n";
		$content	= '<div id="tweet-one"></div>'."\n";
	}	
	
	else	
	if (isset($params['randoms']))
	{
		$usernames=explode(',', $params['randoms']);		
		$rand_keys = array_rand($usernames, 5);
		
		$names = array();
		foreach ($rand_keys as $key) $names[] = "'".$usernames[$key]."'";		

		$script = "\t".'var tweet_usernames = ['.implode($names,', ').'];'."\n";
		$content	= '<div id="tweets-here"></div>'."\n";
	}		
	
	if ($script)
	{
		$script = '
	<script type="text/javascript">
	'.$script.'
	</script>
	';
	
		echo "\n".$script."\n";
	}
	
	if ($content)
		echo "\n".$content;
