<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		
		return view('laporan');
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */