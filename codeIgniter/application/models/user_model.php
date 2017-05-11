<?php if( ! defined('BASEPATH')) exit("No direct script access is Allowed .");
class User_Model extends CI_model // Before Class Public Not Allowed .
{
	public function _construct()
	{parent::_construct();} // Calling the Model Constructor .
	public function getFirstNames()
	{
		$query=$this->db->query('select username from mst_user');// return an objects when read type queries are run .
		if($query->num_rows() > 0 )
			{return $query->result();} // returns an array of objects.
		else 
			{return NULL;}
	}
	public function getUsers()
	{
		$query=$this->db->query('select * from mst_user');
		if($query->num_rows() > 0 )
			{return $query->result();} // returns an array of objects.
		else 
			{return NULL;}
	} 
}