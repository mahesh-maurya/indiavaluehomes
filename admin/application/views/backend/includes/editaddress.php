
	    <section class="panel">
		    <header class="panel-heading">
				 User Details
			</header>
			<div class="panel-body">
			    <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editaddresssubmit');?>">
					<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				
				     <div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <?php echo $before->name;?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Address</label>
						<div class="col-sm-4">
						  <textarea name="address" class="form-control"><?php echo set_value('city',$before->address); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"> City</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="city" class="form-control" value="<?php echo set_value('city',$before->city); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"> State</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="state" class="form-control" value="<?php echo set_value('state',$before->state); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"> Country</label>
						<div class="col-sm-4">
						   <?php 	 echo form_dropdown('country',$country,set_value('country',$before->country),'id="select1" class="chzn-select form-control" 	data-placeholder="Choose a country..."');
						?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"> Pincode</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="pincode" class="form-control" value="<?php echo set_value('pincode',$before->pincode); ?>">
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
   