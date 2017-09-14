<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('orders/create'); ?>

    <label for="name">Name</label>
    <input type="input" name="name" /><br />

    <label for="address">Address</label>
    <input type="input" name="address" /><br />

    <label for="phone">Phone</label>
    <input type="input" name="phone" /><br />

    <label for="text">Text</label>
    <textarea name="text"></textarea><br />

    <input type="submit" name="submit" value="Submit" />

</form>
