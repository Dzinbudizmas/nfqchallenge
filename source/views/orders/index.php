<h2><?php echo $title; ?></h2>

<?php foreach ($orders as $order_item): ?>

        <h3><?php echo $order_item['id']; ?></h3>
        <div class="main">
                <?php echo $order_item['name']; ?>
				<?php echo $order_item['address']; ?>
				<?php echo $order_item['phone']; ?>
				<?php echo $order_item['text']; ?>
        </div>

<?php endforeach; ?>
