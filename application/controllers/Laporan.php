<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		
		return view('laporan.index');
	}

	public function generateLaporan()
	{
		$params = $this->input->get('x');
		$output = array();
		$params = parse_str(base64_decode($params), $output);
		$this->load->model('M_Transaksi');
		$transaksi = $this->M_Transaksi->Laporan($output)->get()
		->sortBy(function($q) {
			return $q->DataPenguasaan->tanggal_masuk;
		});
		if (count($transaksi) < 1 ) {
			echo "<script>window.close()</script>";
			die();
		}
		$data = array(
			'transaksi' => $transaksi,

		);

		$view = $this->load->view('laporan/content_laporan', compact('data'), TRUE);

		$this->load->library('PdfGenerator');
		$filename = "Laporan";
		$this->pdfgenerator->generate($view, $filename,TRUE, 'legal', 'landscape');
	}

	public function showLaporan()
	{
		
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */