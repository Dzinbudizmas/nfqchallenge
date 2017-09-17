<div class="container" >
	<div class="row">
		<div class="col-md-8 col-md-offset-2 well">
			<div class="form-group">
				<input type="text" name="searchFor" placeholder="Search for Customer Name..." class="form-control" id="searchKey" onchange="sendRequest();"/>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2 bg-border">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th data-action="sort" data-title="id" data-direction="ASC">
							<span>Order No</span>
							<i class="glyphicon glyphicon-triangle-bottom"/>
						</th>
						<th data-action="sort" data-title="name" data-direction="ASC">
							<span>Name</span>
							<i class="glyphicon glyphicon-triangle-bottom"/>
						</th>
						<th data-action="sort" data-title="address" data-direction="ASC">
							<span>Address</span>
							<i class="glyphicon glyphicon-triangle-bottom"/>
						</th>
						<th data-action="sort" data-title="phone" data-direction="ASC">
							<span>Phone</span>
							<i class="glyphicon glyphicon-triangle-bottom"/>
						</th>
						<th data-action="sort" data-title="amount" data-direction="ASC">
							<span>Amount</span>
							<i class="glyphicon glyphicon-triangle-bottom"/>
						</th>
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


<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>

<script type="text/javascript">
	var sendRequest = function(){
		var searchKey = $('#searchKey').val();
		window.location.href = '<?=base_url('index.php/orders/index')?>?query='+searchKey+'&orderField='+curOrderField+'&orderDirection='+curOrderDirection;
	};
	
	var getNamedParameter = function (key) {
        if (key == undefined) return false;
        var url = window.location.href;
        //console.log(url);
        var path_arr = url.split('?');
        if (path_arr.length === 1) {
            return null;
        }
        path_arr = path_arr[1].split('&');
        path_arr = remove_value(path_arr, "");
        var value = undefined;
        for (var i = 0; i < path_arr.length; i++) {
            var keyValue = path_arr[i].split('=');
            if (keyValue[0] == key) {
                value = keyValue[1];
                break;
            }
        }
        return value;
    };
	
    var remove_value = function (value, remove) {
        if (value.indexOf(remove) > -1) {
            value.splice(value.indexOf(remove), 1);
            remove_value(value, remove);
        }
        return value;
    };
	
    var curOrderField, curOrderDirection;
    $('[data-action="sort"]').on('click', function(e){
      	curOrderField = $(this).data('title');
       	curOrderDirection = $(this).data('direction');
       	sendRequest();
    });
	
    $('#searchKey').val(decodeURIComponent(getNamedParameter('query')||""));
    var curOrderField = getNamedParameter('orderField')||"";
    var curOrderDirection = getNamedParameter('orderDirection')||"";
    var currentSort = $('[data-action="sort"][data-title="'+getNamedParameter('orderField')+'"]');
    if(curOrderDirection=="ASC"){
      	currentSort.attr('data-direction', "DESC").find('i.glyphicon').removeClass('glyphicon-triangle-bottom').addClass('glyphicon-triangle-top');	
    }else{
       	currentSort.attr('data-direction', "ASC").find('i.glyphicon').removeClass('glyphicon-triangle-top').addClass('glyphicon-triangle-bottom');	
    }
	
</script>