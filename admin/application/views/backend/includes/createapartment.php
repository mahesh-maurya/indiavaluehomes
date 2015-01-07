<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Create Apartment
			</header>
			<div class="panel-body">
			    <form class="form-horizontal tasi-form" method="post" action="<?php $id=$this->input->get('id'); echo site_url('site/createapartmentsubmit?id='.$id);?>" enctype="multipart/form-data">
				    
					<div class="form-group">
						<label class="col-sm-2 control-label">Configuration</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="config" class="form-control" value="<?php echo set_value('config'); ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Area</label>
						<div class="col-sm-4">
						  <input type="text" id="" name="area" class="form-control" value="<?php echo set_value('area'); ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Price</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="price" value="<?php echo set_value('price'); ?>" required>
						</div>
					</div>	
					<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Floor Plan</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="floorplan">
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
    </div>
</div>