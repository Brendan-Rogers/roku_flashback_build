<?php

	function single_edit($tbl, $col, $id) {
		$result = getSingle($tbl, $col, $id);?>
<form action="scripts/edit.php" method="post">
	<input hidden name="tbl" value="<?php echo $tbl;?>">
	<input hidden name="col" value="<?php echo $col;?>">
	<input hidden name="id" value="<?php echo $id;?>">
	<?php while($row = $result->fetch(PDO::FETCH_ASSOC)):
		for($i=0; $i<$result->columnCount(); $i++):
				$dataType = $result->getColumnMeta($i);
				$fieldName = $dataType['name'];
				$fieldType = $dataType['pdo_type'];
				$column_value = $row[$fieldName];
				if($fieldName != $col):?>
				<label>
					<?php echo $fieldName;?>
				</label><br>
				<?php if($fieldType !== 252):?>
				<input type="text" name="<?php echo $fieldName;?>" value="<?php echo $column_value;?>" /><br><br>
				<?php else:?>
				<textarea name="<?php echo $fieldName;?>"><?php echo $column_value;?></textarea>
		<?php endif;
			endif;
		endfor;
	endwhile;?>
	<button type="submit">Save Content</button>
</form>
<?php }?>