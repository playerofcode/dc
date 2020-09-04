<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model','model');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$config=[
		 	'upload_path'=>'./upload/',
		 	'allowed_types'=>'gif|jpg|png|jpeg'
		 ];
		 $this->load->library('upload',$config);
	}
	public function index()
	{
		$this->load->view('admin/login');
	}
	public function login()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		if($this->model->login($email,$password)->num_rows()>0)
			{
				$this->session->set_userdata('email', $email);
		  	 	return redirect(base_url().'admin/dashboard');
			}
			else
			{
				$this->session->set_flashdata('msg', "Email/Password is incorrect. Try again");
  				return redirect(base_url().'admin/index');
			}

	}
	public function check_login()
	{
		if(empty($this->session->userdata('email')))
		{
		$this->session->set_flashdata('msg', "Please login to continue");
		redirect(base_url().'admin/index');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('msg', "Logged out successfully");
		return redirect(base_url().'admin/index');
	}
	public function dashboard()
	{
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}
	public function category()
	{
		$data['category_list']=$this->model->blogCategoryList();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/category',$data);
		$this->load->view('admin/footer');
	}
	public function add_blog_category()
	{

		$cat_name=$this->input->post('cat_name');
		$data=array(
			'cat_name'=>$cat_name
		);
		if($this->model->addBlogCategory($data))
		{
			$this->session->set_flashdata('msg','Category added successfully');
			return redirect(base_url().'admin/category');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/category');	
		}
	}
	public function delete_blog_category()
	{
		$cat_id=$this->uri->segment(3);
		if($this->model->delete_blog_category($cat_id))
			{
			$this->session->set_flashdata('msg','Category deleted successfully');
			return redirect(base_url().'admin/category');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/category');	
		}
	}
	public function edit_blog_category()
	{
		$cat_id=$this->uri->segment(3);
		$data['category']=$this->model->blogCategoryList($cat_id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_category',$data);
		$this->load->view('admin/footer');	
	}
	public function  update_blog_category()
	{
		$cat_id=$this->input->post('cat_id');
		$cat_name=$this->input->post('cat_name');
		$data=array(
			'cat_name'=>$cat_name
		);
		if($this->model->update_blog_category($cat_id,$data))
		{
			$this->session->set_flashdata('msg','Category updated successfully');
			return redirect(base_url().'admin/category');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/category');	
		}
	}
	public function blog()
	{
		$data['category_list']=$this->model->blogCategoryList();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/blog',$data);
		$this->load->view('admin/footer');	
	}
	public function add_blog()
	{
		$this->form_validation->set_rules('cat_id', 'Category Name', 'required');
		$this->form_validation->set_rules('blog_title', 'Blog Title', 'required');
		$this->form_validation->set_rules('blog_description', 'Blog Description', 'required');
		if($this->form_validation->run() && $this->upload->do_upload('blog_image'))
		{
			$cat_id=$this->input->post('cat_id');
			$blog_title=$this->input->post('blog_title');
			$image=$this->upload->data();
			$blog_image="upload/".$image['raw_name'].$image['file_ext'];
			$blog_description=$this->input->post('blog_description');
			$data=array(
				'cat_id'=>$cat_id,
				'blog_title'=>$blog_title,
				'blog_image'=>$blog_image,
				'blog_description'=>$blog_description	
			);
			if($this->model->add_blog($data))
		{
			$this->session->set_flashdata('msg','Blog posted successfully');
			return redirect(base_url().'admin/blog');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/blog');	
		}

		}
		else
		{
		$data['blog_image']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		$data['category_list']=$this->model->blogCategoryList();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/blog',$data);
		$this->load->view('admin/footer');	
		}
	}
	public function blog_list()
	{
		$data['blog_list']=$this->model->getBlogList();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/blog_list',$data);
		$this->load->view('admin/footer');
	}
	public function delete_blog()
	{
		$id=$this->uri->segment(3);
		$blog_info=$this->model->getBlogList($id);
		$blog_image=$blog_info[0]->blog_image;
		if(!empty($blog_image))
		{
			@unlink($blog_image);
		}
		if($this->model->delete_blog($id))
		{
			$this->session->set_flashdata('msg','Blog deleted successfully');
			return redirect(base_url().'admin/blog_list');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/blog_list');
		}
	}
	public function edit_blog()
	{
	$id=$this->uri->segment(3);
	$data['blog']=$this->model->getBlogList($id);
	$data['category_list']=$this->model->blogCategoryList();
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/edit_blog',$data);
	$this->load->view('admin/footer');
	}
	public function update_blog($id)
	{
		$blog_info=$this->model->getBlogList($id);
		$old_blog_image=$blog_info[0]->blog_image;
		if($this->upload->do_upload('blog_image'))
		{
			if(!empty($old_blog_image))
			{
				@unlink($old_blog_image);
			}
			$image=$this->upload->data();
			$blog_image="upload/".$image['raw_name'].$image['file_ext'];
		}
		else
		{
			$blog_image=$old_blog_image;
		}
		$cat_id=$this->input->post('cat_id');
		$blog_title=$this->input->post('blog_title');
		$blog_description=$this->input->post('blog_description');
		$data=array(
			'cat_id'=>$cat_id,
			'blog_title'=>$blog_title,
			'blog_image'=>$blog_image,
			'blog_description'=>$blog_description
		);
		if($this->model->update_blog($data,$id))
		{
			$this->session->set_flashdata('msg','Blog updated successfully');
			return redirect(base_url().'admin/blog_list');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/blog_list');
		}
	}
	public function enquiry()
	{
		$data['enquiry']=$this->model->enquiry();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/enquiry',$data);
		$this->load->view('admin/footer');
	}
	public function delete_enquiry($id)
	{
		if($this->model->delete_enquiry($id))
		{
			$this->session->set_flashdata('msg','Enquiry deleted successfully');
			return redirect(base_url().'admin/enquiry');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/enquiry');
		}	
	}
	public function quote()
	{
		$data['quote']=$this->model->quote();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/quote',$data);
		$this->load->view('admin/footer');
	}
	public function delete_quote($id)
	{
		if($this->model->delete_quote($id))
		{
			$this->session->set_flashdata('msg','Quote deleted successfully');
			return redirect(base_url().'admin/quote');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/quote');
		}	
	}
	public function change_password()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/change_password');
		$this->load->view('admin/footer');	
	}
	public function check_password()
	{
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('newpassword', 'New Password', 'required|min_length[5]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'required|matches[newpassword]');
		if($this->form_validation->run())
		{
			$username=$this->session->userdata('email');
		$password=$this->input->post('password');
		$newpassword=$this->input->post('newpassword');
		$cpassword=$this->input->post('cpassword');
		if($this->model->checkpassword($username,$password)->num_rows())
		{
				if($newpassword == $cpassword)
				{
					if($this->model->changepassword($username,$newpassword))
					{
						$this->session->set_flashdata('msg', "Your Password successfully changed"); 
		   				redirect(base_url().'admin/change_password');
					}
					else
					{
						$this->session->set_flashdata('msg', "Something went wrong"); 
		   				redirect(base_url().'admin/change_password');
					}
				}
				else
				{
					$this->session->set_flashdata('msg', "New Password not matched!"); 
	   				redirect(base_url().'admin/change_password');
				}	
		}
		else
		{
			$this->session->set_flashdata('msg', "Old Password not matched."); 
	   				redirect(base_url().'admin/change_password');
		}
		}
		else
		{
			$this->change_password();
		}
	}
	public function enquiryform()
	{
		$data['enquiryform']=$this->model->get_enquiryform();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/enquiryform',$data);
		$this->load->view('admin/footer');
	}
	public function delete_enquiryform($id)
	{
		if($this->model->delete_enquiryform($id))
		{
			$this->session->set_flashdata('msg','Enquiry deleted successfully');
			return redirect(base_url().'admin/enquiryform');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/enquiryform');
		}	
	}
	public function hiring()
	{
		$data['hiring']=$this->model->hiring();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/hiring',$data);
		$this->load->view('admin/footer');
	}
	public function delete_hiring($id)
	{
		$data=$this->model->hiring($id);	
		$cv=$data[0]->cv;
		if(!empty($cv))
		{
			@unlink($cv);
		}
		if($this->model->delete_hiring($id))
		{
			$this->session->set_flashdata('msg','Deleted successfully');
			return redirect(base_url().'admin/hiring');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/hiring');
		}
	}
	public function team()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/team');
		$this->load->view('admin/footer');
	}
	public function add_team()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('position', 'Position', 'required');
		$this->form_validation->set_rules('facebook', 'Facebook Link', 'valid_url');
		$this->form_validation->set_rules('instagram', 'Instagram Link', 'valid_url');
		$this->form_validation->set_rules('twitter', 'Twitter Link', 'valid_url');
		$this->form_validation->set_rules('linkedin', 'LinkedIn Link', 'valid_url');
		if($this->form_validation->run() && $this->upload->do_upload('member_image'))
		{
			$name=$this->input->post('name');
			$position=$this->input->post('position');
			$facebook=$this->input->post('facebook');
			$instagram=$this->input->post('instagram');
			$twitter=$this->input->post('twitter');
			$linkedin=$this->input->post('linkedin');
			$image=$this->upload->data();
			$member_image="upload/".$image['raw_name'].$image['file_ext'];
			$data=array(
				'name'=>$name,
				'position'=>$position,
				'facebook'=>$facebook,
				'instagram'=>$instagram,
				'twitter'=>$twitter,
				'linkedin'=>$linkedin,
				'member_image'=>$member_image	
			);
			if($this->model->add_team($data))
		{
			$this->session->set_flashdata('msg','Team member added successfully');
			return redirect(base_url().'admin/team');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/team');	
		}

		}
		else
		{
		$data['member_image']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/team',$data);
		$this->load->view('admin/footer');	
		}
	}
	public function all_team()
	{
		$data['team']=$this->model->get_team();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/all_team',$data);
		$this->load->view('admin/footer');
	}
	public function delete_team($id)
	{
		$data=$this->model->get_team($id);
		$member_image=$data[0]->member_image;
		if(!empty($member_image))
		{
			@unlink($member_image);
		}
		if($this->model->delete_team($id))
		{
			$this->session->set_flashdata('msg','Team member deleted successfully');
			return redirect(base_url().'admin/all_team');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/all_team');
		}
	}
	public function edit_team($id)
	{
	$data['team']=$this->model->get_team($id);
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/edit_team',$data);
	$this->load->view('admin/footer');
	}
	public function update_team($id)
	{
		$data=$this->model->get_team($id);
		$old_member_image=$data[0]->member_image;
		if($this->upload->do_upload('member_image'))
		{
			if(!empty($old_member_image))
			{
				@unlink($old_member_image);
			}
			$image=$this->upload->data();
			$member_image="upload/".$image['raw_name'].$image['file_ext'];	
		}
		else
		{
			$member_image=$old_member_image;
		}
		$name=$this->input->post('name');
		$position=$this->input->post('position');
		$facebook=$this->input->post('facebook');
		$instagram=$this->input->post('instagram');
		$twitter=$this->input->post('twitter');
		$linkedin=$this->input->post('linkedin');
		$data=array(
			'name'=>$name,
			'position'=>$position,
			'facebook'=>$facebook,
			'instagram'=>$instagram,
			'twitter'=>$twitter,
			'linkedin'=>$linkedin,
			'member_image'=>$member_image	
		);
		if($this->model->update_team($data,$id))
		{
			$this->session->set_flashdata('msg','Team member updated successful');
			return redirect(base_url().'admin/all_team');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/all_team');
		}

	}

}







