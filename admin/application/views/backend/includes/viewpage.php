<section class="panel">
    <header class="panel-heading">
        Page Details
    </header>
<!--
    <div class="col-md-11">
	<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php// echo site_url('site/exportwishlist'); ?>"><i class="icon-plus"></i>Export To CSV </a></div>
	</div>
-->
   <div class=" row" style="padding:1% 0;">
	<div class="col-md-11">
	<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/createpage'); ?>"><i class="icon-plus"></i>Create </a></div>
	</div>
	
</div>
    <table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Text</th>
                <th>Timestamp</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($table as $row) { ?>
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->title; ?></td>
                <td><?php echo $row->content; ?></td>
                <td><?php echo $row->timestamp; ?></td>
                <td>
                                     <a class="btn btn-primary btn-xs" href="<?php echo site_url('site/editpage?id=').$row->id;?>"><i class="icon-pencil"></i></a>
                                      <a class="btn btn-danger btn-xs" href="<?php echo site_url('site/deletepage?id=').$row->id; ?>"><i class="icon-trash "></i></a>
									 
				</td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
</section>
