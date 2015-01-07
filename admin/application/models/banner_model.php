<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Banner_model extends CI_Model
{
	//page
	public function createbanner($name,$url,$order)
	{
		$data  = array(
			'name' => $name,
			'url' => $url,
			'order' => $order
		);
		$query=$this->db->insert( 'banner', $data );
		return  1;
	}
    public function geturlbyid($id)
	{
		$query=$this->db->query("SELECT `url` FROM `banner` WHERE `id`='$id'")->row();
		
		
		return $query;
	}
	function viewbanner()
	{
		$query=$this->db->query("SELECT `banner`.`id`,`banner`.`name`,`banner`.`url`,`banner`.`order` FROM `banner` 
		ORDER BY `banner`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditbanner( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'banner' )->row();
		return $query;
	}
	
	public function editbanner( $id,$name,$url,$order)
	{
		$data = array(
			'name' => $name,
			'url' => $url,
			'order' => $order
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'banner', $data );
		return 1;
	}
	function deletebanner($id)
	{
		$query=$this->db->query("DELETE FROM `banner` WHERE `id`='$id'");
	}
	public function getbannerdropdown()
	{
		$query=$this->db->query("SELECT * FROM `banner`  ORDER BY `id` ASC")->result();
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