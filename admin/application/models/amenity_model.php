<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Amenity_model extends CI_Model
{
	//amenity
	public function createamenity($name,$icon)
	{
		$data  = array(
			'name' => $name,
			'icon' => $icon,
		);
		$query=$this->db->insert( 'amenity', $data );
		if($query)
		{
			$id=$this->db->insert_id();
			//$this->savelog($id,"amenity Created");
		}
		return  1;
	}
	function viewamenity()
	{
		$query=$this->db->query("SELECT `amenity`.`id`,`amenity`.`name`,`amenity`.`icon` FROM `amenity` 
		ORDER BY `amenity`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditamenity( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'amenity' )->row();
		return $query;
	}
	
	public function editamenity( $id,$name,$icon)
	{
		$data = array(
			'name' => $name,
			
		);
		if($icon != "")
			$data['icon']=$icon;
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'amenity', $data );
		if($query)
		{
			//$this->savelog($id,"amenity Edited");
		}
		return 1;
	}
	function deleteamenity($id)
	{
		$query=$this->db->query("DELETE FROM `amenity` WHERE `id`='$id'");
		if($query)
		{
			//$this->savelog($id,"amenity Deleted");
		}
	}
	public function getamenitydropdown()
	{
		$query=$this->db->query("SELECT * FROM `amenity`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	
	
}
?>