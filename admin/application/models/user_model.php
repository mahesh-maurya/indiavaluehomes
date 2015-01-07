<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class User_model extends CI_Model
{
	protected $id,$username ,$password;
	public function validate($username,$password )
	{
		
		$password=md5($password);
		$query ="SELECT `id`,`name`,`email`,`accesslevel`,`builderid` FROM `user` WHERE `email` LIKE '$username' AND `password` LIKE '$password' AND `status`=1 AND `accesslevel` IN (1,2,3) ";
		$row =$this->db->query( $query );
		if ( $row->num_rows() > 0 ) {
			$row=$row->row();
			$this->id       = $row->id;
			$this->name = $row->name;
			$this->email = $row->email;
			$newdata        = array(
				'id' => $this->id,
				'email' => $this->email,
				'name' => $this->name ,
				'accesslevel' => $row->accesslevel ,
				'builderid' => $row->builderid ,
				'logged_in' => 'true'
			);
			$this->session->set_userdata( $newdata );
			return true;
		} //count( $row_array ) == 1
		else
			return false;
	}
	
	public function create($name,$dob,$password,$accesslevel,$email,$contactno,$status,$builder)
	{ 
		$data  = array(
			'password' =>md5($password),
			'name' => $name,
			'dob' => $dob,
			'accesslevel' => $accesslevel,
			'email' => $email,
			'contactno' => $contactno,
			'status' =>$status,
			'builderid' =>$builder
			
		);
		
		$query=$this->db->insert( 'user', $data );
		$id=$this->db->insert_id();
		if($query)
		{
			$this->saveuserlog($id,'User Created');
		}
		if(!$query)
			return  0;
		else
			return  1;
	}
	function viewusers()
	{
		$query="SELECT `user`.`id` as `id`,`user`.`name` as `name`,`user`.`email`,`user`.`contactno`,`user`.`status` as `status`,`accesslevel`.`name` as `accesslevel`,`country`.`name` as `country`,`user`.`city` FROM `user`
		LEFT OUTER JOIN `accesslevel` ON `user`.`accesslevel` = `accesslevel`.`id` 
		LEFT OUTER JOIN `country` ON `user`.`country` = `country`.`id` 
		ORDER BY `user`.`id` ASC";
	   
		$query=$this->db->query($query)->result();
		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'user' )->row();
		return $query;
	}
	
	public function edit($id,$name,$dob,$password,$accesslevel,$email,$contactno,$status)
	{
		$data  = array(
			'name' => $name,
			'dob' => $dob,
			'accesslevel' => $accesslevel,
			'email' => $email,
			'contactno' => $contactno,
			'status' =>$status,
		);
		if($password != "")
			$data['password']=md5($password);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'user', $data );
		if($query)
		{
			$this->saveuserlog($id,'User Details Edited');
			
		}
		return 1;
	}
	function deleteuser($id)
	{
		$query=$this->db->query("DELETE FROM `user` WHERE `id`='$id'");
	}
	function changepassword($id,$password)
	{
		$data  = array(
			'password' =>md5($password),
		);
		$this->db->where('id',$id);
		$query=$this->db->update( 'user', $data );
		if(!$query)
			return  0;
		else
			return  1;
	}
	public function getaccesslevels()
	{
		$return=array();
		$query=$this->db->query("SELECT * FROM `accesslevel` ORDER BY `id` ASC")->result();
		$accesslevel=$this->session->userdata('accesslevel');
			foreach($query as $row)
			{
				if($accesslevel==1)
				{
					$return[$row->id]=$row->name;
				}
				else if($accesslevel==2)
				{
					if($row->id > $accesslevel)
					{
						$return[$row->id]=$row->name;
					}
				}
				else if($accesslevel==3)
				{
					if($row->id > $accesslevel)
					{
						$return[$row->id]=$row->name;
					}
				}
				else if($accesslevel==4)
				{
					if($row->id == $accesslevel)
					{
						$return[$row->id]=$row->name;
					}
				}
			}
	
		return $return;
	}
	function changestatus($id)
	{
		$query=$this->db->query("SELECT `status` FROM `user` WHERE `id`='$id'")->row();
		$status=$query->status;
		if($status==1)
		{
			$status=0;
		}
		else if($status==0)
		{
			$status=1;
		}
		$data  = array(
			'status' =>$status,
		);
		$this->db->where('id',$id);
		$query=$this->db->update( 'user', $data );
		if(!$query)
			return  0;
		else
			return  1;
	}
	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Enabled",
			 "0" => "Disabled",
			);
		return $status;
	}
	public function getcountry()
	{
		$query=$this->db->query("SELECT * FROM `country`  ORDER BY `name` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	function editaddress($id,$address,$city,$state,$country,$pincode)
	{
		$data  = array(
			'address' => $address,
			'city' => $city,
			'state' => $state,
			'country' => $country,
			'pincode' => $pincode,
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'user', $data );
		if($query)
		{
			$this->saveuserlog($id,'User Address Edited');
		}
		return 1;
	}
	
	function saveuserlog($id,$action)
	{
		$fromuser = $this->session->userdata('id');
		$data2  = array(
			'user' => $id,
			'fromuser' => $fromuser,
			'action' => $action,
		);
		$query2=$this->db->insert( 'userlog', $data2 );
	}
}
?>