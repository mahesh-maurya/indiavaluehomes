	    <section class="panel">
		    <header class="panel-heading">
				 Property Info Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editpropertyinfosubmit');?>" enctype= "multipart/form-data">
					<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="text" id="normal-field" class="row-fluid" name="id" value="<?php echo $before['property']->id;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						 <?php echo $before['property']->name;?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Property Address</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="propertyaddress" value="<?php echo set_value('propertyaddress',$before['propertyinfo']->propertyaddress);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"> Walkthrough</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="propertywalkthrough" value="<?php echo set_value('propertywalkthrough',$before['propertyinfo']->propertywalkthrough);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"> Panaroma</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="propertypanaroma" value="<?php echo set_value('propertypanaroma',$before['propertyinfo']->propertypanaroma);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Special Offers</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="propertyspecialoffers" value="<?php echo set_value('propertyspecialoffers',$before['propertyinfo']->propertyspecialoffers);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Property Area</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="propertyarea" value="<?php echo set_value('propertyarea',$before['propertyinfo']->propertyarea);?>">
						</div>
					</div>
							
					<div class="form-group">
						<label class="col-sm-2 control-label">Property Area</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="propertyarea" value="<?php echo set_value('propertyarea',$before['propertyinfo']->propertyarea);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Property Age</label>
						<div class="col-sm-4">
						  <input type="number" id="normal-field" class="form-control" name="propertyage" value="<?php echo set_value('propertyage',$before['propertyinfo']->propertyage);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Near By</label>
						<div class="col-sm-4">
						  <textarea name="nearby" class="form-control"><?php echo set_value('nearby',$before['propertyinfo']->nearby); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Bedroom</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="bedroom" value="<?php echo set_value('bedroom',$before['propertyinfo']->bedroom);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Bathroom</label>
						<div class="col-sm-4">
						  <input type="number" id="normal-field" class="form-control" name="bathroom" value="<?php echo set_value('bathroom',$before['propertyinfo']->bathroom);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Kitchen</label>
						<div class="col-sm-4">
						  <input type="number" id="normal-field" class="form-control" name="kitchen" value="<?php echo set_value('kitchen',$before['propertyinfo']->kitchen);?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Floor</label>
						<div class="col-sm-4">
						  <input type="number" id="normal-field" class="form-control" name="floor" value="<?php echo set_value('floor',$before['propertyinfo']->floor);?>">
						</div>
					</div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Possession</label>
                        <div class="col-sm-4">
                            <input type="text" id="normal-field" class="form-control" name="possession" value="<?php echo set_value('possession',$before['propertyinfo']->possession);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Buildings</label>
                        <div class="col-sm-4">
                            <input type="text" id="normal-field" class="form-control" name="buildings" value="<?php echo set_value('buildings',$before['propertyinfo']->buildings);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Bank Loan</label>
                        <div class="col-sm-4">
                            <input type="text" id="normal-field" class="form-control" name="bankloan" value="<?php echo set_value('bankloan',$before['propertyinfo']->bankloan);?>">
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
    