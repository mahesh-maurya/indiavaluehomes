<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Propertytype_model extends CI_Model
{
	//propertytype
	public function createpropertytype($name,$icon)
	{
		$data  = array(
			'name' => $name,
			'icon' => $icon,
		);
		$query=$this->db->insert( 'propertytype', $data );
		if($query)
		{
			$id=$this->db->insert_id();
			//$this->savelog($id,"propertytype Created");
		}
		return  1;
	}
	function viewpropertytype()
	{
		$query=$this->db->query("SELECT `propertytype`.`id`,`propertytype`.`name`,`propertytype`.`icon` FROM `propertytype` 
		ORDER BY `propertytype`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditpropertytype( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'propertytype' )->row();
		return $query;
	}
	
	public function editpropertytype( $id,$name,$icon)
	{
		$data = array(
			'name' => $name,
			
		);
		if($icon != "")
			$data['icon']=$icon;
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'propertytype', $data );
		if($query)
		{
			//$this->savelog($id,"propertytype Edited");
		}
		return 1;
	}
	function deletepropertytype($id)
	{
		$query=$this->db->query("DELETE FROM `propertytype` WHERE `id`='$id'");
		if($query)
		{
			//$this->savelog($id,"propertytype Deleted");
		}
	}
	public function getpropertytypedropdown()
	{
		$query=$this->db->query("SELECT * FROM `propertytype`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	public function getpropertytypedropdown2()
	{
		$query=$this->db->query("SELECT * FROM `propertytype`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => "PROPERTY TYPE"
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	function savelog($id,$action)
	{
		$user = $this->session->userdata('id');
		$data2  = array(
			'propertytype' => $id,
			'user' => $user,
			'action' => $action,
		);
		$query2=$this->db->insert( 'propertytypelog', $data2 );
	}
}
?>