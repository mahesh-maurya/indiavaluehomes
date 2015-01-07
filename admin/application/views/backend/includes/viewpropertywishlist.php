
		<section class="panel">
			<header class="panel-heading">
                Wishlist Details <span class="pull-right">Property :<?php echo $before['property']->name; ?></span>
            </header>
			<table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                   
					<th>Timestamp</th>
					
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id; ?></td>-->
						<td><?php echo $row->name; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->phone; ?></td>
						<td><?php echo $row->timestamp; ?></td>
						
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
	