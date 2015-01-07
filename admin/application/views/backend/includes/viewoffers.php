
<section class="panel">
    <header class="panel-heading">
        Contact Offers
    </header>
	<div class="col-md-11">
	<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/exportregistereduser'); ?>"><i class="icon-plus"></i>Export To CSV </a></div>
	</div>
    <table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
        <thead>
            <tr>
                <!--<th>Id</th>-->
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>City</th>
                <th>Timestamp</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($table as $row) { ?>
            <tr>
                <!--<td><?php echo $row->id; ?></td>-->
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->contact; ?></td>
                <td><?php echo $row->city; ?></td>
                <td><?php echo $row->timestamp; ?></td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
</section>
