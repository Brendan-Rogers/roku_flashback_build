<?php
	
	function getAll($tbl) {
		include('connect.php');
		$queryAll = "SELECT * FROM {$tbl}";
		$runAll = $pdo->query($queryAll);
		if($runAll){
			return $runAll;
		}else{
			$error = "There was a problem accessing this information.  Sorry about your luck ;)";
			return $error;
		}
	}

	function getSingle($tbl, $col, $id) {
		include('connect.php');
		$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
		$runSingle = $pdo->query($querySingle);
		if($runSingle){
			return $runSingle;
		}else{
			$error = "There was a problem accessing this information.  Sorry about your luck ;)";
			return $error;
		}
	}

	function filterResults($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter) {
		include('connect.php');

		$filterQuery = "SELECT * FROM {$tbl}, {$tbl2}, {$tbl3} WHERE {$tbl}.{$col} = {$tbl3}.{$col} AND {$tbl2}.{$col2} = {$tbl3}.{$col2} AND {$tbl2}.{$col3}='{$filter}'";
		//echo $filterQuery;
		$runQuery = $pdo->query($filterQuery);
		if($runQuery){
			return $runQuery;
		}else{
			$error = "There was a problem accessing this information.  Sorry about your luck ;)";
			return $error;
		}
	}
?>