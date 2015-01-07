
	    <section class="panel">
		    <header class="panel-heading">
				 Builder Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editbuildersubmit');?>" >
					<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="hidden" id="normal-field" class="row-fluid hidden" name="id" value="<?php echo $before['builder']->id;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before['builder']->name);?>">
						</div>
					</div>		
					<div class="form-group">
						<label class="col-sm-2 control-label">description</label>
						<div class="col-sm-4">
						  <textarea name="description" class="form-control"><?php echo set_value('description',$before['builder']->description);?></textarea>
						</div>
					</div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Contact</label>
                        <div class="col-sm-4">
                            <input type="text" id="normal-field" class="form-control" name="contact" value="<?php echo set_value('contact',$before['builder']->contact);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Website</label>
                        <div class="col-sm-4">
                            <input type="text" id="normal-field" class="form-control" name="website" value="<?php echo set_value('website',$before['builder']->website);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-4">
                            <input type="text" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email',$before['builder']->email);?>">
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