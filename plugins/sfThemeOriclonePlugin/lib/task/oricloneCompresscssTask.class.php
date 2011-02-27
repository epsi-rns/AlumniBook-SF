<?php

class oricloneCompresscssTask extends sfBaseTask
{
	private 
		$compact	= true,
		$cssfile	= 'style.css',
		$devpath	= 'dev/',
		$basepath	= 'plugins/sfThemeOriclonePlugin/web/css/';
		
	
	protected function configure()
	{
		$this->namespace        = 'oriclone';
		$this->name             = 'compress-css';
		$this->briefDescription = '';
		$this->detailedDescription = <<<EOF
The [oriclone:compress-css|INFO] task compress CSS in css/dev/*.css .
Call it with:

  [php symfony oriclone:compress-css|INFO]
EOF;
	}

	protected function execute($arguments = array(), $options = array())
	{
		// add your code here
		$this->path = $this->basepath.$this->devpath;
		$files = $this->getFileInDir();
		$this->getContent($files);
		$this->build();
		//echo $content;
	}
  
	// search *.css
    private function getFileInDir () 
    {
		$results = array();
		$handler = opendir($this->path);

		while ($file = readdir($handler))
			if (strrpos($file, '.css') !== false)
				$results[] = $file;

		closedir($handler);
		return $results;
    }
    
	/* css part */		
	function getContent($imports=array())
	{
		$content = '';
		foreach ($imports as $file) {			
			$cssfile = $this->path.$file;
			$cssadd = file_get_contents( $cssfile );
			
			if	(!$this->compact)
				$content .= "\n".'/* --- '.$file.'.css --- */'."\n\n";
				
			$content .= $cssadd;
		}		
		$this->content = $content;
	}

	function compress()	{
		// -- The Reinhold Weber method
		// remove comments 
		$pattern = '!/\*[^*]*\*+([^/][^*]*\*+)*/!';
		$this->content = preg_replace($pattern, '', $this->content);
    	
    	// remove tabs, spaces, newlines, etc. 
    	$search = array("\r\n", "\r", "\n", "\t", '  ', '    ', '    ');
    	$this->content = str_replace($search, '', $this->content); 
	}	
	
	function build() 
	{
		// fix path
		$pattern = 'url(../../images/';
		$replacement = 'url(../images/';		
		$this->content = str_replace($pattern, $replacement, $this->content);
		$pattern = 'url(../../fonts/';
		$replacement = 'url(../fonts/';
		$this->content = str_replace($pattern, $replacement, $this->content);

		if	($this->compact) 
			$this->compress();
			
		$file = $this->basepath.$this->cssfile;	
		if ( is_writeable($file) ) 
		{
			$f = fopen($file, 'w');
			fwrite($f, $this->content);
			fclose($f);
			echo 'CSS Updated.'."\n";
		}	else echo 'Failed to open file for writing.'."\n";
	}	
}
