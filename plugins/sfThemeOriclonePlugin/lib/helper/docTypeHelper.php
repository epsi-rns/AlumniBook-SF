<?php

/**
 * oriclone helper.
 *
 * @package    oriclone
 * @subpackage helper
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */

function doc_type($doctype)
{
	// http://www.w3.org/QA/2002/04/Web-Quality
	switch($doctype) {
	case 'HTML 2.0':
		$str = '<!DOCTYPE html PUBLIC "-//IETF//DTD HTML 2.0//EN">';
		break;
	case 'HTML 3.2':
		$str = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">';
		break;
	case 'HTML 4.01 Strict':
		$str = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
		"http://www.w3.org/TR/html4/strict.dtd">';
		break;
	case 'HTML 4.01 Transitional':
		$str = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
		"http://www.w3.org/TR/html4/loose.dtd">';
		break;
	case 'HTML 4.01 Frameset':
		$str = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"
		"http://www.w3.org/TR/html4/frameset.dtd">';
		break;
	case 'XHTML 1.0 Strict':
		$str = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
		break;
	case 'XHTML 1.0 Transitional':
		$str = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		break;	
	case 'XHTML 1.0 Frameset':
		$str = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">';
		break;
	case 'XHTML 1.1':
		$str = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
		"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">';
		break;
	}
	return $str."\n";
}

function xml_version($lang)
{
	$xml ='<?xml version="1.0" encoding="utf-8"?'.'>';
	
	return '<html xmlns="http://www.w3.org/1999/xhtml" '
		.'xml:lang="'.$lang.'" lang="'.$lang.'" dir="ltr">'."\n";
}

