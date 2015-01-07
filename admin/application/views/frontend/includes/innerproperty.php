<div class="content">
  <div class="container">
    <div class="row city-btn">
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-3">
            <div class="cityblock red">
              <h4>Mumbai</h4>
            </div>
          </div>
          <div class="col-md-3">
            <div class="cityblock blue">
              <h4>Pune</h4>
            </div>
          </div>
          <div class="col-md-3">
            <div class="cityblock green">
              <h4>Banglore</h4>
            </div>
          </div>
          <div class="col-md-3">
            <div class="cityblock purple">
              <h4>Hyderabad</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="citysel">
          <select >
            <option>Select your city</option>
          </select>
        </div>
      </div>
    </div>
	
</div>
<div class="property-slider">
	<img src="<?php echo base_url('frontassets/img/slide.jpg'); ?>">
</div>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="container-fluid data-container property-container whitebg">
				<div class="container-fluid property-header">
					<div class="col-md-4">
						<?php if($propertydetails['property']->image == "") { ?>
						<img src="<?php echo base_url('frontassets/img/carousel/img1.jpg'); ?>">
						<?php } 
						else { ?>
							<img src="<?php echo base_url('uploads')."/".$propertydetails['property']->image; ?>" style="max-height:75px;">
					<?php	} ?>
					</div>
					<div class="col-md-8 property-title">
						<p class="property-heading">
							<span class="redcolor">READY POSSESSION </span><br>
							<span>2 & 3 BED RECIDENCES STARTING </span><br>
							<span class="bluecolor">RS <?php echo $propertydetails['property']->price; ?></span>
						</p>
					</div>
				</div>
				<div class="container-fluid property-header">
					<div class="col-md-4">
						<ul class="property-tabs">
							<li class="active"><span divclass="about"  class="">About</span></li>
							<li ><span  divclass="location">Location</span></li>
							<li><span divclass="specification">Specifications</span></li>
							<li><span divclass="gallery">Image Gallery</span></li>
							<li><span divclass="walkthrough">Walk Through</span></li>
							<li><span divclass="amenities">Lifestyle Amenities</span></li>
							<li><span divclass="plans">Plans</span></li>
							<li><span divclass="nearby">Nearby</span></li>
						</ul>
					</div>
					<div class="col-md-8 property-description">
						<div class="container-fluid about-container property-details">
							<h4 class="title">Overview</h4>
							<p>
								<?php if($propertydetails['property']->description != "") echo "\"".$propertydetails['property']->description."\""; ?>
							</p>
						</div>
						<div class="container-fluid location-container property-details" style="display:none;">
							<h4 class="title">Location</h4>
							<p>
								<b> State : </b><?php  echo $propertydetails['property']->state; ?>
							</p>
							<p>
								<b> City : </b><?php  echo $propertydetails['property']->city; ?>
							</p>
							<p>
								<b> Area : </b><?php  echo $propertydetails['property']->area; ?>
							</p>
						</div>
						<div class="container-fluid specification-container property-details" style="display:none;">
							<h4 class="title">Specification</h4>
							<p>
								<b> Property Area : </b><?php  echo $propertydetails['property']->propertyarea; ?>
							</p>
							<p>
								<b> Bedrooms : </b><?php  echo $propertydetails['property']->bedroom; ?>
							</p>
							<p>
								<b> Kitchen : </b><?php  echo $propertydetails['property']->kitchen; ?>
							</p>
							<p>
								<b> Bathroom : </b><?php  echo $propertydetails['property']->bathroom; ?>
							</p>
							<p>
								<b> Floor : </b><?php  echo $propertydetails['property']->floor; ?>
							</p>
						</div>
						<div class="container-fluid amenities-container property-details" style="display:none;">
							<h4 class="title">Amenities</h4>
							<p>
								<ul>
									<?php 
									foreach($propertydetails['propertyamenity'] as $row)
									{ ?>
										<li><?php echo $row->name; ?></li>
							<?php	}
									?>
								</ul>
							</p>
							
						</div>
						<div class="container-fluid nearby-container property-details" style="display:none;">
							<h4 class="title">Near By</h4>
							<p>
								<b> Near By : </b><?php  echo $propertydetails['property']->nearby; ?>
							</p>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="container-fluid  hidden">
				<img src="<?php echo base_url('frontassets/img/map.jpg'); ?>">
			</div>
			<div class="container-fluid">
				<div class="map-canvas" id="map_canvas" style="width:100%;height:424px;">
				
				</div>
			</div>
		</div>
	</div>
    <div class="row">
      <div class="col-md-12">
        <div class="contactproperties whitebg">
          <div class="contactform">
            <div class="row">
				<div class="col-md-4 contact-head">
					<h3 class="contact-heading">CONTACT US</h3>
				</div>
				<div class="col-md-8">
					<div class="container-fluid">
					  <div class="col-md-4">
						<input type="text" class="contactname" name="name" placeholder="NAME">
					  </div>
					  <div class="col-md-4">
						<input type="email" class="contactemail" name="email" placeholder="EMAIL">
					  </div>
					  <div class="col-md-4">
						<input type="text" class="contactcity" name="city" placeholder="CITY">
					  </div>
					  
					</div>
					<div class="container-fluid">
					  <div class="col-md-4">
						<input type="text" class="contactcountry" name="country" placeholder="COUNTRY">
					  </div>
					  <div class="col-md-4">
						<input type="text" class="contactmobile" name="mobile" placeholder="MOBILE">
					  </div>
					  <div class="col-md-4">
						<input type="submit" value="SUBMIT"/>
					  </div>
					  
					</div>
				</div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
   <div class="row ad-container">
		<div class="col-md-12">
			<img src="<?php echo base_url('frontassets/img/ad.jpg'); ?>" style="width:100%">
		</div>
   </div>
  </div>
</div>
<script>
	
	$(document).ready(function() {
		$(".property-tabs li span").click(function(){
			$(".property-tabs li").removeClass("active");
			$(this).parent("li").addClass("active");
			var pclass=$(this).attr("divclass");
			$(".property-details").hide();
			$("."+pclass+"-container").show();
		});
	});
	
</script>
<script>
	var lat= "<?php echo $propertydetails['property']->lat; ?>";
	var longi= "<?php echo $propertydetails['property']->long; ?>";
	//lat = parseFloat(lat);
	//longi = parseFloat(longi);
	//lat = lat.toFixed(4);
	function initialize() {
      var myLatlng = new google.maps.LatLng(lat, longi);
      var myOptions = {
        zoom: 15,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	   var marker = new google.maps.Marker({
		  position: myLatlng,
		  map: map,
		  title: ''
	  });
	  
	  
    }

    function loadScript() {
      var script = document.createElement("script");
      script.type = "text/javascript";
      script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
      document.body.appendChild(script);
    }

    window.onload = loadScript;
</script>