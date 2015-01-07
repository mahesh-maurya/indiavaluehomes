<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Wishlist_model extends CI_Model
{

	public function viewwishlist()
	{
		$query="SELECT `user`.`name` as `name`,`property`.`name` as `property`,`propertywishlist`.`timestamp` as `timestamp` FROM `propertywishlist`
		INNER JOIN `user` ON `user`.`id` = `propertywishlist`.`user`
		INNER JOIN `property` ON `propertywishlist`.`property` = `property`.`id`		
		ORDER BY `propertywishlist`.`timestamp` DESC";
	   
		$query=$this->db->query($query)->result();
		
		return $query;
	}
	
	public function viewwishlista()
	{
		$query="SELECT `propertywishlist`.`property`, `propertywishlist`.`name` as `pname`, `propertywishlist`.`email`, `propertywishlist`.`phone`, `propertywishlist`.`timestamp`,`property`.`name` as `propertyname`,`builder`.`name` as `buildername` FROM `propertywishlist` INNER JOIN `property` ON `propertywishlist`.`property`=`property`.`id`
INNER JOIN `builder` ON `builder`.`id`=`property`.`builder`";
	   
		$query=$this->db->query($query)->result();
		
		return $query;
	}
	public function viewwishlistofbuilder()
	{
        $builderid=$this->session->userdata('builderid');
		$query="SELECT `propertywishlist`.`property`, `propertywishlist`.`name` as `pname`, `propertywishlist`.`email`, `propertywishlist`.`phone`, `propertywishlist`.`timestamp`,`property`.`name` as `propertyname`,`builder`.`name` as `buildername` 
        FROM `propertywishlist` 
        LEFT OUTER JOIN `property` ON `propertywishlist`.`property`=`property`.`id`
LEFT OUTER JOIN `builder` ON `builder`.`id`=`property`.`builder`
WHERE `property`.`builder`='$builderid'";
	   
		$query=$this->db->query($query)->result();
		
		return $query;
	}
	 public function exportcontact() {
        
		$this->load->dbutil();
        $query=$this->db->query("SELECT `id`, `name`, `email`, `contact`, `comment`, `timestamp` FROM `contact`");
        //return $query;
        $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';

        if ( ! write_file('./csvgenerated/contactfile.csv', $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
             echo 'File written!';
        }
    }
    public function exportwishlist() {
        
		$this->load->dbutil();
		$query=$this->db->query("SELECT `propertywishlist`.`property`, `propertywishlist`.`name` as `pname`, `propertywishlist`.`email`, `propertywishlist`.`phone`, `propertywishlist`.`timestamp`,`property`.`name` as `propertyname`,`builder`.`name` as `buildername` 
        FROM `propertywishlist` 
        LEFT OUTER JOIN `property` ON `propertywishlist`.`property`=`property`.`id`
LEFT OUTER JOIN `builder` ON `builder`.`id`=`property`.`builder`");
        //return $query;
        $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';

        if ( ! write_file('./csvgenerated/wishlistfile.csv', $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url("csvgenerated/wishlistfile.csv"), 'refresh');
//             echo 'File written!';
        }
    }
//    public function exportwishlistofbuilder() {
//        
//		$this->load->dbutil();
//        $query=$this->db->query("SELECT `propertywishlist`.`property`, `propertywishlist`.`name` as `pname`, `propertywishlist`.`email`, `propertywishlist`.`phone`, `propertywishlist`.`timestamp`,`property`.`name` as `propertyname`,`builder`.`name` as `buildername` FROM `propertywishlist` INNER JOIN `property` ON `propertywishlist`.`property`=`property`.`id`
//INNER JOIN `builder` ON `builder`.`id`=`property`.`builder`");
//        //return $query;
//        $content= $this->dbutil->csv_from_result($query);
//        //$data = 'Some file data';
//
//        if ( ! write_file('./csvgenerated/wishlistfile.csv', $content))
//        {
//             echo 'Unable to write the file';
//        }
//        else
//        {
//             echo 'File written!';
//        }
//    }
    public function exportregistereduser() {
        
		$this->load->dbutil();
        $query=$this->db->query("SELECT `id`, `name`, `email`, `city`, `contact`, `timestamp` FROM `offers`");
        //return $query;
        $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';

        if ( ! write_file('./csvgenerated/registereduserfile.csv', $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
             echo 'File written!';
        }
    }
	
	public function viewuserwishlist($user)
	{
		$query="SELECT `user`.`name` as `name`,`property`.`name` as `property`,`propertywishlist`.`timestamp` as `timestamp` FROM `propertywishlist`
		INNER JOIN `user` ON `user`.`id` = `propertywishlist`.`user` AND `propertywishlist`.`user`='$user'
		INNER JOIN `property` ON `propertywishlist`.`property` = `property`.`id`		
		ORDER BY `propertywishlist`.`timestamp` DESC";
	   
		$query=$this->db->query($query)->result();
		
		return $query;
	}
	public function viewpropertywishlist($property)
	{
        $query="SELECT `propertywishlist`.`name` as `name`,`propertywishlist`.`email` as `email`,`propertywishlist`.`phone` as `phone`,`property`.`name` as `property`,`propertywishlist`.`timestamp` as `timestamp` FROM `propertywishlist`
		INNER JOIN `property` ON `propertywishlist`.`property` = `property`.`id` AND `propertywishlist`.`property`='$property'		
		ORDER BY `propertywishlist`.`timestamp` DESC";
	   
		$query=$this->db->query($query)->result();
		
		return $query;
	}
    public function addpropertywishlist($property,$name,$email,$phone) {
        $data  = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'property' => $property,

        );

        $this->db->insert( 'propertywishlist', $data );
        
        $builderemailid=$this->db->query("SELECT  `property`.`id`,`builder`.`email` 
FROM  `propertywishlist` 
INNER JOIN  `property` ON  `property`.`id` =  `propertywishlist`.`property`
INNER JOIN  `builder` ON  `property`.`builder` =  `builder`.`id` 
WHERE `property`.`id`='$property'")->row();
        
        $propertydetails=$this->db->query("SELECT `property`.`id`,`property`.`name`,`area`.`name` as `area`,`property`.`price`,`propertytype`.`name` as `propertytype`,`builder`.`name` as `builder` FROM `property` 
		INNER JOIN `propertytype` ON `propertytype`.`id` =  `property`.`propertytype`
		INNER JOIN `builder` ON `builder`.`id` =  `property`.`builder`
		INNER JOIN `area` ON `area`.`id` =  `property`.`area`
        WHERE `property`.`id`='$property'")->row();
        
        $builderemailid= $builderemailid->email;
        
        $builderemailid = explode(",", $builderemailid);

        $propertyname= $propertydetails->name;
        $propertyarea= $propertydetails->area;
        $propertyprice= $propertydetails->price;
        $propertytype= $propertydetails->propertytype;
        $propertybuilder= $propertydetails->builder;
            
        $this->load->library('email');
            $this->email->from('enquiry@indiavaluehomes.com', 'indiavaluehomes');
            $this->email->to($builderemailid);
            $this->email->subject('indiavaluehomes');
            $msg="User WishList For Property<br>
            <h3>User Details</h3><br>
            User Name- '$name'<br>
            User Email- '$email'<br>
            Phone Number- '$phone'<br><br>
            <h3>Property Details</h3><br>
            Property Name- '$propertyname'<br>
            Property Area- '$propertyarea'<br>
            Property Price- '$propertyprice'<br>
            Property Type- '$propertytype'<br>
            Property Builder- '$propertybuilder'<br>";
            $this->email->message($msg);

            $this->email->send();
        return 1;
    }
    
    
    public function submitcontact($name,$email,$comment,$contact) {
        $data  = array(
            'name' => $name,
            'email' => $email,
            'contact' => $contact,
            'comment' => $comment,

        );

        $this->db->insert( 'contact', $data );
        return 1;
    }
    public function submitoffers($name,$email,$city,$contact) {
        $data  = array(
            'name' => $name,
            'email' => $email,
            'contact' => $contact,
            'city' => $city,

        );

        $this->db->insert( 'offers', $data );
        return 1;
    }
    
    public function viewcontact() {
        $query=$this->db->query("SELECT * FROM `contact`")->result();
        return $query;
    }
    public function viewoffers() {
        $query=$this->db->query("SELECT * FROM `offers`")->result();
        return $query;
    }
    
    function exportwishlistofbuilder()
	{
		$this->load->dbutil();
        $builderid=$this->session->userdata('builderid');
		$query=$this->db->query("SELECT `propertywishlist`.`property`, `propertywishlist`.`name` as `pname`, `propertywishlist`.`email`, `propertywishlist`.`phone`, `propertywishlist`.`timestamp`,`property`.`name` as `propertyname`,`builder`.`name` as `buildername` 
        FROM `propertywishlist` 
        LEFT OUTER JOIN `property` ON `propertywishlist`.`property`=`property`.`id`
LEFT OUTER JOIN `builder` ON `builder`.`id`=`property`.`builder`
WHERE `property`.`builder`='$builderid'");
        //$timestamp=new DateTime();
        //$timestamp=$timestamp->format('Y-m-d_H.i.s');
       $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';

        if ( ! write_file("./csvgenerated/wishlistofbuilder.csv", $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url("csvgenerated/wishlistofbuilder.csv"), 'refresh');
        }
	}
    
}
?>