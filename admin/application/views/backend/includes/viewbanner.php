<section class="panel">
    <header class="panel-heading">
        Banner Details
    </header>
<!--
    <div class="col-md-11">
	<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php// echo site_url('site/exportwishlist'); ?>"><i class="icon-plus"></i>Export To CSV </a></div>
	</div>
-->
   <div class=" row" style="padding:1% 0;">
	<div class="col-md-11">
	<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/createbanner'); ?>"><i class="icon-plus"></i>Create </a></div>
	</div>
	
</div>
    <table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
        <thead>
            <tr>
                <!--<th>Id</th>-->
                <th>Name</th>
                <th>Banner</th>
                <th>Order</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($table as $row) { ?>
            <tr>
                <!--<td><?php echo $row->id; ?></td>-->
                <td><?php echo $row->name; ?></td>
				<td><img src="<?php echo base_url('uploads')."/".$row->url; ?>" width="50px" height="auto"></td>
                <td><?php echo $row->order; ?></td>
                <td>
                                     <a class="btn btn-primary btn-xs" href="<?php echo site_url('site/editbanner?id=').$row->id;?>"><i class="icon-pencil"></i></a>
                                      <a class="btn btn-danger btn-xs" href="<?php echo site_url('site/deletebanner?id=').$row->id; ?>"><i class="icon-trash "></i></a>
									 
				</td>
<!--                <td><a class="btn btn-danger btn-xs" href="<?php echo site_url('site/deletewishlist?id=').$row->id; ?>"><i class="icon-trash "></i></a></td>-->

            </tr>
            <?php } ?>
        </tbody>
    </table>
</section>
