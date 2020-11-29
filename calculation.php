<?php

	$values = $_POST;

	$result = array('servers' => 0, 'averageLoad' => 0, 'extraServer' => 0, 'freeServer' => 0);
	if ($values['server'] == '' || $values['server'] < 1)
	{
		echo json_encode($result);
		exit();
	}

	$averageLoad = ($values['oneLoad'] + $values['twoLoad'] + $values['threeLoad'] + $values['fourLoad'] + $values['fiveLoad']) / (count($values) - 1);

	$result['averageLoad'] = $averageLoad;
	if ($averageLoad < 50)
	{
		$result['servers'] = $values['server'] / 2;
		$result['freeServer'] = $values['server'] - $result['servers'];
	}
	elseif ($averageLoad >= 50)
	{
		$result['servers'] = $values['server'];
		$result['extraServer'] = ((2 * $values['server']) + 1) - $values['server'];
	}

	echo json_encode($result);
?>