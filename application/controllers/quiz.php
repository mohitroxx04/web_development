<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 private $data=array();
	 public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('index');
	}
	function tables()
	{
		$this->load->view('category');
	}
	function insert_category()
	{
		$category=$this->input->post('category');
		$data=array(
						'category'=>$category
					);
		$this->db->insert('add_quiz',$data);
		$this->load->view('category');
	}
	function sub_category()
	{
		$this->load->view('sub_category');
	}
	function insert_sub_category()
	{
		session_start();
		$id=$_SESSION['id'];
		$sub_category=$this->input->post('sub_category');
		$data=array(
						'category_id'=>$id ,
						'sub_category'=>$sub_category
					);
		$this->db->insert('sub_quiz',$data);
		$this->load->view('sub_category');
	}
	function questions()
	{
		$this->load->view('questions');
	}
	function insert_questions()
	{
		$category=$this->input->post('category');
		$sub_category=$this->input->post('sub_category');
		$ques=$this->input->post('text');
		$o1=$this->input->post('o1');
		$o2=$this->input->post('o2');
		$o3=$this->input->post('o3');
		$o4=$this->input->post('o4');
		$ans=$this->input->post('ans');
		$data=array(
						'category'=>$category ,
						'sub_category'=>$sub_category ,
						'ques'=>$ques ,
						'o1'=>$o1 ,
						'o2'=>$o2 ,
						'o3'=>$o3 ,
						'o4'=>$o4 ,
						'ans'=>$ans 
					);
		$this->db->insert('quiz_questions',$data);
		$this->load->view('questions');
	}
	function display()
	{
		$this->load->view('tables');
	}
	
	function edit()
	{
		//$this->data['id']=$id;
		//session_start();
		//$id=$_SESSION['id'];
		//$_SESSION['id']=$id;
		$this->load->view('edit_ques');
	}
	function update_ques()
	{
		session_start();
		$id=$_SESSION['id'];
		$ques=$this->input->post('text');
		$o1=$this->input->post('o1');
		$o2=$this->input->post('o2');
		$o3=$this->input->post('o3');
		$o4=$this->input->post('o4');
		$ans=$this->input->post('ans');
		$sql="UPDATE `quiz_questions` SET `ques`='$ques',`o1`='$o1',`o2`='$o2',`o3`='$o3',`o4`='$o4',`ans`='$ans' WHERE `id`='$id' ";
		$this->db->query($sql);
		$this->load->view('tables');	
	}
	function delete()
	{
		$id=$_GET['id'];
		$sql="DELETE FROM `quiz_questions` WHERE `id`='$id' ";
		$this->db->query($sql);
		$this->load->view('tables');
	}
}