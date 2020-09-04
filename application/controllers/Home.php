<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('home/index');
		$this->load->view('home/footer');
	}
	public function about()
	{
		$this->load->view('home/header');
		$this->load->view('home/about');
		$this->load->view('home/footer');
	}
	public function contact()
	{
		$this->load->view('home/header');
		$this->load->view('home/contact');
		$this->load->view('home/footer');
	}
	public function it_infrastructure()
	{
		$this->load->view('home/header');
		$this->load->view('home/it_infrastructure');
		$this->load->view('home/footer');
	}
	public function pharmacy()
	{
		$this->load->view('home/header');
		$this->load->view('home/pharmacy');
		$this->load->view('home/footer');
	}
	public function overseas_education()
	{
		$this->load->view('home/header');
		$this->load->view('home/overseas_education');
		$this->load->view('home/footer');
	}
	public function consulting()
	{
		$this->load->view('home/header');
		$this->load->view('home/consulting');
		$this->load->view('home/footer');
	}
	public function funeral_insurance()
	{
		$this->load->view('home/header');
		$this->load->view('home/funeral_insurance');
		$this->load->view('home/footer');
	}
	public function tech()
	{
		$this->load->view('home/header');
		$this->load->view('home/tech');
		$this->load->view('home/footer');
	}
	public function telecom()
	{
		$this->load->view('home/header');
		$this->load->view('home/telecom');
		$this->load->view('home/footer');
	}
	public function consolidation()
	{
		$this->load->view('home/header');
		$this->load->view('home/consolidation');
		$this->load->view('home/footer');
	}
	public function debt_settlement()
	{
		$this->load->view('home/header');
		$this->load->view('home/debt_settlement');
		$this->load->view('home/footer');
	}
	public function enquiryform()
	{
	$name=$this->input->post('name');	
	$mobno=$this->input->post('mobno');	
	$email=$this->input->post('email');	
	$query=$this->input->post('query');	
	$data=array(
		'name'=>$name,
		'mobno'=>$mobno,
		'email'=>$email,
		'query'=>$query
	);	
	$this->load->model('Home_model','model');
	if($this->model->enquiryform($data))
	{
	echo "<script>alert('Your enquiry sent successfully. Our team will contact you soon');window.location.href='".base_url()."'</script>";
	}
	else
	{
		echo "<script>alert('Something went wrong');window.location.href='".base_url()."'</script>";
	}
	}
	public function enquiry()
	{
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$mobno=$this->input->post('mobno');
		$message=$this->input->post('message');
		$data=array(
			'name'=>$name,
			'email'=>$email,
			'mobno'=>$mobno,
			'message'=>$message
		);
		$this->load->model('Home_model','model');
	if($this->model->enquiry($data))
	{
	echo "<script>alert('Your enquiry sent successfully. Our team will contact you soon');window.location.href='".base_url('home/contact')."'</script>";
	}
	else
	{
		echo "<script>alert('Something went wrong');window.location.href='".base_url('home/contact')."'</script>";
	}
	}
}
