<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestApp extends CI_Controller {

	public function index()
	{
		$this->load->view('home');
	}
	
	public function showUsers()
	{
		$this->load->view('users');
	}
}
