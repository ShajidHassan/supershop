<table class="table table-bordered">
		<tr>
			<th>Serial No</th>
			<th>Id Product sell</th>
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Date</th>
			<th>Time</th>
			
		</tr>
	<?php
	 $i = 1;
	while($row = mysqli_fetch_array($query_result)) {
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['id_product_sell']; ?></td>
			<td><?php echo $row['product_name']; ?></td>
			<td><?php echo $row['quantity']; ?></td>
			<td><?php echo $row['price']; ?></td>
			<td><?php echo $row['date']; ?></td>
		
			
		</tr>
		<?php
		$i++;
	}
	?>
	</table>