<?php

class myLibrary
{
function Custom_gencode()
{
    
   $code= "code = 33333";
    return $code;
}

function gettimediff($value)
{
	/***************
	 echo strtotime ("+1 day"), "\n";
	echo strtotime ("+1 week"), "\n";
	echo strtotime ("+1 week 2 days 4 hours 2 seconds"), "\n";
	echo strtotime ("next Thursday"), "\n";
	echo strtotime ("last Monday"), "\n";

	*************/
	$retval=strtotime ("$value");
	return $retval;

}

function array_multi_search( $p_needle, $p_haystack )
{
	if( !is_array( $p_haystack ) )
	{
		return false;
	}

	if( in_array( $p_needle, $p_haystack ) )
	{
		return true;
	}

	foreach( $p_haystack as $row )
	{
		if( $this->array_multi_search( $p_needle, $row ) )
		{
			return true;
		}
	}

	return false;
}

function moneyformat2($mm)
{

	$val=number_format($mm,"2",".",",");

	return $val;


}

function randomPassword($length)
{
	//   $possible ='0123456789' . 'ABCDEFGHKLMNPRSTUVWXYZ'.'abcdefghijklmnopqrstuvwxyz';
	$possible ='123456789'. 'ABCDEFGHKLMNPRSTUVWXYZ';
	$str ="";
	while (strlen($str) < $length)
	{
		$str .= substr($possible, mt_rand(0, strlen($possible) -1), 1);
	}
	
	
	return  $str;

} 



}