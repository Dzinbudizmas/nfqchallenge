<div class="container" >
	<div class="row">
		<div class="col-md-8 col-md-offset-2 well">
		<?php
		$attr = array("class"=>"form_horizontal", "role"=>"form", "id"=>"form1", "name"=>"form1");
		echo form_open('orders/index', $attr); ?>
			<div class="form-group">
				<div class="col-md-6">
					<input 	class="form-control" 
							name="search_term" 
							placeholder="Search for Customer Name..." 
							type="text" 
							value="<?php echo $this->session->userdata('search_term'); ?>" />
				</div>
				<div class="col-md-6">
					<input class="btn btn-danger" type="submit" value="Search" />
				</div>
			</div>
		<?php echo form_close(); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2 bg-border">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Order No</th>
						<th>Name</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($orders as $order_item): ?>
					<tr>
						<td><?php echo $order_item['id']; ?></td>
						<td><?php echo $order_item['name']; ?></td>
						<td><?php echo $order_item['address']; ?></td>
						<td><?php echo $order_item['phone']; ?></td>
						<td><?php echo $order_item['amount']; ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<?php echo $pagination_links; ?>
		</div>
	</div>
</div>
