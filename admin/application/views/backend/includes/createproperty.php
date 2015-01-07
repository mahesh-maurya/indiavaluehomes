<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Property Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/createpropertysubmit');?>"  enctype= "multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Latitude</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="lat" value="<?php echo set_value('lat');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Longitude</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="long" value="<?php echo set_value('long');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-4">
						  <textarea name="description" class="form-control"><?php echo set_value('description'); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="price" value="<?php echo set_value('price');?>">
						</div>
					</div>
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Area</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('area',$area,set_value('area'),'class="chzn-select form-control" 	data-placeholder="Choose a area..."');
						?>
					  </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Property Type</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('propertytype',$propertytype,set_value('propertytype'),'id="select1" class="form-control "');
								 
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Builder</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('builder',$builder,set_value('builder'),'id="select2" class="form-control "');
								 
							?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Price Starting From</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="pricestartingfrom" value="<?php echo set_value('pricestartingfrom');?>">
						</div>
					</div>
					
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Status</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('status',$status,set_value('status'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Order</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('order',$order,set_value('order'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control"  name="image" value="<?php echo set_value('image');?>">
				  </div>
				</div>
				
            
<!--
                    <div class=" form-group">
                    
                      <label class="col-sm-2 control-label" for="normal-field">Brochure</label>
                      <div class="col-sm-4">
                        <input type="file" id="normal-field" class="form-control" name="brochure" value="<?php echo set_value('brochure');?>">
                      </div>
                      <label class="col-sm-2 control-label" for="normal-field">(Upload Only .doc, .pdf Or .docx)</label>
                    </div>
-->
                
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
							<button type="submit" class="btn btn-info">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</section>
    </div>
</div>