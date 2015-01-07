
		<section class="panel">
			<header class="panel-heading">
                Wishlist Details <span class="pull-right">User :<?php echo $before->name; ?></span>
            </header>
			<table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Name</th>
					<th>Property</th>
					<th>Timestamp</th>
					
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id; ?></td>-->
						<td><?php echo $row->name; ?></td>
						<td><?php echo $row->property; ?></td>
						<td><?php echo $row->timestamp; ?></td>
						
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
	