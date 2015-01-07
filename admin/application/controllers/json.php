<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Json extends CI_Controller 
{
	
	function searchproperty()
	{
	
		/*$price=$this->input->get_post('price');
		$bedroom=$this->input->get_post('bedroom');*/
		$locality=$this->input->get_post('locality');
		$city=$this->input->get_post('city');
		$propertytype=$this->input->get_post('propertytype');
		
		$data["message"]=$this->property_model->searchproperty($locality,$city,$propertytype);
		$this->load->view("json",$data);
	}
	function searchpropertyold()
	{
		$price=$this->input->get_post('price');
		$bedroom=$this->input->get_post('bedroom');
		$locality=$this->input->get_post('locality');
		$city=$this->input->get_post('city');
		$propertytype=$this->input->get_post('propertytype');
		
		$data["message"]=$this->property_model->searchproperty($price,$bedroom,$locality,$city,$propertytype);
		$this->load->view("json",$data);
	}
	public function innerproperty( )
	{
		$property = $this->input->get_post('property');
		$data['message'] = $this->property_model->getcompleteproperty($property);
		$this->load->view( 'json',$data );
	}
	public function getallpropertytype( )
	{
		$data['message'] = $this->property_model->getallpropertytype();
		$this->load->view( 'json',$data );
	}
	public function getallcity( )
	{
		$data['message'] = $this->locator_model->getallcity();
		$this->load->view( 'json',$data );
	}
	
public function getshowallvideos( )
	{
	$query=$this->db->query("SELECT * FROM `video`  ORDER BY `order` ASC")->result();
		
		
		
		$data['message'] =$query;
		$this->load->view( 'json',$data );
	}
	
	public function getallvideos( )
	{
	$query=$this->db->query("SELECT * FROM `video`  ORDER BY `order` ASC LIMIT 0,2")->result();
		
		
		
		$data['message'] =$query;
		$this->load->view( 'json',$data );
	}
	
	public function getallcontentlinks( )
	{
		$data['message'] = $this->footerlink_model->getallcontentlinks();
		$this->load->view( 'json',$data );
	}
//	public function getallcity( )
//	{
//		$data['message'] = $this->state_model->getallcity();
//		$this->load->view( 'json',$data );
//	}
	
	public function getallcontentlinks1( )
	{
		$data['message'] = $this->footerlink_model->getallcontentlinks1();
		$this->load->view( 'json',$data );
	}
	public function getallcontentlinks2( )
	{
		$data['message'] = $this->footerlink_model->getallcontentlinks2();
		$this->load->view( 'json',$data );
	}
	public function getallcontentlinks3( )
	{
		$data['message'] = $this->footerlink_model->getallcontentlinks3();
		$this->load->view( 'json',$data );
	}
	public function getallcontentlinks4( )
	{
		$data['message'] = $this->footerlink_model->getallcontentlinks4();
		$this->load->view( 'json',$data );
	}
	
	public function getallpages( )
	{
		$data['message'] = $this->page_model->getallpages();
		$this->load->view( 'json',$data );
	}
	public function getonepage()
	{
        $id=$this->input->get_post("id");
		$data['message'] = $this->page_model->getonepage($id);
		$this->load->view( 'json',$data );
	}
	
    public function addtopropertywishlist()
    {

        $property=$this->input->get_post("property");
        $name=$this->input->get_post("name");
        $email=$this->input->get_post("email");
        $phone=$this->input->get_post("phone");
        $data["message"]=$this->wishlist_model->addpropertywishlist($property,$name,$email,$phone);
        $this->load->view("json",$data);
    }
    public function submitcontact()
    {

        $name=$this->input->get_post("name");
        $email=$this->input->get_post("email");
        $comment=$this->input->get_post("comment");
        $contact=$this->input->get_post("contact");

        $data["message"]=$this->wishlist_model->submitcontact($name,$email,$comment,$contact);
        $this->load->view("json",$data);
    }
    public function submitoffers()
    {

        $name=$this->input->get_post("name");
        $email=$this->input->get_post("email");
        $city=$this->input->get_post("city");
        $contact=$this->input->get_post("contact");
        
        $data["message"]=$this->wishlist_model->submitoffers($name,$email,$city,$contact);
        $this->load->view("json",$data);
    }
}
?>