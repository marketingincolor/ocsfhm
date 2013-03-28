<h1>Products</h1>

<p>You may edit the Memorial Products section of your website below.</p>

<div class='mainInfo'>

	<table>
		<tr>
			<th>Item Id</th>
			<th>Item Name</th>
			<th>Item Description</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	<?php $i=1; ?>
	<?php foreach ($prodarray as $product):?>
		<tr <?php echo $i & 1 ? "bgcolor='#FFF'" : "bgcolor='#CCC'"; ?> >
			<td><?php echo $product->item_id;?></td>
			<td><?php echo $product->item_name;?></td>
			<td><?php echo $product->item_desc;?></td>
			<td><a href="product_edit/<?php echo $product->id; ?>">edit</a></td>
			<td><a href="product_delete/<?php echo $product->id; ?>">delete</a></td>
		</tr>
		<?php $i++; ?>
	<?php endforeach;?>

	</table>
	<p>
		<a href="<?php echo site_url('admin/product_add');?>"><img src="<?php echo base_url();?>images/icons/add.png" class="icon">Add a Product</a> or 
		<a href="<?php echo site_url('admin/');?>"><img src="<?php echo base_url();?>images/icons/return.png" class="icon">Return</a>
	</p>
	
</div>
