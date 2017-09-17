<div class="container">
	<div class="row">

		<div class="col-sm-4">
			<img class="img-responsive" src="/assets/images/jar.jpg" alt="jar">
		</div>
		<div class="col-sm-4 col-min-h bg-info">
			<h4>Our services</h4>
			<p class="center-block">
			Jars are a handy way to store and preserve food, but sometimes, they are hard to open. If you find yourself struggling with a difficult jar, order our service and we will help you.
			</p>
			<p class="center-block">
			Don't waste your time. Submit your order below.
			</p>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-10">

			 <h4 class="text-left">Submit your order</h4>
			<?php echo form_open('orders/create', ['class' => 'form-horizontal', 'role' => 'form']); ?>

				<div class="form-group">
					<label for="name" class="col-md-4 control-label">Name</label>
					<div class="col-md-6">
						<input type="input" class="form-control" name="name" value="<?php echo set_value('name'); ?>" /><br/>
						<?php echo form_error('name'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="name" class="col-md-4 control-label">Address</label>
					<div class="col-md-6">
						<input type="input" class="form-control" name="address" value="<?php echo set_value('address'); ?>" /><br/>
						<?php echo form_error('address'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="name" class="col-md-4 control-label">Phone</label>
					<div class="col-md-6">
						<input type="input" class="form-control" name="phone" value="<?php echo set_value('phone'); ?>" /><br/>
						<?php echo form_error('phone'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="amount" class="col-md-4 control-label">Amount</label>
					<div class="col-md-6">
						<input type="number" class="form-control" name="amount" value="<?php echo set_value('amount'); ?>" /><br/>
						<?php echo form_error('amount'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="name" class="col-md-4 control-label">Notes</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="notes" value="<?php echo set_value('notes'); ?>" /><br/>
					</div>
				</div>

				<div class="col-md-offset-4 col-md-10">
					<input type="submit" class="btn btn-success" name="submit" value="Submit" />
				</div>

			</form>

	</div>
</div>
</div>
