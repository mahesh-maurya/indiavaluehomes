<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Footerlink_model extends CI_Model
{
	//page
	public function createfooterlink($title,$url,$order,$position,$type)
	{
		$data  = array(
			'title' => $title,
			'url' => $url,
			'order' => $order,
			'position' => $position,
			'type' => $type
		);
		$query=$this->db->insert( 'footerlink', $data );
		return  1;
	}
    public function geturlbyid($id)
	{
		$query=$this->db->query("SELECT `url` FROM `footerlink` WHERE `id`='$id'")->row();
		
		
		return $query;
	}
	function viewfooterlink()
	{
		$query=$this->db->query("SELECT `footerlink`.`id`,`footerlink`.`title`,`footerlink`.`url`,`footerlink`.`order`,`footerlink`.`position`,`footerlink`.`type`,`footerlink`.`timestamp` FROM `footerlink` 
		ORDER BY `footerlink`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditfooterlink( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'footerlink' )->row();
		return $query;
	}
	
	public function editfooterlink( $id,$title,$url,$order,$position,$type)
	{
		$data = array(
			'title' => $title,
			'url' => $url,
			'order' => $order,
			'position' => $position,
			'type' => $type
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'footerlink', $data );
		return 1;
	}
	function deletefooterlink($id)
	{
		$query=$this->db->query("DELETE FROM `footerlink` WHERE `id`='$id'");
	}
	public function getfooterlinkdropdown()
	{
		$query=$this->db->query("SELECT * FROM `footerlink`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
	public function getpositiondropdown()
	{
		$position= array(
			 "1" => "Left",
			 "2" => "Center",
			 "3" => "Right",
			 "4" => "Bottom"
			);
		return $position;
	}
	public function gettypedropdown()
	{
		$type= array(
			 "0" => "Internal",
			 "1" => "External"
			);
		return $type;
	}
	
	public function getallcontentlinks()
	{
		$query=$this->db->query("SELECT * FROM `footerlink`  ORDER BY `order` ASC")->result();
		return $query;
	}
	public function getallcontentlinks1()
	{
		$query=$this->db->query("SELECT * FROM `footerlink` WHERE `position`='1' ORDER BY `order` ASC")->result();
		return $query;
	}
	public function getallcontentlinks2()
	{
		$query=$this->db->query("SELECT * FROM `footerlink` WHERE `position`='2' ORDER BY `order` ASC")->result();
		return $query;
	}
	public function getallcontentlinks3()
	{
		$query=$this->db->query("SELECT * FROM `footerlink` WHERE `position`='3' ORDER BY `order` ASC")->result();
		return $query;
	}
	public function getallcontentlinks4()
	{
		$query=$this->db->query("SELECT * FROM `footerlink` WHERE `position`='4' ORDER BY `order` ASC")->result();
		return $query;
	}
}
?>