<section class="panel">
    <header class="panel-heading">
        Wishlist
    </header>
    <div class="col-md-11">
	<div class=" pull-right col-md-1 createbtn" ><a  target="_blank" class="btn btn-primary" href="<?php echo site_url('site/exportwishlistofbuilder'); ?>"><i class="icon-plus"></i>Export To CSV </a></div>
	</div>
    <table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
        <thead>
            <tr>
                <!--<th>Id</th>-->
                <th>Property</th>
                <th>Builder</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Timestamp</th>
<!--                <th>Actions</th>-->

            </tr>
        </thead>
        <tbody>
            <?php foreach($table as $row) { ?>
            <tr>
                <!--<td><?php echo $row->id; ?></td>-->
                <td><?php echo $row->propertyname; ?></td>
                <td><?php echo $row->buildername; ?></td>
                <td><?php echo $row->pname; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->phone; ?></td>
                <td><?php echo $row->timestamp; ?></td>
<!--                <td><a class="btn btn-danger btn-xs" href="<?php echo site_url('site/deletewishlist?id=').$row->id; ?>"><i class="icon-trash "></i></a></td>-->

            </tr>
            <?php } ?>
        </tbody>
    </table>
</section>
