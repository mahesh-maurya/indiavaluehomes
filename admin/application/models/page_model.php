<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Page_model extends CI_Model
{
	//page
	public function createpage($title,$text)
	{
		$data  = array(
			'title' => $title,
			'content' => $text
		);
		$query=$this->db->insert( 'page', $data );
		return  1;
	}
    public function geturlbyid($id)
	{
		$query=$this->db->query("SELECT `url` FROM `page` WHERE `id`='$id'")->row();
		
		
		return $query;
	}
	function viewpage()
	{
		$query=$this->db->query("SELECT `id`, `title`, `content`, `timestamp` FROM `page`")->result();
		return $query;
	}
	public function beforeeditpage( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'page' )->row();
		return $query;
	}
	
	public function editpage( $id,$title,$text)
	{
		$data = array(
			'title' => $title,
			'content' => $text
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'page', $data );
		return 1;
	}
	function deletepage($id)
	{
		$query=$this->db->query("DELETE FROM `page` WHERE `id`='$id'");
	}
	public function getpagedropdown()
	{
		$query=$this->db->query("SELECT * FROM `page`  ORDER BY `id` ASC")->result();
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
	
	public function getallpages()
	{
		$query=$this->db->query("SELECT * FROM `page`")->result();
		
		
		return $query;
	}
	public function getonepage($id)
	{
		$query=$this->db->query("SELECT * FROM `page` WHERE `id`='$id'")->row();
		return $query;
	}
}
?>