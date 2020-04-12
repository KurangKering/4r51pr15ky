<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		
		return view('pencarian');
	}

}

/* End of file Pencarian.php */
/* Location: ./application/controllers/Pencarian.php */