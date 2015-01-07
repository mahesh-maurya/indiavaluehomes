<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Builder_model extends CI_Model
{
	//builder
	public function createbuilder($name,$description,$contact,$website,$email)
	{
		$data  = array(
			'name' => $name,
			'description' => $description,
            'contact' => $contact,
            'website' => $website,
            'email' => $email,
		);
		$query=$this->db->insert( 'builder', $data );
		return  1;
	}
	function viewbuilder()
	{
		$query=$this->db->query("SELECT `builder`.`id`,`builder`.`name`,`builder`.`description` FROM `builder` 
		ORDER BY `builder`.`id` ASC")->result();
		return $query;
	}
	public function beforeeditbuilder( $id )
	{
		$this->db->where( 'id', $id );
		$query['builder']=$this->db->get( 'builder' )->row();
		return $query;
	}
	
    public function editbuilder( $id,$name,$description,$contact,$website,$email)
	{
		$data = array(
			'name' => $name,
			'description' => $description,
            'contact' => $contact,
            'website' => $website,
            'email' => $email,
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'builder', $data );
		return 1;
	}
	function deletebuilder($id)
	{
		$query=$this->db->query("DELETE FROM `builder` WHERE `id`='$id'");
	}
	public function getbuilderdropdown()
	{
		$query=$this->db->query("SELECT * FROM `builder`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	function viewallimages($id)
	{
		$query=$this->db->query(" SELECT `builderimage`.`id` as `id`, `builderimage`.`image` as `builderimage`,`builderimage`.`builder` as `builderid`  FROM `builderimage` WHERE `builderimage`.`builder`='$id' ")->result();
		return $query;
	}
	function addimage($id,$uploaddata)
	{
		$builderimage	= $uploaddata[ 'file_name' ];
		/*
		$path = $uploaddata[ 'full_path' ];
		$nextorder=$this->db->query("SELECT IFNULL(MAX(`order`)+1,0) AS `nextorder` FROM `builderimage` WHERE `property`='$id'")->row();
		$nextorder= $nextorder->nextorder;
		
		if($nextorder=="0")
		$isdefault="1";
		else
		$isdefault="0";*/
		$data  = array(
			'image' => $builderimage,
			'builder' => $id,
			);
		$query=$this->db->insert( 'builderimage', $data );
		
	}
	function deleteimage($builderimageid,$id)
	{
		$query=$this->db->query("DELETE FROM `builderimage` WHERE `builder`='$id' AND `id`='$builderimageid'");
		
	}
}
?>