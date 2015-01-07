
	    <section class="panel">
		    <header class="panel-heading">
				 User Details
			</header>
			<div class="panel-body">
			    <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editusersubmit');?>">
					<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				
				     <div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
						</div>
					</div>
					 <div class="form-group">
						<label class="col-sm-2 control-label">Dob</label>
						<div class="col-sm-4">
						  <input type="date" id="normal-field" class="form-control" name="dob" value="<?php echo set_value('dob',$before->dob);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-4">
						  <input type="email" id="" name="email" class="form-control" value="<?php echo set_value('email',$before->email); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Password</label>
						<div class="col-sm-4">
						  <input type="password" id="normal-field" class="form-control" name="password" value="">
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">Confirm Password</label>
						<div class="col-sm-4">
						  <input type="password" id="normal-field" class="form-control" name="confirmpassword" value="">
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">Contact No</label>
						<div class="col-sm-4">
						  <input type="number" id="" name="contactno" class="form-control" value="<?php echo set_value('contactno',$before->contactno); ?>">
						</div>
					</div>		
					<div class="form-group">
					  <label class="col-sm-2 control-label">Select Accesslevel</label>
					  <div class="col-sm-4">
						<?php  	 echo form_dropdown('accesslevel',$accesslevel,set_value('accesslevel',$before->accesslevel),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					<div class="form-group">
					  <label class="col-sm-2 control-label">Status</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('status',$status,set_value('status',$before->status),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
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
    