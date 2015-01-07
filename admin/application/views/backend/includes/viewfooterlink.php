<section class="panel">
    <header class="panel-heading">
        Footerlink Details
    </header>
<!--
    <div class="col-md-11">
	<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php// echo site_url('site/exportwishlist'); ?>"><i class="icon-plus"></i>Export To CSV </a></div>
	</div>
-->
   <div class=" row" style="padding:1% 0;">
	<div class="col-md-11">
	<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/createfooterlink'); ?>"><i class="icon-plus"></i>Create </a></div>
	</div>
	
</div>
    <table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
        <thead>
            <tr>
                <!--<th>Id</th>-->
                <th>Title</th>
                <th>URL</th>
                <th>Order</th>
                <th>Position</th>
                <th>Type</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($table as $row) { ?>
            <tr>
                <!--<td><?php echo $row->id; ?></td>-->
                <td><?php echo $row->title; ?></td>
                <td><?php echo $row->url; ?></td>
                <td><?php echo $row->order; ?></td>
                <td>
                   <?php 
                        if($row->position=='1')
                            echo "Left"; 
                        elseif($row->position=='2')
                            echo "Center";
                        elseif($row->position=='3')
                            echo "Right";
                        elseif($row->position=='4')
                            echo "Bottom";
                    ?>
                    </td>
                <td>
                <?php 
                        if($row->type=='0')
                            echo "Internal";
                        elseif($row->type=='1')
                            echo "External";
                    ?>
                </td>
                <td>
                                     <a class="btn btn-primary btn-xs" href="<?php echo site_url('site/editfooterlink?id=').$row->id;?>"><i class="icon-pencil"></i></a>
                                      <a class="btn btn-danger btn-xs" href="<?php echo site_url('site/deletefooterlink?id=').$row->id; ?>"><i class="icon-trash "></i></a>
									 
				</td>
<!--                <td><a class="btn btn-danger btn-xs" href="<?php echo site_url('site/deletewishlist?id=').$row->id; ?>"><i class="icon-trash "></i></a></td>-->

            </tr>
            <?php } ?>
        </tbody>
    </table>
</section>
