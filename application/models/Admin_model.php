<?php 

class Admin_model extends CI_model
{
	public function login($email,$password)
	{
		return  $this->db->get_where('admin', array('email' => $email,'password'=>$password));
	}
	public function addBlogCategory($data)
	{
		return $this->db->insert('blog_category',$data);
	}
	public function blogCategoryList($cat_id='')
	{
		if($cat_id)
		{
			return $this->db->get_where('blog_category',array('cat_id'=>$cat_id))->result();
		}
		else
		{
		$this->db->order_by('cat_id','DESC');
		return $this->db->get('blog_category')->result();
		}
		
	}
	public function delete_blog_category($cat_id)
	{
		return $this->db->delete('blog_category',array('cat_id'=>$cat_id));
	}
	public function update_blog_category($cat_id,$data)
	{
		$this->db->where('cat_id',$cat_id);
		return $this->db->update('blog_category',$data);
	}
	public function add_blog($data)
	{
		return $this->db->insert('blog',$data);
	}
	public function getBlogList($id='')
	{
		if($id)
		{
			return $this->db->get_where('blog',array('id'=>$id))->result();
		}
		else
		{
			$this->db->order_by('id','DESC');
			return $this->db->get('blog')->result();
		}
	}
	public function delete_blog($id)
	{
		return $this->db->delete('blog',array('id'=>$id));
	}
	public function update_blog($data,$id)
	{
		$this->db->where('id',$id);
		return $this->db->update('blog',$data);
	}
	public function enquiry()
	{
		$this->db->order_by('id','desc');
		return $this->db->get('enquiry')->result();
	}
	public function delete_enquiry($id)
	{
		return $this->db->delete('enquiry',array('id'=>$id));
	}
	public function quote()
	{
		$this->db->order_by('id','desc');
		return $this->db->get('quote')->result();
	}
	public function delete_quote($id)
	{
		return $this->db->delete('quote',array('id'=>$id));
	}
	public function checkpassword($username,$password)
 	{
 		return $this->db->get_where('admin', array('email' => $username,'password'=>$password));
 	}
 	public function changepassword($username,$newpassword)
 	{
 		$this->db->where('email', $username);
		return $this->db->update('admin', array('password' => $newpassword));
 	}
 	public function get_enquiryform()
 	{
 		$this->db->order_by('id','DESC');
 		return $this->db->get('enquiryform')->result();
 	}
 	public function delete_enquiryform($id)
 	{
 		return $this->db->delete('enquiryform',array('id'=>$id));
 	}
 	public function hiring($id='')
	 {
 	if($id)
 	{
 		return $this->db->get_where('hiring',array('id'=>$id))->result();
 	}
	 $this->db->order_by('id','DESC');
	 return $this->db->get('hiring')->result();
	 }
	 public  function delete_hiring($id)
	 {
	 	return $this->db->delete('hiring',array('id'=>$id));
	 }
	 public function add_team($data)
	 {
	 	return $this->db->insert('team',$data);
	 }
	 public function get_team($id='')
	 {
	 	if($id)
	 	{
	 		return $this->db->get_where('team',array('id'=>$id))->result();
	 	}
	 	else{
	 		$this->db->order_by('id','DESC');
	 		return $this->db->get('team')->result();
	 	}
	 }
	 public function delete_team($id)
	 {
	 	return $this->db->delete('team',array('id'=>$id));
	 }
	 public function update_team($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->update('team',$data);
	 }
}

?>