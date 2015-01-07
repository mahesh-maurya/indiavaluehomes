<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Footerlink Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/createfooterlinksubmit');?>" >
					<div class="form-group">
						<label class="col-sm-2 control-label">Title</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="title" value="<?php echo set_value('title');?>">
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">URL</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="url" value="<?php echo set_value('url');?>">
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">Order</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="order" value="<?php echo set_value('order');?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Position</label>
						<div class="col-sm-4">
						   <?php 
								 echo form_dropdown('position',$position,set_value('position'),'class="chzn-select form-control" data-placeholder="Choose a category..."');
							?>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Type</label>
						<div class="col-sm-4">
						   <?php 
								 echo form_dropdown('type',$type,set_value('type'),'class="chzn-select form-control" data-placeholder="Choose a category..."');
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
    </div>
</div>