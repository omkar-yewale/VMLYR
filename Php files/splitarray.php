
<?php

// Returns split array.
// If not possible,
// then return -1.
function Split($arr, $count)
{
	// Left sum of whole array
	$leftSum = 0;
	for ( $i = 0 ; $i < $count ; $i++)
		$leftSum += $arr[$i];

	// right sum and also
	// check left_sum equal to
	// right sum or not
	$rightSum = 0;
	for ($i = $count - 1; $i >= 0; $i--)
	{
		// add current element
		// to right_sum
		$rightSum += $arr[$i];

		// exclude current element
		// to the left_sum
		$leftSum -= $arr[$i] ;

		if ($rightSum == $leftSum)
			return $i ;
	}

	// if it is not possible to split array into two parts.
	return -1;
}


function splitArray( $arr, $count)
{
	$split = Split($arr, $count);
		
	if ($split == -1 or $split == $count )
	{
		echo "Cant Split" ;
		return;
	}
	for ( $i = 0; $i < $count; $i++)
	{

		echo $arr[$i] , " " ;
	}
}


$arr = array(1,0,0,1,1,0);
$count = count($arr);
splitArray($arr, $count);

?>
