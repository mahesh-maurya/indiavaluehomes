<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Json extends CI_Controller 
{
	
	function searchproperty()
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
}
?>