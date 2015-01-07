<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Video_model extends CI_Model
{
	//page
	public function createvideo($name,$youtube,$description,$order)
	{
		$data  = array(
			'name' => $name,
			'youtube' => $youtube,
			'description' => $description,
			'order' => $order
		);
		$query=$this->db->insert( 'video', $data );
		return  1;
	}
	function viewvideo()
	{
		$query=$this->db->query("SELECT `video`.`id`,`video`.`name`,`video`.`youtube`,`video`.`description`,`video`.`order` FROM `video` 
		ORDER BY `video`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditvideo( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'video' )->row();
		return $query;
	}
	
	public function editvideo( $id,$name,$youtube,$description,$order)
	{
		$data = array(
			'name' => $name,
			'youtube' => $youtube,
			'description' => $description,
			'order' => $order
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'video', $data );
		return 1;
	}
	function deletevideo($id)
	{
		$query=$this->db->query("DELETE FROM `video` WHERE `id`='$id'");
	}
	public function getvideodropdown()
	{
		$query=$this->db->query("SELECT * FROM `video`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	
	public function getallvideos()
	{
		$query=$this->db->query("SELECT * FROM `video`  ORDER BY `order` ASC")->result();
		
		
		return $query;
	}
}
?>