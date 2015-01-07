<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/editproperty?id=').$propertyid; ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Brochure
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/addbrochuresubmit');?>" enctype= "multipart/form-data">
			  
				<div class="form-group" style="display:none;">
				  <label class="col-sm-2 control-label" for="normal-field">property</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="property" value="<?php echo set_value('property',$propertyid);?>">
					
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Brochure</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control"  name="brochure" value="<?php echo set_value('brochure');?>">
					<?php
echo $before['property']->brochure;
                        ?>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/editproperty?id=').$propertyid; ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
	</div>
</div>

