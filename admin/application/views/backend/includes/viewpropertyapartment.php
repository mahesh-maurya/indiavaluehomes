		<section class="panel">
			<header class="panel-heading">
                <!--Wishlist Details <span class="pull-right">Property :<?php// echo $before['property']->name; ?></span>-->
            </header>
            <div class=" pull-right col-md-2 createbtn" ><a class="btn btn-primary" href="<?php $id=$this->input->get("id"); echo site_url("site/createapartment?id=".$id); ?>"><i class="icon-plus"></i>Create </a></div>
            
			<table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Configuration</th>
                    <th>Area</th>
                    <th>Price</th>
                    <th>Order</th>
                    <th>Operations</th>
					
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
					<td><?php echo $row->config; ?></td>
						<td><?php echo $row->area; ?></td>
                        <td><?php echo $row->price; ?></td>
                        <td><?php echo $row->order; ?></td>
						<td> <a class="btn btn-primary btn-xs" href="<?php echo site_url('site/editapartment?id=').$row->id;?>"><i class="icon-pencil"></i></a>
						<a class="btn btn-danger btn-xs" href="<?php echo site_url("site/deleteapartment?id=$id&id2=").$row->id;?>"><i class="icon-trash "></i></a>
                            
									 
					  </td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
	