<?php

class Home_model extends CI_model
{

	public function enquiryform($data)
	{
		return $this->db->insert('enquiryform',$data);
	}
	public function enquiry($data)
	{
		return $this->db->insert('enquiry',$data);
	}
}

?>