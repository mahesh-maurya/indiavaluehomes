<div class=" row" style="padding:1% 0;">
	<div class="col-md-12">
	<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/createproperty'); ?>"><i class="icon-plus"></i>Create </a></div>
	</div>
	<div class="col-md-12">
	<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/exportproperty'); ?>"><i class="icon-plus"></i>Export To CSV </a></div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Property Details
            </header>
			<table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					
					<th>Name</th>
					<th>Area</th>
					<th>Price</th>
					<th>Property Type</th>
					<th>Builder</th>
					<th>Starting Price</th>
					<th>Order</th>
					<th>Brochure</th>
					<th> Actions </th>
					<th class="hidden">Id</th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						
						<td><a href="<?php echo site_url('site/uploadpropertyimage?id=').$row->id; ?>"><?php echo $row->name; ?></a></td>
						<td><?php echo $row->area; ?></td>
						<td><?php echo $row->price; ?></td>
						<td><?php echo $row->propertytype; ?></td>
						<td><?php echo $row->builder; ?></td>
						<td><?php echo $row->pricestartingfrom; ?></td>
						<td><?php echo $row->order; ?></td>
						<td><a class="btn btn-primary" href="<?php echo base_url('uploads')."/".$row->brochure; ?>" target="_blank">Download</a></td>
						<td> <a class="btn btn-primary btn-xs" href="<?php echo site_url('site/editproperty?id=').$row->id;?>"><i class="icon-pencil"></i></a>
                                      <a class="btn btn-danger btn-xs " href="<?php echo site_url('site/deleteproperty?id=').$row->id; ?>"><i class="icon-trash "></i></a>
									 
					  </td>
					  <td class="hidden"><span class="propertyid"><?php echo $row->id; ?></span></td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
	</div>
</div>