<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller 
{
	public function __construct( )
	{
		parent::__construct();
		
		$this->is_logged_in();
	}
	function is_logged_in( )
	{
		$is_logged_in = $this->session->userdata( 'logged_in' );
		if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
			redirect( base_url() . 'index.php/login', 'refresh' );
		} //$is_logged_in !== 'true' || !isset( $is_logged_in )
	}
	function checkaccess($access)
	{
		$accesslevel=$this->session->userdata('accesslevel');
		if(!in_array($accesslevel,$access))
			redirect( base_url() . 'index.php/site?alerterror=You do not have access to this page. ', 'refresh' );
	}
	public function index()
	{
		//$access = array("1","2");
		$access = array("1","2");
		$this->checkaccess($access);
		$data[ 'page' ] = 'dashboard';
		$data[ 'title' ] = 'Welcome';
		$this->load->view( 'template', $data );	
	}
	public function createuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'builder' ] =$this->builder_model->getbuilderdropdown();
		$data[ 'page' ] = 'createuser';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );	
	}
	function createusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('name','name','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('contactno','contactno','trim');
		
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'builder' ] =$this->builder_model->getbuilderdropdown();
			$data['page']='createuser';
			$data['title']='Create New User';
			$this->load->view('template',$data);
		}
		else
		{
			$password=$this->input->post('password');
			$name=$this->input->post('name');
			$dob=$this->input->post('dob');
			if($dob != "")
			{
				$dob = date("Y-m-d",strtotime($dob));
			}
			$accesslevel=$this->input->post('accesslevel');
			$email=$this->input->post('email');
			$contactno=$this->input->post('contactno');
			$status=$this->input->post('status');
			$builder=$this->input->post('builder');
			if($this->user_model->create($name,$dob,$password,$accesslevel,$email,$contactno,$status,$builder)==0)
			$data['alerterror']="New user could not be created.";
			else
			$data['alertsuccess']="User created Successfully.";
			
			$data['table']=$this->user_model->viewusers();
			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    //--------------------------------------------------------------------------------------Apartment
    
    public function createapartment()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		//$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'page' ] = 'createapartment';
		$data[ 'title' ] = 'Create Apartment';
		$this->load->view( 'template', $data );	
	}
//    function createapartmentsubmit()
//	{
//		$access = array("1");
//		$this->checkaccess($access);
//        $id=$this->input->get("id");
//		$this->form_validation->set_rules('config','Configuration','trim|required');
//		$this->form_validation->set_rules('area','Area','trim|required');
//		$this->form_validation->set_rules('price','Price','trim');
//		$this->form_validation->set_rules('order','order','trim');
//		
//		if($this->form_validation->run() == FALSE)	
//		{
//			$data['alerterror'] = validation_errors();
//			$data[ 'status' ] =$this->user_model->getstatusdropdown();
//			$data['accesslevel']=$this->user_model->getaccesslevels();
//			$data['page']='createapartment';
//			$data['title']='Create New Apartment';
//			$this->load->view('template',$data);
//		}
//		else
//		{
//			$config=$this->input->post('config');
//			$area=$this->input->post('area');
//			$price=$this->input->post('price');
//			$order=$this->input->post('order');
//            
////		      $this->load->library( 'upload', $config );
////			$filename="floorplan";
//			 
//            $config['upload_path'] = './uploads/';
//			$config['allowed_types'] = 'gif|jpg|png|jpeg';
//			$this->load->library('upload', $config);
//			$filename="floorplan";
//			$floorplan="";
//			if (  $this->upload->do_upload($filename))
//			{
//				$uploaddata = $this->upload->data();
//				$floorplan=$uploaddata['file_name'];
//			}
//            
//			
//			if($this->property_model->createapartment($id,$config,$area,$price,$floorplan,$order)==0)
//			$data['alerterror']="New Apartment could not be created.";
//			else
//			$data['alertsuccess']="Apartment created Successfully.";
//			
//			$data['table']=$this->property_model->viewpropertyapartment($id);
//$data['other']="id=$id";
//			$data['redirect']="site/viewpropertyapartment";
//			//$data['other']="template=$template";
//			$this->load->view("redirect",$data);
//		}
//    }
	function createapartmentsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
        $config[ 'upload_path' ]   = './uploads/';
        $config[ 'allowed_types' ] = 'gif|jpg|png|jpeg';
		$config[ 'encrypt_name' ]  = TRUE;
        $this->load->library( 'upload', $config );
        
        
        $id=$this->input->get("id");
		$this->form_validation->set_rules('config','Configuration','trim|required');
		$this->form_validation->set_rules('area','Area','trim|required');
		$this->form_validation->set_rules('price','Price','trim');
		$this->form_validation->set_rules('order','order','trim');
		
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
			$data['page']='createapartment';
			$data['title']='Create New Apartment';
			$this->load->view('template',$data);
		}
		else
		{
			$config=$this->input->post('config');
			$area=$this->input->post('area');
			$price=$this->input->post('price');
			$order=$this->input->post('order');
            
		      $this->load->library( 'upload', $config );
			$filename="floorplan";
			//$floorplan="demo";
            $name="name";
           // $name=$this->upload->do_upload($filename);
           // $this->upload->do_upload($filename)
             //   $uploaddata = $this->upload->data();
				//$floorplan=$uploaddata['file_name'];
			if ($this->upload->do_upload($filename))
			{
               
				$uploaddata = $this->upload->data();
				$floorplan=$uploaddata['file_name'];
			}
           
			
			if($this->property_model->createapartment($id,$config,$area,$price,$floorplan,$order)==0)
			$data['alerterror']="New Apartment could not be created.";
			else
			$data['alertsuccess']="Apartment created Successfully.";
			
			$data['table']=$this->property_model->viewpropertyapartment($id);
$data['other']="id=$id";
			$data['redirect']="site/viewpropertyapartment";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewapartment()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->property_model->viewpropertyapartment();
		$data['page']='viewpropertyapartment';
        $data['page2']='block/propertyblock';
		$data['title']='View Apartment';
		$this->load->view('template',$data);
	}
function deleteapartment()
	{
		$access = array("1");
		$this->checkaccess($access);
		$id2=$this->input->get("id2");
$id=$this->input->get("id");
$this->db->query("DELETE FROM `apartment` WHERE `id`='$id2'");
$data['table']=$this->property_model->viewpropertyapartment($this->input->get('id'));
		$data['before']=$this->property_model->beforeeditproperty($this->input->get('id'));
		$data['page']='viewpropertyapartment';
		$data['page2']='block/propertyblock';
		$data['title']='View Wishlist';
		$this->load->view('template',$data);
	}
    
    function viewpropertyapartment()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->property_model->viewpropertyapartment($this->input->get('id'));
		$data['before']=$this->property_model->beforeeditproperty($this->input->get('id'));
		$data['page']='viewpropertyapartment';
		$data['page2']='block/propertyblock';
		$data['title']='View Wishlist';
		$this->load->view('template',$data);
	}
    
    function editapartment()
	{
		$access = array("1");
		$this->checkaccess($access);
		//$data[ 'status' ] =$this->property_model->getstatusdropdown();
		//$data['accesslevel']=$this->user_model->getaccesslevels();
		$data['before']=$this->property_model->beforeedit($this->input->get('id'));
		$data['page']='editapartment';
		//$data['page2']='block/userblock';
		$data['title']='Edit Apartment';
		$this->load->view('template',$data);
	}
	function editapartmentsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
        $id=$this->input->get("id");
$id2=$this->input->get("id2");
         $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
		$this->form_validation->set_rules('config','Configuration','trim|required');
		$this->form_validation->set_rules('area','Area','trim|required');
		$this->form_validation->set_rules('price','Price','trim');
		$this->form_validation->set_rules('order','order','trim');
		
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
			$data['page']='createapartment';
			$data['title']='Create New Apartment';
			$this->load->view('template',$data);
		}
		else
		{
			$config=$this->input->post('config');
			$area=$this->input->post('area');
			$price=$this->input->post('price');
			$order=$this->input->post('order');
			$id=$this->input->get_post('id');
           
			$this->load->library('upload', $config);
			$filename="floorplan";
			$floorplan="";
			if ($this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$floorplan=$uploaddata['file_name'];
			}
			
            
            if($floorplan=="")
            {
            $floorplan=$this->property_model->getfloorplanbypropertyid($id);
               // print_r($floorplan);
                $floorplan=$floorplan->floorplan;
            }
			if($this->property_model->editaprtment($id,$config,$area,$price,$floorplan,$order)==0)
			$data['alerterror']="Apartment Editing was unsuccesful";
			else
			$data['alertsuccess']="Apartment edited Successfully.";
			$data['other']="id=$id2";
			$data['redirect']="site/viewpropertyapartment";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
    
    
	
	
    
    function viewusers()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->user_model->viewusers();
		$data['page']='viewusers';
		$data['title']='View Users';
		$this->load->view('template',$data);
	}
	function edituser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='edituser';
		$data['page2']='block/userblock';
		$data['title']='Edit User';
		$this->load->view('template',$data);
	}
	function editusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accesslevel','Accesslevel','trim');
		$this->form_validation->set_rules('name','name','trim');
		$this->form_validation->set_rules('dob','Date of birth','trim');
		$this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('contactno','contactno','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
			$data['before']=$this->user_model->beforeedit($this->input->post('id'));
			$data['page']='edituser';
			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$password=$this->input->post('password');
			$name=$this->input->post('name');
			$dob=$this->input->post('dob');
			if($dob != "")
			{
				$dob = date("Y-m-d",strtotime($dob));
			}
			$accesslevel=$this->input->post('accesslevel');
			$email=$this->input->post('email');
			$contactno=$this->input->post('contactno');
			$status=$this->input->post('status');
			if($this->user_model->edit($id,$name,$dob,$password,$accesslevel,$email,$contactno,$status)==0)
			$data['alerterror']="User Editing was unsuccesful";
			else
			$data['alertsuccess']="User edited Successfully.";
			
			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	function editaddress()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'country' ] =$this->user_model->getcountry();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='editaddress';
		$data['page2']='block/userblock';
		$data['title']='Edit User';
		$this->load->view('template',$data);
	}
	function editaddresssubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		
		$this->form_validation->set_rules('address','address','trim');
		$this->form_validation->set_rules('state','state','trim');
		$this->form_validation->set_rules('city','city','trim');
		$this->form_validation->set_rules('country','country','trim');
		$this->form_validation->set_rules('pincode','pincode','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
			$data[ 'country' ] =$this->user_model->getcountry();
			$data['before']=$this->user_model->beforeedit($this->input->post('id'));
			$data['page']='edituser';
			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$address=$this->input->post('address');
			$city=$this->input->post('city');
			$state=$this->input->post('state');
			$country=$this->input->post('country');
			$pincode=$this->input->post('pincode');
			if($this->user_model->editaddress($id,$address,$city,$state,$country,$pincode)==0)
			$data['alerterror']="User Editing was unsuccesful";
			else
			$data['alertsuccess']="User edited Successfully.";
			$data['table']=$this->user_model->viewusers();
			$data['redirect']="site/editaddress?id=".$id;
			//$data['other']="template=$template";
			$this->load->view("redirect2",$data);
			
		}
	}
	function deleteuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->deleteuser($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="User Deleted Successfully";
		$data['page']='viewusers';
		$data['title']='View Users';
		$this->load->view('template',$data);
	}
	function changeuserstatus()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->changestatus($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="Status Changed Successfully";
		$data['page']='viewusers';
		$data['title']='View Users';
		$this->load->view('template',$data);
	}
	//state
	public function createstate()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createstate';
		$data[ 'title' ] = 'Create state';
		$this->load->view( 'template', $data );	
	}
	function createstatesubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		
		
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createstate';
			$data[ 'title' ] = 'Create state';
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			if($this->locator_model->createstate($name)==0)
			$data['alerterror']="New state could not be created.";
			else
			$data['alertsuccess']="state  created Successfully.";
			$data['table']=$this->locator_model->viewstate();
			$data['redirect']="site/viewstate";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewstate()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->locator_model->viewstate();
		$data['page']='viewstate';
		$data['title']='View state';
		$this->load->view('template',$data);
	}
	function editstate()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->locator_model->beforeeditstate($this->input->get('id'));
		$data['page']='editstate';
		$data['title']='Edit state';
		$this->load->view('template',$data);
	}
	function editstatesubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->locator_model->beforeeditstate($this->input->post('id'));
			$data['page']='editstate';
			$data['title']='Edit state';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			if($this->locator_model->editstate($id,$name)==0)
			$data['alerterror']="state Editing was unsuccesful";
			else
			$data['alertsuccess']="state edited Successfully.";
			$data['redirect']="site/viewstate";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function deletestate()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->locator_model->deletestate($this->input->get('id'));
		$data['table']=$this->locator_model->viewstate();
		$data['alertsuccess']="state Deleted Successfully";
		$data['page']='viewstate';
		$data['title']='View state';
		$this->load->view('template',$data);
	}
	//city
	public function createcity()
	{
		$data[ 'page' ] = 'createcity';
		$data[ 'state' ] =$this->locator_model->getstatedropdown();
		$data[ 'title' ] = 'Create city';
		$this->load->view( 'template', $data );	
	}
	function createcitysubmit()
	{
		$this->form_validation->set_rules('name','Name','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'state' ] =$this->locator_model->getstatedropdown();
			$data[ 'page' ] = 'createcity';
			$data[ 'title' ] = 'Create city';
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			$state=$this->input->post('state');
			if($this->locator_model->createcity($name,$state)==0)
			$data['alerterror']="New city could not be created.";
			else
			$data['alertsuccess']="city  created Successfully.";
			$data['table']=$this->locator_model->viewcity();
			$data['redirect']="site/viewcity";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewcity()
	{
		$data['table']=$this->locator_model->viewcity();
		$data['page']='viewcity';
		$data['title']='View city';
		$this->load->view('template',$data);
	}
	function editcity()
	{
		$data['before']=$this->locator_model->beforeeditcity($this->input->get('id'));
		$data[ 'state' ] =$this->locator_model->getstatedropdown();
		$data['page']='editcity';
		$data['title']='Edit city';
		$this->load->view('template',$data);
	}
	function editcitysubmit()
	{
		$this->form_validation->set_rules('name','Name','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->locator_model->beforeeditcity($this->input->post('id'));
			$data[ 'state' ] =$this->locator_model->getstatedropdown();
			$data['page']='editcity';
			$data['title']='Edit city';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			$state=$this->input->post('state');
			if($this->locator_model->editcity($id,$name,$state)==0)
			$data['alerterror']="city Editing was unsuccesful";
			else
			$data['alertsuccess']="city edited Successfully.";
			$data['table']=$this->locator_model->viewcity();
			$data['redirect']="site/viewcity";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			/*$data['page']='viewusers';
			$data['title']='View Users';
			$this->load->view('template',$data);*/
		}
	}
	function deletecity()
	{
		$this->locator_model->deletecity($this->input->get('id'));
		$data['table']=$this->locator_model->viewcity();
		$data['alertsuccess']="city Deleted Successfully";
		$data['page']='viewcity';
		$data['title']='View city';
		$this->load->view('template',$data);
	}
	//area
	public function createarea()
	{
		$data[ 'city' ] =$this->locator_model->getcitydropdown();
		$data[ 'page' ] = 'createarea';
		$data[ 'title' ] = 'Create area';
		$this->load->view( 'template', $data );	
	}
	function createareasubmit()
	{
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('city','city','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'city' ] =$this->locator_model->getcitydropdown();
			$data[ 'page' ] = 'createarea';
			$data[ 'title' ] = 'Create area';
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			$city=$this->input->post('city');
			if($this->locator_model->createarea($name,$city)==0)
			$data['alerterror']="New area could not be created.";
			else
			$data['alertsuccess']="area  created Successfully.";
			$data['table']=$this->locator_model->viewarea();
			$data['redirect']="site/viewarea";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewarea()
	{
		$data['table']=$this->locator_model->viewarea();
		$data['page']='viewarea';
		$data['title']='View area';
		$this->load->view('template',$data);
	}
	function editarea()
	{
		$data[ 'city' ] =$this->locator_model->getcitydropdown();
		$data['before']=$this->locator_model->beforeeditarea($this->input->get('id'));
		$data['page']='editarea';
		$data['title']='Edit area';
		$this->load->view('template',$data);
	}
	function editareasubmit()
	{
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('city','city','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'city' ] =$this->locator_model->getcitydropdown();
			$data['before']=$this->locator_model->beforeeditarea($this->input->post('id'));
			$data['page']='editarea';
			$data['title']='Edit area';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			$city=$this->input->post('city');
			if($this->locator_model->editarea($id,$name,$city)==0)
			$data['alerterror']="area Editing was unsuccesful";
			else
			$data['alertsuccess']="area edited Successfully.";
			$data['table']=$this->locator_model->viewarea();
			$data['redirect']="site/viewarea";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			/*$data['page']='viewusers';
			$data['title']='View Users';
			$this->load->view('template',$data);*/
		}
	}
	function deletearea()
	{
		$this->locator_model->deletearea($this->input->get('id'));
		$data['table']=$this->locator_model->viewarea();
		$data['alertsuccess']="area Deleted Successfully";
		$data['page']='viewarea';
		$data['title']='View area';
		$this->load->view('template',$data);
	}
	//property
	public function createproperty()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->property_model->getstatusdropdown();
		$data['propertytype']=$this->property_model->getpropertytype();
		$data['area']=$this->locator_model->getareadropdown();
		$data['builder']=$this->property_model->getbuilder();
		$data['order']=$this->property_model->getorderdropdown();
		$data[ 'page' ] = 'createproperty';
		$data[ 'title' ] = 'Create property';
		$this->load->view( 'template', $data );	
	}
		public function exportproperty()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->property_model->exportproperty();
		$data['table']=$this->property_model->viewproperty();
		$data['page']='viewproperty';
		$data['title']='View property';
		$this->load->view('template',$data);
//		$data[ 'page' ] = 'createproperty';
//		$data[ 'title' ] = 'Create property';
//		$this->load->view( 'template', $data );	
	}
	public function exportcontact()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->wishlist_model->exportcontact();
		$data['table']=$this->wishlist_model->viewcontact();
		$data['page']='viewcontact';
		$data['title']='View contact';
		$this->load->view('template',$data);
//		$data[ 'page' ] = 'createcontact';
//		$data[ 'title' ] = 'Create contact';
//		$this->load->view( 'template', $data );	
	}
	public function exportregistereduser()
	{
		$access = array("1");
		$this->checkaccess($access);
        $this->wishlist_model->exportregistereduser();
        $data['table']=$this->wishlist_model->viewoffers();
        $data['page']='viewoffers';
        $this->load->view('template',$data);
//		$data[ 'page' ] = 'createcontact';
//		$data[ 'title' ] = 'Create contact';
//		$this->load->view( 'template', $data );	
	}
	public function exportwishlist()
	{
		$access = array("1");
        $this->wishlist_model->exportwishlist();
        $data['table']=$this->wishlist_model->viewwishlista();
        $data['page']='viewwishlist';
        $this->load->view('template',$data);
        
        
//		$data[ 'page' ] = 'createcontact';
//		$data[ 'title' ] = 'Create contact';
//		$this->load->view( 'template', $data );	
	}
	public function exportwishlistofbuilder()
	{
		$access = array("2");
		$this->checkaccess($access);
        $this->wishlist_model->exportwishlistofbuilder();
        $data['table']=$this->wishlist_model->viewwishlistofbuilder();
        $data['page']='viewwishlist';
        $this->load->view('template',$data);
//		$data[ 'page' ] = 'createcontact';
//		$data[ 'title' ] = 'Create contact';
//		$this->load->view( 'template', $data );	
	}
    //wishlist
    
    function viewwishlist()
    {
        $access = array("1");
        $this->checkaccess($access);
        $data['table']=$this->wishlist_model->viewwishlista();
        $data['page']='viewwishlist';
		$data['title']='View Wishlist';
        $this->load->view('template',$data);
    }
    
    function viewwishlistofbuilder()
    {
        $access = array("2");
        $this->checkaccess($access);
        $data['table']=$this->wishlist_model->viewwishlistofbuilder();
        $data['page']='viewwishlistofbuilder';
		$data['title']='View Wishlist';
        $this->load->view('template',$data);
    }
    
	function createpropertysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('area','area','trim|');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('description','description','trim|');
		$this->form_validation->set_rules('lat','lat','trim|');
		$this->form_validation->set_rules('long','long','trim|');
		$this->form_validation->set_rules('builder','builder','trim|');
		$this->form_validation->set_rules('price','price','trim|');
		$this->form_validation->set_rules('order','order','trim|');
		$this->form_validation->set_rules('pricestartingfrom','pricestartingfrom','trim|');
		$this->form_validation->set_rules('propertytype','propertytype','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->property_model->getstatusdropdown();
			$data['propertytype']=$this->property_model->getpropertytype();
			$data['area']=$this->locator_model->getareadropdown();
			$data['builder']=$this->property_model->getbuilder();
		$data['order']=$this->property_model->getorderdropdown();
			$data[ 'page' ] = 'createproperty';
			$data[ 'title' ] = 'Create property';
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			$area=$this->input->post('area');
			$status=$this->input->post('status');
			$description=$this->input->post('description');
			$lat=$this->input->post('lat');
			$long=$this->input->post('long');
			$price=$this->input->post('price');
			$pricestartingfrom=$this->input->post('pricestartingfrom');
			$builder=$this->input->post('builder');
			$propertytype=$this->input->post('propertytype');
			$order=$this->input->post('order');
            
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 247;
                $config_r['height'] = 165;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            
                $brochure="";
//            $config['upload_path'] = './uploads/';
//			$config['allowed_types'] = 'pdf|doc|docx';
//			$this->load->library('upload', $config);
//			$filename="brochure";
//			$brochure="";
//			if (  $this->upload->do_upload($filename))
//			{
//				$uploaddata = $this->upload->data();
//				$brochure=$uploaddata['file_name'];
//			}
            
            
			if($this->property_model->createproperty($name,$area,$description,$lat,$long,$price,$builder,$propertytype,$status,$pricestartingfrom,$order,$brochure,$image)==0)
			$data['alerterror']="New property could not be created.";
			else
			$data['alertsuccess']="property  created Successfully.";
			$data['table']=$this->property_model->viewproperty();
			$data['redirect']="site/viewproperty";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewproperty()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->property_model->viewproperty();
		$data['page']='viewproperty';
		$data['title']='View property';
		$this->load->view('template',$data);
	}
	function editproperty()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->property_model->beforeeditproperty($this->input->get('id'));
		$data[ 'status' ] =$this->property_model->getstatusdropdown();
		$data['propertytype']=$this->property_model->getpropertytype();
		$data['area']=$this->locator_model->getareadropdown();
		$data['builder']=$this->property_model->getbuilder();
        $data['order']=$this->property_model->getorderdropdown();
		$data['page']='editproperty';
		$data['page2']='block/propertyblock';
		$data['title']='Edit property';
		$this->load->view('template',$data);
	}
	function editpropertysubmit()
	{
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('area','area','trim|');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('description','description','trim|');
		$this->form_validation->set_rules('lat','lat','trim|');
		$this->form_validation->set_rules('long','long','trim|');
		$this->form_validation->set_rules('builder','builder','trim|');
		$this->form_validation->set_rules('price','price','trim|');
		$this->form_validation->set_rules('order','order','trim|');
		$this->form_validation->set_rules('pricestartingfrom','pricestartingfrom','trim|');
		$this->form_validation->set_rules('propertytype','propertytype','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->property_model->getstatusdropdown();
			$data['propertytype']=$this->property_model->getpropertytype();
			$data['area']=$this->locator_model->getareadropdown();
			$data['builder']=$this->property_model->getbuilder();
			$data['before']=$this->property_model->beforeeditproperty($this->input->post('id'));
            $data['order']=$this->property_model->getorderdropdown();
			$data['page']='editproperty';
			$data['page2']='block/propertyblock';
			$data['title']='Edit property';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			$area=$this->input->post('area');
			$status=$this->input->post('status');
			$description=$this->input->post('description');
			$lat=$this->input->post('lat');
			$long=$this->input->post('long');
			$price=$this->input->post('price');
			$pricestartingfrom=$this->input->post('pricestartingfrom');
			$builder=$this->input->post('builder');
			$order=$this->input->post('order');
            
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 247;
                $config_r['height'] = 165;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            if($image=="")
            {
                $image=$this->property_model->getpropertyimagebyid($id);
                $image=$image->image;
            }
//            $config['upload_path'] = './uploads/';
//			$config['allowed_types'] = 'pdf';
//			$this->load->library('upload', $config);
//			$filename="brochure";
			$brochure="";
//			if (  $this->upload->do_upload($filename))
//			{
//				$uploaddata = $this->upload->data();
//				$brochure=$uploaddata['file_name'];
//			}
//            if($brochure=="")
//            {
//                $brochure=$this->property_model->getbrochurebyid($id);
//                $brochure=$brochure->brochure;
//            }
//            
//            echo $brochure."name";
            
            
            
			$propertytype=$this->input->post('propertytype');
			if($this->property_model->editproperty($id,$name,$area,$description,$lat,$long,$price,$builder,$propertytype,$status,$pricestartingfrom,$order,$brochure,$image)==0)
			$data['alerterror']="property Editing was unsuccesful";
			else
			$data['alertsuccess']="property edited Successfully.";
			$data['redirect']="site/viewproperty";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	function deleteproperty()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->property_model->deleteproperty($this->input->get('id'));
		$data['table']=$this->property_model->viewproperty();
		$data['alertsuccess']="property Deleted Successfully";
		$data['page']='viewproperty';
		$data['title']='View property';
		$this->load->view('template',$data);
	}
	function uploadpropertyimage()
	{
		$access = array("1");
		$this->checkaccess($access);
		$id=$this->input->get('id');
		$data['table']=$this->property_model->viewallimages($id);
		$data['before']=$this->property_model->beforeeditproperty($id);
		$data['page']='uploadpropertyimage';
		$data['page2']='block/propertyblock';
		$data['title']='Upload Image';
		$this->load->view('template',$data);
	}
	function uploadpropertyimagesubmit()
	 {
		$access = array("1");
		$this->checkaccess($access);
//		$config[ 'upload_path' ]   = './uploads/';
//		$config[ 'allowed_types' ] = 'gif|jpg|png|jpeg';
//		$config[ 'encrypt_name' ]  = TRUE;
        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $filename="image";
        $image="";
		$this->load->library( 'upload', $config );
		if(!$this->upload->do_upload( 'image'))
		{
			$data['alerterror'] = "Image Uploaded Unsuccessfully.";
			$data['table']=$this->property_model->viewallimages($id);
			$data['before']=$this->property_model->beforeeditproperty($this->input->get('id'));
			$data['page']='uploadpropertyimage';
			$data['page2']='block/propertyblock';
			$data['title']='Image Upload';
			$this->load->view('template',$data);
		}
		else
		{
            
            $uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
            
            
			$id=$this->input->get('id');
			
			$this->property_model->addimage($id,$image);
			$data['alertsuccess']="Image Uploaded Successfully.";
			$data['before']=$this->property_model->beforeeditproperty($this->input->get('id'));
			$data['table']=$this->property_model->viewallimages($id);
			$data['page']='uploadpropertyimage';
			$data['title']='Image Upload';
			//$this->load->view('template',$data);
			$data['redirect']="site/uploadpropertyimage?id=$id";
			//$data['other']="template=$template";
			$this->load->view("redirect2",$data);
		}
	 }
	 function deleteimage()
	 {
		$access = array("1");
		$this->checkaccess($access);
		$id=$this->input->get('id');
		$imageid=$this->input->get('imageid');
		$this->property_model->deleteimage($imageid,$id);
		$data['alertsuccess']="Image Deleted Successfully.";
		$data['before']=$this->property_model->beforeeditproperty($this->input->get('id'));
		$data['table']=$this->property_model->viewallimages($id);
		$data['page']='uploadpropertyimage';
		$data['page2']='block/propertyblock';
		$data['title']='Image Upload';
		$this->load->view('template',$data);
	 
	 }
	 function defaultimage()
	 {
		$access = array("1");
		$this->checkaccess($access);
		$id=$this->input->get('id');
		$imageid=$this->input->get('imageid');
		$this->property_model->defaultimage($imageid,$id);
		$data['alertsuccess']="Default Image is Selected Successfully.";
		$data['before']=$this->property_model->beforeeditproperty($this->input->get('id'));
		$data['table']=$this->property_model->viewallimages($id);
		$data['page']='uploadpropertyimage';
		$data['page2']='block/propertyblock';
		$data['title']='Image Upload';
		$this->load->view('template',$data);
	 
	 }
	 function changeorder()
	 {
		$access = array("1");
		$this->checkaccess($access);
		$id=$this->input->get_post('id');
		$order=$this->input->get_post('order');
		$property=$this->input->get_post('property');
		$data['page2']='block/propertyblock';
		$this->property_model->changeorder($id,$order,$property);	 
	 }
	 function editpropertyamenity()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->property_model->beforeeditproperty($this->input->get('id'));
		$data['amenity']=$this->property_model->getamenity();
		$data['page']='propertyamenity';
		$data['page2']='block/propertyblock';
		$data['title']='Edit  property amenity';
		$this->load->view('template',$data);
	}
	function editpropertyamenitysubmit()
	{
		$this->form_validation->set_rules('id','id','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->property_model->beforeeditproperty($this->input->post('id'));
			$data['amenity']=$this->property_model->getamenity();
			$data['page']='propertyamenity';
			$data['page2']='block/propertyblock';
			$data['title']='Edit Related propertys';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			
			$amenity=$this->input->post('amenity');
			
			if($this->property_model->editpropertyamenity($id,$amenity)==0)
			$data['alerterror']="Related property Editing was unsuccesful";
			else
			$data['alertsuccess']="Related property edited Successfully.";
			
			$data['redirect']="site/editpropertyamenity?id=".$id;
			//$data['other']="template=$template";
			$this->load->view("redirect2",$data);
		}
	}
	 function editpropertyinfo()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->property_model->beforeeditproperty($this->input->get('id'));
		$data['page']='editpropertyinfo';
		$data['page2']='block/propertyblock';
		$data['title']='Edit  property amenity';
		$this->load->view('template',$data);
	}
	function editpropertyinfosubmit()
	{
		$this->form_validation->set_rules('propertyarea','propertyarea','trim|');
		$this->form_validation->set_rules('propertyage','propertyage','trim|');
		$this->form_validation->set_rules('nearby','nearby','trim|');
		$this->form_validation->set_rules('bedroom','bedroom','trim|');
		$this->form_validation->set_rules('bathroom','bathroom','trim|');
		$this->form_validation->set_rules('kitchen','kitchen','trim|');
		$this->form_validation->set_rules('floor','floor','trim|');
        $this->form_validation->set_rules('possession','floor','trim|');
        $this->form_validation->set_rules('buildings','floor','trim|');
        $this->form_validation->set_rules('bankloan','floor','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->property_model->beforeeditproperty($this->input->post('id'));
			$data['page']='editpropertyinfo';
			$data['page2']='block/propertyblock';
			$data['title']='Edit Related propertys';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			
			$propertyarea=$this->input->post('propertyarea');
			$propertyage=$this->input->post('propertyage');
			$nearby=$this->input->post('nearby');
			$bedroom=$this->input->post('bedroom');
			$bathroom=$this->input->post('bathroom');
			$kitchen=$this->input->post('kitchen');
			$floor=$this->input->post('floor');

			$propertyaddress=$this->input->post('propertyaddress');
			$propertywalkthrough=$this->input->post('propertywalkthrough');
			$propertypanaroma=$this->input->post('propertypanaroma');
	$propertyspecialoffers=$this->input->post('propertyspecialoffers');


            $possession=$this->input->post('possession');
            $buildings=$this->input->post('buildings');
            $bankloan=$this->input->post('bankloan');
            if($this->property_model->editpropertyinfo($id,$propertyarea,$propertyaddress,$propertywalkthrough,$propertypanaroma,$propertyspecialoffers,$propertyage,$nearby,$bedroom,$bathroom,$kitchen,$floor,$possession,$buildings,$bankloan)==0)
			$data['alerterror']="Property Info Editing was unsuccesful";
			else
			$data['alertsuccess']="Property Info edited Successfully.";
			
			$data['redirect']="site/editpropertyinfo?id=".$id;
			//$data['other']="template=$template";
			$this->load->view("redirect2",$data);
		}
	}
	//propertytype
	public function createpropertytype()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createpropertytype';
		$data[ 'title' ] = 'Create propertytype';
		$this->load->view( 'template', $data );	
	}
	function createpropertytypesubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createpropertytype';
			$data[ 'title' ] = 'Create propertytype';
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			$filename="icon";
			$icon="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$icon=$uploaddata['file_name'];
			}
			if($this->propertytype_model->createpropertytype($name,$icon)==0)
			$data['alerterror']="New propertytype could not be created.";
			else
			$data['alertsuccess']="propertytype  created Successfully.";
			$data['table']=$this->propertytype_model->viewpropertytype();
			$data['redirect']="site/viewpropertytype";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewpropertytype()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->propertytype_model->viewpropertytype();
		$data['page']='viewpropertytype';
		$data['title']='View propertytype';
		$this->load->view('template',$data);
	}
	function editpropertytype()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->propertytype_model->beforeeditpropertytype($this->input->get('id'));
		$data['page']='editpropertytype';
		$data['title']='Edit propertytype';
		$this->load->view('template',$data);
	}
	function editpropertytypesubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->propertytype_model->beforeeditpropertytype($this->input->post('id'));
			$data['page']='editpropertytype';
			$data['title']='Edit propertytype';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			$filename="icon";
			$icon="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$icon=$uploaddata['file_name'];
			}
			if($this->propertytype_model->editpropertytype($id,$name,$icon)==0)
			$data['alerterror']="propertytype Editing was unsuccesful";
			else
			$data['alertsuccess']="propertytype edited Successfully.";
			$data['table']=$this->propertytype_model->viewpropertytype();
			$data['redirect']="site/viewpropertytype";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	function deletepropertytype()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->propertytype_model->deletepropertytype($this->input->get('id'));
		$data['table']=$this->propertytype_model->viewpropertytype();
		$data['alertsuccess']="propertytype Deleted Successfully";
		$data['page']='viewpropertytype';
		$data['title']='View propertytype';
		$this->load->view('template',$data);
	}
	//amenity
	public function createamenity()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createamenity';
		$data[ 'title' ] = 'Create amenity';
		$this->load->view( 'template', $data );	
	}
	function createamenitysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createamenity';
			$data[ 'title' ] = 'Create amenity';
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			$filename="icon";
			$icon="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$icon=$uploaddata['file_name'];
			}
			if($this->amenity_model->createamenity($name,$icon)==0)
			$data['alerterror']="New amenity could not be created.";
			else
			$data['alertsuccess']="amenity  created Successfully.";
			$data['table']=$this->amenity_model->viewamenity();
			$data['redirect']="site/viewamenity";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewamenity()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->amenity_model->viewamenity();
		$data['page']='viewamenity';
		$data['title']='View amenity';
		$this->load->view('template',$data);
	}
	function editamenity()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->amenity_model->beforeeditamenity($this->input->get('id'));
		$data['page']='editamenity';
		$data['title']='Edit amenity';
		$this->load->view('template',$data);
	}
	function editamenitysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->amenity_model->beforeeditamenity($this->input->post('id'));
			$data['page']='editamenity';
			$data['title']='Edit amenity';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = '*';
			$this->load->library('upload', $config);
			$filename="image1";
			$icon="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$icon=$uploaddata['file_name'];
			}
			if($this->amenity_model->editamenity($id,$name,$icon)==0)
			$data['alerterror']="amenity Editing was unsuccesful";
			else
			$data['alertsuccess']="amenity edited Successfully.";
			$data['table']=$this->amenity_model->viewamenity();
			$data['redirect']="site/viewamenity";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	function deleteamenity()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->amenity_model->deleteamenity($this->input->get('id'));
		$data['table']=$this->amenity_model->viewamenity();
		$data['alertsuccess']="amenity Deleted Successfully";
		$data['page']='viewamenity';
		$data['title']='View amenity';
		$this->load->view('template',$data);
	}
	//builder
	public function createbuilder()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createbuilder';
		$data[ 'title' ] = 'Create builder';
		$this->load->view( 'template', $data );	
	}
	function createbuildersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('contact','Contact','trim|required');
        $this->form_validation->set_rules('website','Website','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('description','description','trim|');
		
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createbuilder';
			$data[ 'title' ] = 'Create builder';
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
            $contact=$this->input->post('contact');
            $website=$this->input->post('website');
            $email=$this->input->post('email');
			$description=$this->input->post('description');
			if($this->builder_model->createbuilder($name,$description,$contact,$website,$email)==0)
			$data['alerterror']="New builder could not be created.";
			else
			$data['alertsuccess']="builder  created Successfully.";
			$data['table']=$this->builder_model->viewbuilder();
			$data['redirect']="site/viewbuilder";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewbuilder()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->builder_model->viewbuilder();
		$data['page']='viewbuilder';
		$data['title']='View builder';
		$this->load->view('template',$data);
	}
	function editbuilder()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->builder_model->beforeeditbuilder($this->input->get('id'));
		$data['page']='editbuilder';
		$data['page2']='block/builderblock';
		$data['title']='Edit builder';
		$this->load->view('template',$data);
	}
	function editbuildersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
        
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('contact','Contact','trim|required');
        $this->form_validation->set_rules('website','Website','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('description','description','trim|');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->builder_model->beforeeditbuilder($this->input->post('id'));
			$data['page2']='block/builderblock';
			$data['page']='editbuilder';
			$data['title']='Edit builder';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
            $contact=$this->input->post('contact');
            $website=$this->input->post('website');
            $email=$this->input->post('email');
			$description=$this->input->post('description');
            if($this->builder_model->editbuilder($id,$name,$description,$contact,$website,$email)==0)
			$data['alerterror']="builder Editing was unsuccesful";
			else
			$data['alertsuccess']="builder edited Successfully.";
			$data['table']=$this->builder_model->viewbuilder();
			$data['redirect']="site/viewbuilder";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function deletebuilder()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->builder_model->deletebuilder($this->input->get('id'));
		$data['table']=$this->builder_model->viewbuilder();
		$data['alertsuccess']="builder Deleted Successfully";
		$data['page']='viewbuilder';
		$data['title']='View builder';
		$this->load->view('template',$data);
	}
	function uploadbuilderimage()
	{
		$access = array("1");
		$this->checkaccess($access);
		$id=$this->input->get('id');
		$data['table']=$this->builder_model->viewallimages($id);
		$data['before']=$this->builder_model->beforeeditbuilder($id);
		$data['page']='uploadbuilderimage';
		$data['page2']='block/builderblock';
		$data['title']='Upload Image';
		$this->load->view('template',$data);
	}
	function uploadbuilderimagesubmit()
	 {
		$access = array("1");
		$this->checkaccess($access);
		$config[ 'upload_path' ]   = './uploads/';
		$config[ 'allowed_types' ] = 'gif|jpg|png|jpeg';
		$config[ 'encrypt_name' ]  = TRUE;
		$this->load->library( 'upload', $config );
		if(!$this->upload->do_upload( 'image'))
		{
			$data['alerterror'] = "Image Uploaded Unsuccessfully.";
			$data['table']=$this->builder_model->viewallimages($id);
			$data['before']=$this->builder_model->beforeeditbuilder($this->input->get('id'));
			$data['page']='uploadbuilderimage';
			$data['page2']='block/builderblock';
			$data['title']='Image Upload';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->get('id');
			$uploaddata  = $this->upload->data();
			$this->builder_model->addimage($id,$uploaddata);
			$data['alertsuccess']="Image Uploaded Successfully.";
			$data['before']=$this->builder_model->beforeeditbuilder($this->input->get('id'));
			$data['table']=$this->builder_model->viewallimages($id);
			$data['page']='uploadbuilderimage';
			$data['title']='Image Upload';
			//$this->load->view('template',$data);
			$data['redirect']="site/uploadbuilderimage?id=$id";
			//$data['other']="template=$template";
			$this->load->view("redirect2",$data);
		}
	 }
	 function deleteimage1()
	 {
		$access = array("1");
		$this->checkaccess($access);
		$id=$this->input->get('id');
		$imageid=$this->input->get('imageid');
		$this->builder_model->deleteimage($imageid,$id);
		$data['alertsuccess']="Image Deleted Successfully.";
		$data['before']=$this->builder_model->beforeeditbuilder($this->input->get('id'));
		$data['table']=$this->builder_model->viewallimages($id);
		$data['page']='uploadbuilderimage';
		$data['page2']='block/builderblock';
		$data['title']='Image Upload';
		$this->load->view('template',$data);
	 
	 }
	 
	
	//Wishlist
	function wishlistsubmit()
	{
		$this->checkaccess($access);
		$user=$this->input->post('user');
		$property=$this->input->post('property');
		if($this->wishlist_model->wishlistsubmit($user,$property)==0)
		$data['message']="0";
		else
		$data['message']="1";
		
		$this->load->view('json',$data);
	}
	/*function viewwishlist()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->wishlist_model->viewwishlist();
		$data['page']='viewwishlist';
		$data['title']='View Wishlist';
		$this->load->view('template',$data);
	}*/
	function viewuserwishlist()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->wishlist_model->viewuserwishlist($this->input->get('id'));
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='viewuserwishlist';
		$data['page2']='block/userblock';
		$data['title']='View Wishlist';
		$this->load->view('template',$data);
	}
	function viewpropertywishlist()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->wishlist_model->viewpropertywishlist($this->input->get('id'));
		$data['before']=$this->property_model->beforeeditproperty($this->input->get('id'));
		$data['page']='viewpropertywishlist';
		$data['page2']='block/propertyblock';
		$data['title']='View Wishlist';
		$this->load->view('template',$data);
	}
	
	function viewpropertycomment()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->property_model->viewpropertycomment($this->input->get('id'));
		$data['before']=$this->property_model->beforeeditproperty($this->input->get('id'));
		$data['page']='viewpropertycomment';
		$data['page2']='block/propertyblock';
		$data['title']='View Wishlist';
		$this->load->view('template',$data);
	}
	
    function viewoffers()
    {
        $access = array("1");
        $this->checkaccess($access);
        $data['table']=$this->wishlist_model->viewoffers();
        $data['page']='viewoffers';
        $this->load->view('template',$data);
    }
    
    function viewcontact()
    {
        $access = array("1");
        $this->checkaccess($access);
        $data['table']=$this->wishlist_model->viewcontact();
        $data['page']='viewcontact';
        $this->load->view('template',$data);   
    }
	
	/*
	//celebcorner
	public function createcelebcorner()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->celebcorner_model->getstatusdropdown();
		$data[ 'page' ] = 'createcelebcorner';
		$data[ 'title' ] = 'Create celebcorner';
		$this->load->view( 'template', $data );	
	}
	function createcelebcornersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('link','link','trim|');
		$this->form_validation->set_rules('target','target','trim|');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('order','order','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->celebcorner_model->getstatusdropdown();
			$data[ 'page' ] = 'createcelebcorner';
			$data[ 'title' ] = 'Create celebcorner';
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			$link=$this->input->post('link');
			$target=$this->input->post('target');
			$status=$this->input->post('status');
			$order=$this->input->post('order');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
			}
			
			if($this->celebcorner_model->createcelebcorner($name,$link,$target,$status,$order,$image)==0)
			$data['alerterror']="New celebcorner could not be created.";
			else
			$data['alertsuccess']="celebcorner  created Successfully.";
			$data['table']=$this->celebcorner_model->viewcelebcorner();
			$data['redirect']="site/viewcelebcorner";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewcelebcorner()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->celebcorner_model->viewcelebcorner();
		$data['page']='viewcelebcorner';
		$data['title']='View celebcorner';
		$this->load->view('template',$data);
	}
	function editcelebcorner()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->celebcorner_model->beforeeditcelebcorner($this->input->get('id'));
		$data[ 'status' ] =$this->celebcorner_model->getstatusdropdown();
		$data['page']='editcelebcorner';
		$data['title']='Edit celebcorner';
		$this->load->view('template',$data);
	}
	function editcelebcornersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('link','link','trim|');
		$this->form_validation->set_rules('target','target','trim|');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('order','order','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->celebcorner_model->getstatusdropdown();
			$data['before']=$this->celebcorner_model->beforeeditcelebcorner($this->input->post('id'));
			$data['page']='editcelebcorner';
			$data['title']='Edit celebcorner';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			$link=$this->input->post('link');
			$target=$this->input->post('target');
			$status=$this->input->post('status');
			$order=$this->input->post('order');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
			}
			if($this->celebcorner_model->editcelebcorner($id,$name,$link,$target,$status,$order,$image)==0)
			$data['alerterror']="celebcorner Editing was unsuccesful";
			else
			$data['alertsuccess']="celebcorner edited Successfully.";
			$data['table']=$this->celebcorner_model->viewcelebcorner();
			$data['redirect']="site/viewcelebcorner";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	function deletecelebcorner()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->celebcorner_model->deletecelebcorner($this->input->get('id'));
		$data['table']=$this->celebcorner_model->viewcelebcorner();
		$data['alertsuccess']="celebcorner Deleted Successfully";
		$data['page']='viewcelebcorner';
		$data['title']='View celebcorner';
		$this->load->view('template',$data);
	}*/
	
    //video
    
	function viewvideo()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->video_model->viewvideo();
		$data['page']='viewvideo';
		$data['title']='View video';
		$this->load->view('template',$data);
	}
	public function createvideo()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createvideo';
		$data[ 'title' ] = 'Create video';
		$this->load->view( 'template', $data );	
	}
    function createvideosubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('youtube','youtube','trim|required');
		$this->form_validation->set_rules('description','description','trim|required');
		$this->form_validation->set_rules('order','order','trim|required');
		
		
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createvideo';
			$data[ 'title' ] = 'Create video';
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			$youtube=$this->input->post('youtube');
			$description=$this->input->post('description');
			$order=$this->input->post('order');
			if($this->video_model->createvideo($name,$youtube,$description,$order)==0)
			$data['alerterror']="New video could not be created.";
			else
			$data['alertsuccess']="video  created Successfully.";
			$data['table']=$this->video_model->viewvideo();
			$data['redirect']="site/viewvideo";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    function editvideo()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->video_model->beforeeditvideo($this->input->get('id'));
		$data['page']='editvideo';
		$data['title']='Edit video';
		$this->load->view('template',$data);
	}
	function editvideosubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('youtube','youtube','trim|required');
		$this->form_validation->set_rules('description','description','trim|required');
		$this->form_validation->set_rules('order','order','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->video_model->beforeeditvideo($this->input->post('id'));
			$data['page']='editvideo';
			$data['title']='Edit video';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			$youtube=$this->input->post('youtube');
			$description=$this->input->post('description');
			$order=$this->input->post('order');
			if($this->video_model->editvideo($id,$name,$youtube,$description,$order)==0)
			$data['alerterror']="video Editing was unsuccesful";
			else
			$data['alertsuccess']="video edited Successfully.";
			$data['redirect']="site/viewvideo";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function deletevideo()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->video_model->deletevideo($this->input->get('id'));
		$data['table']=$this->video_model->viewvideo();
		$data['alertsuccess']="video Deleted Successfully";
		$data['page']='viewvideo';
		$data['title']='View video';
		$this->load->view('template',$data);
	}
    //banner
    function viewbanner()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->banner_model->viewbanner();
		$data['page']='viewbanner';
		$data['title']='View banner';
		$this->load->view('template',$data);
	}
    public function createbanner()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createbanner';
		$data[ 'title' ] = 'Create banner';
		$this->load->view( 'template', $data );	
	}
    function createbannersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		//$this->form_validation->set_rules('url','url','trim|required');
		$this->form_validation->set_rules('order','order','trim|required');
		
		
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createbanner';
			$data[ 'title' ] = 'Create banner';
			$this->load->view('template',$data);
		}
		else
		{
            //print_r($_POST);
			$name=$this->input->post('name');
//			$url=$this->input->post('url');
			$order=$this->input->post('order');
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="url";
			$url="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$url=$uploaddata['file_name'];
			}
            //echo $url;
			if($this->banner_model->createbanner($name,$url,$order)==0)
			$data['alerterror']="New banner could not be created.";
			//else
			$data['alertsuccess']="banner  created Successfully.";
			$data['table']=$this->banner_model->viewbanner();
			$data['redirect']="site/viewbanner";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    function editbanner()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->banner_model->beforeeditbanner($this->input->get('id'));
		$data['page']='editbanner';
		$data['title']='Edit banner';
		$this->load->view('template',$data);
	}
	function editbannersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
//		$this->form_validation->set_rules('url','url','trim|required');
		$this->form_validation->set_rules('order','order','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->banner_model->beforeeditbanner($this->input->post('id'));
			$data['page']='editbanner';
			$data['title']='Edit banner';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
//			$url=$this->input->post('url');
			$order=$this->input->post('order');
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="url";
			$url="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$url=$uploaddata['file_name'];
			}
            if($url=="")
            {
            $url=$this->banner_model->geturlbyid($id);
               // print_r($url);
                $url=$url->url;
            }
//            echo $url;
			if($this->banner_model->editbanner($id,$name,$url,$order)==0)
			$data['alerterror']="banner Editing was unsuccesful";
			else
			$data['alertsuccess']="banner edited Successfully.";
			$data['redirect']="site/viewbanner";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function deletebanner()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->banner_model->deletebanner($this->input->get('id'));
		$data['table']=$this->banner_model->viewbanner();
		$data['alertsuccess']="banner Deleted Successfully";
		$data['page']='viewbanner';
		$data['title']='View banner';
		$this->load->view('template',$data);
	}
    
    //footerlink
    
	function viewfooterlink()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->footerlink_model->viewfooterlink();
		$data['page']='viewfooterlink';
		$data['title']='View footerlink';
		$this->load->view('template',$data);
	}
	public function createfooterlink()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['position']=$this->footerlink_model->getpositiondropdown();
		$data['type']=$this->footerlink_model->gettypedropdown();
		$data[ 'page' ] = 'createfooterlink';
		$data[ 'title' ] = 'Create footerlink';
		$this->load->view( 'template', $data );	
	}
    function createfooterlinksubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('url','url','trim|required');
		$this->form_validation->set_rules('title','title','trim|required');
		$this->form_validation->set_rules('order','order','trim|required');
		$this->form_validation->set_rules('position','position','trim|required');
		$this->form_validation->set_rules('type','type','trim|required');
		
		
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $data['position']=$this->footerlink_model->getpositiondropdown();
            $data['type']=$this->footerlink_model->gettypedropdown();
			$data[ 'page' ] = 'createfooterlink';
			$data[ 'title' ] = 'Create footerlink';
			$this->load->view('template',$data);
		}
		else
		{
			$url=$this->input->post('url');
			$title=$this->input->post('title');
			$order=$this->input->post('order');
			$position=$this->input->post('position');
			$type=$this->input->post('type');
			if($this->footerlink_model->createfooterlink($title,$url,$order,$position,$type)==0)
			$data['alerterror']="New footerlink could not be created.";
			else
			$data['alertsuccess']="footerlink  created Successfully.";
			$data['table']=$this->footerlink_model->viewfooterlink();
			$data['redirect']="site/viewfooterlink";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    function editfooterlink()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['position']=$this->footerlink_model->getpositiondropdown();
		$data['type']=$this->footerlink_model->gettypedropdown();
		$data['before']=$this->footerlink_model->beforeeditfooterlink($this->input->get('id'));
		$data['page']='editfooterlink';
		$data['title']='Edit footerlink';
		$this->load->view('template',$data);
	}
	function editfooterlinksubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('url','url','trim|required');
		$this->form_validation->set_rules('title','title','trim|required');
		$this->form_validation->set_rules('order','order','trim|required');
		$this->form_validation->set_rules('position','position','trim|required');
		$this->form_validation->set_rules('type','type','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $data['position']=$this->footerlink_model->getpositiondropdown();
            $data['type']=$this->footerlink_model->gettypedropdown();
			$data['before']=$this->footerlink_model->beforeeditfooterlink($this->input->post('id'));
			$data['page']='editfooterlink';
			$data['title']='Edit footerlink';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$title=$this->input->post('title');
			$url=$this->input->post('url');
			$order=$this->input->post('order');
			$position=$this->input->post('position');
			$type=$this->input->post('type');
			if($this->footerlink_model->editfooterlink($id,$title,$url,$order,$position,$type)==0)
			$data['alerterror']="footerlink Editing was unsuccesful";
			else
			$data['alertsuccess']="footerlink edited Successfully.";
			$data['redirect']="site/viewfooterlink";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function deletefooterlink()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->footerlink_model->deletefooterlink($this->input->get('id'));
		$data['table']=$this->footerlink_model->viewfooterlink();
		$data['alertsuccess']="footerlink Deleted Successfully";
		$data['page']='viewfooterlink';
		$data['title']='View footerlink';
		$this->load->view('template',$data);
	}
    //page
    
	function viewpage()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->page_model->viewpage();
		$data['page']='viewpage';
		$data['title']='View Page';
		$this->load->view('template',$data);
	}
	public function createpage()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createpage';
		$data[ 'title' ] = 'Create page';
		$this->load->view( 'template', $data );	
	}
    function createpagesubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('title','title','trim|required');
		$this->form_validation->set_rules('text','text','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createpage';
			$data[ 'title' ] = 'Create page';
			$this->load->view('template',$data);
		}
		else
		{
			$title=$this->input->post('title');
			$text=$this->input->post('text');
			if($this->page_model->createpage($title,$text)==0)
			$data['alerterror']="New page could not be created.";
			else
			$data['alertsuccess']="page  created Successfully.";
			$data['table']=$this->page_model->viewpage();
			$data['redirect']="site/viewpage";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    function editpage()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->page_model->beforeeditpage($this->input->get('id'));
		$data['page']='editpage';
		$data['title']='Edit page';
		$this->load->view('template',$data);
	}
	function editpagesubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('title','title','trim|required');
		$this->form_validation->set_rules('text','text','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->page_model->beforeeditpage($this->input->post('id'));
			$data['page']='editpage';
			$data['title']='Edit page';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$title=$this->input->post('title');
			$text=$this->input->post('text');
			if($this->page_model->editpage($id,$title,$text)==0)
			$data['alerterror']="page Editing was unsuccesful";
			else
			$data['alertsuccess']="page edited Successfully.";
			$data['redirect']="site/viewpage";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function deletepage()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->page_model->deletepage($this->input->get('id'));
		$data['table']=$this->page_model->viewpage();
		$data['alertsuccess']="page Deleted Successfully";
		$data['page']='viewpage';
		$data['title']='View page';
		$this->load->view('template',$data);
	}
    
    //constructionupdate
    
    function viewconstructionupdate()
	{
		$access = array("1");
		$this->checkaccess($access);
        $propertyid=$this->input->get('id');
        $data['propertyid']=$propertyid;
		$data['before']=$this->property_model->beforeeditproperty($this->input->get('id'));
		$data['table']=$this->property_model->viewconstructionupdatebyproperty($propertyid);
		$data['page']='viewconstructionupdate';
		$data['page2']='block/propertyblock';
        $data['title']='View Construction Update Image';
		$this->load->view('templatewith2',$data);
	}
    
    
    
    public function createconstructionupdate()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createconstructionupdate';
		$data[ 'title' ] = 'Create Construction Update';
		$data[ 'propertyid' ] = $this->input->get('id');
//        $data['property']=$this->constructionupdate_model->getpropertydropdown();
		$this->load->view( 'template', $data );	
	}
    function createconstructionupdatesubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('property','property','trim|required');

		if($this->form_validation->run() == FALSE)	
		{
            
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createconstructionupdate';
            $data[ 'title' ] = 'Create Construction Update';
            $data[ 'propertyid' ] = $this->input->get('id');
    //        $data['property']=$this->constructionupdate_model->getpropertydropdown();
            $this->load->view( 'template', $data );		
		}
		else
		{
			$property=$this->input->post('property');
			$order=$this->input->post('order');
           
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            
            
            if($this->property_model->createconstructorupdate($property,$image,$order)==0)
               $data['alerterror']="New Construction Update could not be created.";
            else
               $data['alertsuccess']="Construction Update created Successfully.";
			
			$data['redirect']="site/viewconstructionupdate?id=".$property;
			$this->load->view("redirect2",$data);
		}
	}
    
    function editconstructionupdate()
	{
		$access = array("1");
		$this->checkaccess($access);
        $propertyid=$this->input->get('id');
        $data['propertyid']=$propertyid;
        $constructionupdateid=$this->input->get('constructionupdateid');
		$data['before']=$this->property_model->beforeeditconstructionupdate($this->input->get('constructionupdateid'));
//        $data['property']=$this->property_model->getpropertydropdown();
		$data['page']='editconstructionupdate';
		$data['title']='Edit constructionupdate';
		$this->load->view('template',$data);
	}
	function editconstructionupdatesubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
        
		$this->form_validation->set_rules('property','property','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $propertyid=$this->input->post('property');
            $propertyimageid=$this->input->post('propertyimageid');
            $data['propertyid']=$propertyid;
			$data['before']=$this->propertyimage_model->beforeedit($this->input->post('propertyimageid'));
            $data['property']=$this->propertyimage_model->getpropertydropdown();
//			$data['page2']='block/eventblock';
			$data['page']='editpropertyimage';
			$data['title']='Edit propertyimage';
			$this->load->view('template',$data);
		}
		else
		{
            
			$id=$this->input->post('constructionupdateid');
            $property=$this->input->post('property');
            $order=$this->input->post('order');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            if($image=="")
            {
                $image=$this->property_model->getconstructionupdatebyid($id);
                $image=$image->image;
            }
            
			if($this->property_model->editconstructionupdate($id,$property,$image,$order)==0)
			$data['alerterror']="constructionupdate Editing was unsuccesful";
			else
			$data['alertsuccess']="constructionupdate edited Successfully.";
			
			$data['redirect']="site/viewconstructionupdate?id=".$property;
			$this->load->view("redirect",$data);
			
		}
	}
    
	function deleteconstructionupdate()
	{
		$access = array("1");
		$this->checkaccess($access);
        $propertyid=$this->input->get('id');
        $constructionupdateid=$this->input->get('constructionupdateid');
		$this->property_model->deleteconstructionupdate($this->input->get('constructionupdateid'));
		$data['alertsuccess']="constructionupdate Deleted Successfully";
		$data['redirect']="site/viewconstructionupdate?id=".$propertyid;
		$this->load->view("redirect",$data);
	}
    
    
    public function addbrochure()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'addbrochure';
		$data[ 'title' ] = ' Brochure';
		$data['before']=$this->property_model->beforeeditproperty($this->input->get('id'));
		$data[ 'propertyid' ] = $this->input->get('id');
		$this->load->view( 'template', $data );	
	}
    function addbrochuresubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('property','property','trim|required');

		if($this->form_validation->run() == FALSE)	
		{
            
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'addbrochure';
            $data[ 'title' ] = 'Brochure';
            $data['before']=$this->property_model->beforeeditproperty($this->input->get('id'));
            $data[ 'propertyid' ] = $this->input->get_post('id');
            $this->load->view( 'template', $data );		
		}
		else
		{
			$property=$this->input->post('property');
           
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'pdf|doc|docx';
			$this->load->library('upload', $config);
			$filename="brochure";
			$brochure="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$brochure=$uploaddata['file_name'];
			}
            
            if($brochure=="")
            {
                $brochure=$this->property_model->getbrochurebyid($property);
                $brochure=$brochure->brochure;
            }
            //echo $brochure;
            if($this->property_model->addbrochure($property,$brochure)==0)
               $data['alerterror']="New Brochure could not be Added.";
            else
               $data['alertsuccess']="Brochure added Successfully.";
			
			$data['redirect']="site/editproperty?id=".$property;
			$this->load->view("redirect2",$data);
		}
	}
    
}
?>