<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		
		return view('pencarian.index');
	}

	public function cari()
	{
		$keyword = $this->input->post('keyword');
		$content = array();
		if ($keyword == "") {

		} else {
			$this->load->model('M_Transaksi');
			$result = $this->M_Transaksi->Pencarian($keyword)->get();
			foreach ($result as $k => $v) {
				$content[$k] = array(
					'no_sk' => $v->DataPenguasaan->no_sk_no_surat,
					'status_instansi' => $v->status_instansi,
					'jenis_hak' => $v->jenis_hak,
					'nama_pemohon' => $v->DataPenguasaan->nama_pemohon,
					'nama_instansi' => $v->DataPenguasaan->nama_instansi,
					'tanggal_masuk' => $v->DataPenguasaan->tanggal_masuk,
					'letak_tanah' => $v->DataPenguasaan->nama_jalan,
					'action' => '<button type="button" class="btn btn-info" onclick="showDetail('.$v->id.')">Detail</button>', 

				);
			}
		}
		$total = count($content);
		$text = $this->generateText($total, $keyword);
		$json = array(
			'total' => $total,
			'content' => $content,
			'text' => $text,
		);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($json));

	}
	public function generateText($total, $keyword)
	{
		$output = "";
		if ($keyword == "") {
			$output = "Silahkan isi inputan pencarian";
		} else if ($total <= 0 ) {
			$output = "Tidak ada data yang ditemukan untuk kata kunci \"{$keyword}\"";
		} else if ($total > 0 ) {
			$output = "{$total} data ditemukan untuk kata kunci \"{$keyword}\"";

		}
		return $output;
	}

}

/* End of file Pencarian.php */
/* Location: ./application/controllers/Pencarian.php */