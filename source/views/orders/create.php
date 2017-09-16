<div class="container">
	<div class="col-lg-10">
		<fieldset>
			<legend>Submit your order</legend>
			<?php echo form_open('orders/create', ['class' => 'form-horizontal', 'role' => 'form']); ?>

				<div class="form-group">
					<label for="name" class="col-lg-3 control-label">Name</label>
					<div class="col-lg-6">
						<input type="input" class="form-control" name="name" value="<?php echo set_value('name'); ?>" /><br/>
						<?php echo form_error('name'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="name" class="col-lg-3 control-label">Address</label>
					<div class="col-lg-6">
						<input type="input" class="form-control" name="address" value="<?php echo set_value('address'); ?>" /><br/>
						<?php echo form_error('address'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="name" class="col-lg-3 control-label">Phone</label>
					<div class="col-lg-6">
						<input type="input" class="form-control" name="phone" value="<?php echo set_value('phone'); ?>" /><br/>
						<?php echo form_error('phone'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="amount" class="col-lg-3 control-label">Amount</label>
					<div class="col-lg-6">
						<input type="input" class="form-control" name="amount" value="<?php echo set_value('amount'); ?>" /><br/>
						<?php echo form_error('amount'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="name" class="col-lg-3 control-label">Notes</label>
					<div class="col-lg-6">
						<input type="text" class="form-control" name="notes" value="<?php echo set_value('notes'); ?>" /><br/>
					</div>
				</div>

				<div class="col-lg-offset-3 col-lg-10">
					<input type="submit" class="btn btn-success" name="submit" value="Submit" />
				</div>
		
			</form>
		</fieldset>
	</div>
</div>
	