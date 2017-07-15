<?php
defined('BASEPATH') OR exit('no defined scripts access allowed');
class Check extends CI_Model	
{
public function __construct()
	{
		parent:: __construct();
     
	}
function category()
{
	$sql="SELECT * FROM `add_quiz`";
	$result=$this->db->query($sql);
	return $result;
}
function sub_category()
{
	$sql="SELECT * FROM `sub_quiz`";
	$result=$this->db->query($sql);
	return $result;
}
function display()
{
	$sql="SELECT * FROM `quiz_questions`";
	$result=$this->db->query($sql);
	return $result;
}
function edit_ques($id)
{
	$sql="SELECT * FROM `quiz_questions` WHERE `id`='$id' ";
	$result=$this->db->query($sql);
	return $result;
}

}
?>