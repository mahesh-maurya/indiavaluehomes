	    <section class="panel">
		    <header class="panel-heading">
				 Apartment Details
			</header>
			<div class="panel-body">
			    <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url("site/editapartmentsubmit?id2=$before->property");?>" enctype= "multipart/form-data">
					<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				
				     <div class="form-group">
						<label class="col-sm-2 control-label">Configuration</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="config" value="<?php echo set_value('config',$before->config);?>">
						</div>
					</div>
					 <div class="form-group">
						<label class="col-sm-2 control-label">Area</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="area" value="<?php echo set_value('area',$before->area);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Price</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="price" class="form-control" value="<?php echo set_value('price',$before->price); ?>">
						</div>
					</div>
					<div class=" form-group">
                      <label class="col-sm-2 control-label" for="normal-field">Floor Plan</label>
                      <div class="col-sm-4">
                        <input type="file" id="normal-field" class="form-control" name="floorplan" value="<?php echo set_value('floorplan',$before->floorplan);?>">
                        <?php if($before->floorplan == "")
						 { }
						 else
						 { ?>
							<img src="<?php echo base_url('uploads')."/".$before->floorplan; ?>" width="140px" height="140px">
						<?php }
					?>
                      </div>
                    </div>	
					
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
							<button type="submit" class="btn btn-info">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</section>
    