
	    <section class="panel">
		    <header class="panel-heading">
				 Builder Details
			</header>
			<div class="panel-body">
				 <form class="form-horizontal row-fluid" method="post" enctype="multipart/form-data" action="<?php echo site_url('site/uploadbuilderimagesubmit?id=').$before['builder']->id;?>">
					
					  <div class="form-group">
							<label class="col-sm-2 control-label">Image Upload</label>
							<div class="col-sm-4">
							 <input type="file" class="spa1n6 fileinput" id="search-input" name="image" class="imagename" >
							</div>
						</div>
					  
					  <div class="span3"> <button class="btn btn-primary imagesubmit">Submit</button></div>
				 </form>
			
				  <table id="datatable_example" class="table table-striped table-hover" id="sample_1" style="width:100%;margin-bottom:0; ">
					<thead>
					  <tr>
						  <th class="to_hide_phone  no_sort">Name</th>
						 
						 <th class="ms no_sort "> Actions </th>
					  </tr>
					</thead>
					<tbody class="tablebody">
					<tr>
					 <?php foreach($table as $row) {  ?>
						<td style="display:none;" class="rowid"><?php echo $row->id;?></td>          
						<td ><img src="<?php echo base_url("uploads");?><?php echo "/".$row->builderimage;?>" style="height:100px;width:100px;" /></td>
						<td class="ms"><div class="btn-group"><a href="<?php echo site_url('site/deleteimage1?imageid='.$row->id.' && id='.$before['builder']->id );?>" class="button red deleteimage btn btn-danger btn-xs" rel="tooltip" ><i class="icon-trash"></i></a> </div></td>
						</tr>
					   <?php } ?>
						</tbody>
				</table>
			</div>
		</section>
    