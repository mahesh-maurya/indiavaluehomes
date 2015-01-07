<section class="panel">

<div class="panel-body">
<ul class="nav nav-stacked">
<li><a href="<?php echo site_url('site/editproperty?id=').$before['property']->id; ?>">Property Details</a></li>
<li><a href="<?php echo site_url('site/editpropertyinfo?id=').$before['property']->id; ?>">Property Info</a></li>
<li><a href="<?php echo site_url('site/editpropertyamenity?id=').$before['property']->id; ?>">Property Amenities</a></li>
<li><a href="<?php echo site_url('site/uploadpropertyimage?id=').$before['property']->id; ?>">Image</a></li>
<li><a href="<?php echo site_url('site/viewconstructionupdate?id=').$before['property']->id; ?>">Construction Update</a></li>
<li><a href="<?php echo site_url('site/viewpropertywishlist?id=').$before['property']->id; ?>">Property Wishlist</a></li>
<li><a href="<?php echo site_url('site/viewpropertycomment?id=').$before['property']->id; ?>">Comment</a></li>
<li><a href="<?php echo site_url('site/viewpropertyapartment?id=').$before['property']->id; ?>">Apartment</a></li>
<li><a href="<?php echo site_url('site/addbrochure?id=').$before['property']->id; ?>">Brochure</a></li>
</ul>
</div>
</section>