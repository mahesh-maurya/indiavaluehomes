	    <section class="panel">
		    <header class="panel-heading">
				 property Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editpropertysubmit');?>" enctype= "multipart/form-data">
					<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="text" id="normal-field" class="row-fluid" name="id" value="<?php echo $before['property']->id;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before['property']->name);?>">
						</div>
					</div>		
					<div class="form-group">
						<label class="col-sm-2 control-label">Latitude</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="lat" value="<?php echo set_value('lat',$before['property']->lat);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Longitude</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="long" value="<?php echo set_value('long',$before['property']->long);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-4">
						  <textarea name="description" class="form-control"><?php echo set_value('description',$before['property']->description); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="price" value="<?php echo set_value('price',$before['property']->price);?>">
						</div>
					</div>
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Area</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('area',$area,set_value('area',$before['property']->area),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Property Type</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('propertytype',$propertytype,set_value('propertytype',$before['property']->propertytype),'id="select1" class="form-control "');
								 
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Builder</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('builder',$builder,set_value('builder',$before['property']->builder),'id="select2" class="form-control "');
								 
							?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Price Starting From</label>
						<div class="col-sm-4">
						   <input type="text" id="normal-field" class="form-control" name="pricestartingfrom" value="<?php echo set_value('pricestartingfrom',$before['property']->pricestartingfrom);?>">
						</div>
					</div>
					
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Status</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('status',$status,set_value('status',$before['property']->status),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Order</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('order',$order,set_value('order',$before['property']->order),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					
                    <div class=" form-group">
                    
<!--
                      <label class="col-sm-2 control-label" for="normal-field">Brochure</label>
                      <div class="col-sm-4">
                        <input type="file" id="normal-field" class="form-control" name="brochure" value="<?php echo set_value('brochure');?>">
                      </div>
                      <label class="col-sm-2 control-label" for="normal-field">(Upload Only .doc, .pdf Or .docx)</label>
                    </div>
-->
                
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image',$before['property']->image);?>">
					<?php if($before['property']->image == "")
						 { }
						 else
						 { ?>
							<img src="<?php echo base_url('uploads')."/".$before['property']->image; ?>" width="140px" height="140px">
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
    