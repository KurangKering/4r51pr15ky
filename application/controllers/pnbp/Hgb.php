<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\CodeigniterAdapter;
use Illuminate\Database\Capsule\Manager as DB;

class Hgb extends MY_Controller {

	private $upload_path = "./uploads/";

	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_Transaksi');
		$this->load->model('M_DokumenPenerbitan');
		$this->load->model('M_DataPenguasaan');
		$this->load->model('M_InfoPemilik');
	}
	public function index()
	{


		return view('pnbp.hgb.index');
	}

	public function create()
	{
		return view('pnbp.hgb.create');
	}

	public function edit($id)
	{

		$data['hp'] = $this->M_Transaksi->with('DataPenguasaan',
			'DokumenPenerbitan','InfoPemilik')->findOrFail($id);
		$data['upload_path'] = $this->upload_path;
		return view('pnbp.hgb.edit', compact('data'));
		
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$pnbp_hp = $this->M_Transaksi->findOrFail($id);


		$this->fileRemove($pnbp_hp->InfoPemilik->file_ktp);
		$this->fileRemove($pnbp_hp->InfoPemilik->file_pbb);
		$this->fileRemove($pnbp_hp->InfoPemilik->file_surat_kuasa);
		$this->fileRemove($pnbp_hp->InfoPemilik->file_npup);
		$this->fileRemove($pnbp_hp->InfoPemilik->file_akta_pendirian);
		$this->fileRemove($pnbp_hp->InfoPemilik->file_proposal);
		$this->fileRemove($pnbp_hp->InfoPemilik->file_tanda);
		$this->fileRemove($pnbp_hp->InfoPemilik->file_isian);
		$this->fileRemove($pnbp_hp->DokumenPenerbitan->file_pelepasan_hak);
		$this->fileRemove($pnbp_hp->DokumenPenerbitan->file_sertifikat_tidak_berlaku);
		$this->fileRemove($pnbp_hp->DokumenPenerbitan->file_kib);
		$this->fileRemove($pnbp_hp->DokumenPenerbitan->file_surat_penguasaan);
		$this->fileRemove($pnbp_hp->DokumenPenerbitan->file_surat_pernyataan);
		$this->fileRemove($pnbp_hp->DataPenguasaan->stp_file);
		$this->fileRemove($pnbp_hp->DataPenguasaan->stk_file);
		$this->fileRemove($pnbp_hp->DataPenguasaan->ba_lapangan_file);
		$this->fileRemove($pnbp_hp->DataPenguasaan->no_risalah_panitia_file);
		$this->fileRemove($pnbp_hp->DataPenguasaan->no_rpd_file);
		$this->fileRemove($pnbp_hp->DataPenguasaan->warkah_file);
		$this->fileRemove($pnbp_hp->DataPenguasaan->no_sk_file);

		$pnbp_hp->InfoPemilik->delete();
		$pnbp_hp->DokumenPenerbitan->delete();
		$pnbp_hp->DataPenguasaan->delete();
		$pnbp_hp->delete();

		$response = array([
			'success' => "Y",
		]);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($response));
		
	}

	public function store()
	{
		$post = $this->input->post();
		$response = array('success' => 'N', 'messages' => null);
		$files = array();
		$Errors = array();
		
		$this->validation();

		if ($this->form_validation->run() == FALSE) {
			foreach ($this->form_validation->error_array() as $key => $value) {
				$Errors[] = array('field' => $key, 'messages' => $value );
			}
			$response['messages'] = $Errors;

		} else {
			foreach ($_FILES as $key => $value) {
				$result = $this->fileUpload($key);
				if ($result['success'] == 'Y') {
					$files[$key] = $result['upload_data']['file_name'];
				} else {
					$Errors[] = array('field' => $key, 'messages' => $result['error'] );
				}
			}


			if ($Errors) {
				foreach ($files as $key => $value) {
					$this->fileRemove($value);
				}
				$response['messages'] = $Errors;
			} else {
				DB::beginTransaction();
				try {
					$pnbp_hp_id = DB::table('transaksi')->insertGetId([
						'status_instansi' => "PNBP",
						'jenis_hak' => "HGB",
					]);

					$info_pemilik = DB::table('info_pemilik')->insert([
						'transaksi_id' => $pnbp_hp_id,
						'nama_instansi' => $post['nama_instansi'],
						'nama_pemohon' => $post['nama_pemohon'],
						'file_ktp' => $files['file_ktp'],
						'file_pbb' => $files['file_pbb'],
						'file_surat_kuasa' => $files['file_surat_kuasa'],
						'file_npup' => $files['file_npup'],
						'file_akta_pendirian' => $files['file_akta_pendirian'],
						'file_proposal' => $files['file_proposal'],
						'file_tanda' => $files['file_tanda'],
						'file_isian' => $files['file_isian'],
					]);

					$dokumen_penerbitan = DB::table('dokumen_penerbitan')->insert([
						'transaksi_id' => $pnbp_hp_id,
						'file_pelepasan_hak' => $files['file_pelepasan_hak'],
						'file_sertifikat_tidak_berlaku' => $files['file_sertifikat_tidak_berlaku'],
						'file_kib' => $files['file_kib'],
						'file_surat_penguasaan' => $files['file_surat_penguasaan'],
						'file_surat_pernyataan' => $files['file_surat_pernyataan'],
					]);
					$data_penguasaan = DB::table('data_penguasaan')->insert([
						'transaksi_id' => $pnbp_hp_id,
						'tanggal_masuk' => $post['tanggal_masuk'],
						'no_berkas' => $post['no_berkas'],
						'nama_pemohon' => $post['data_penguasaan_nama_pemohon'],
						'nama_instansi' => $post['data_penguasaan_nama_instansi'],
						'nama_kecamatan' => $post['nama_kecamatan'],
						'nama_desa' => $post['nama_desa'],
						'nama_jalan' => $post['nama_jalan'],
						'stp_no_surat' => $post['stp_no_surat'],
						'stp_tanggal_masuk' => $post['stp_tanggal_masuk'],
						'stp_tanggal_keluar' => $post['stp_tanggal_keluar'],
						'stp_file' => $files['stp_file'],
						'stk_no_surat' => $post['stk_no_surat'],
						'stk_tanggal_masuk' => $post['stk_tanggal_masuk'],
						'stk_tanggal_keluar' => $post['stk_tanggal_keluar'],
						'stk_file' => $files['stk_file'],
						'ba_lapangan_file' => $files['ba_lapangan_file'],
						'no_risalah_panitia_no_surat' => $post['no_risalah_panitia_no_surat'],
						'no_risalah_panitia_tanggal' => $post['no_risalah_panitia_tanggal'],
						'no_risalah_panitia_file' => $files['no_risalah_panitia_file'],
						'no_rpd_no_surat' => $post['no_rpd_no_surat'],
						'no_rpd_tanggal' => $post['no_rpd_tanggal'],
						'no_rpd_file' => $files['no_rpd_file'],
						'warkah_no_surat' => $post['warkah_no_surat'],
						'warkah_tanggal' => $post['warkah_tanggal'],
						'warkah_file' => $files['warkah_file'],
						'no_sk_no_surat' => $post['no_sk_no_surat'],
						'no_sk_tanggal' => $post['no_sk_tanggal'],
						'no_sk_file' => $files['no_sk_file'],
						'peruntukan' => $post['peruntukan'],
						'tanggal_pengiriman_ke_loket' => $post['tanggal_pengiriman_ke_loket'],
					]);
					DB::commit();

					$response['success'] = 'Y';
					$response['messages'] = 'Berhasil';
					
				} catch (Exception $e) {
					DB::rollback();
				}
				
			}
		}




		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($response));

	}

	private function validation() 
	{
		$this->form_validation->set_rules('nama_instansi', 'Nama Instansi', 'required');
		$this->form_validation->set_rules('nama_pemohon', 'Nama Pemohon', 'required');
		$this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
		$this->form_validation->set_rules('no_berkas', 'No Berkas', 'required');
		$this->form_validation->set_rules('data_penguasaan_nama_pemohon', 
			'Nama Pemohon', 'required');
		$this->form_validation->set_rules('data_penguasaan_nama_instansi', 
			'Nama Instansi', 'required');
		$this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required');
		$this->form_validation->set_rules('nama_desa', 'Nama Desa', 'required');
		$this->form_validation->set_rules('nama_jalan', 'Nama Jalan', 'required');
		$this->form_validation->set_rules('stp_no_surat', 'No Surat', 'required');
		$this->form_validation->set_rules('stp_tanggal_masuk', 'Tanggal Masuk', 'required');
		$this->form_validation->set_rules('stp_tanggal_keluar', 'Tanggal Keluar', 
			'required');
		$this->form_validation->set_rules('stk_no_surat', 'No Surat', 'required');
		$this->form_validation->set_rules('stk_tanggal_masuk', 'Tanggal Masuk', 'required');
		$this->form_validation->set_rules('stk_tanggal_keluar', 'Tanggal Keluar', 
			'required');
		$this->form_validation->set_rules('no_risalah_panitia_no_surat', 
			'No Surat', 'required');
		$this->form_validation->set_rules('no_risalah_panitia_tanggal', 
			'Tanggal', 'required');
		$this->form_validation->set_rules('no_rpd_no_surat', 'No Surat', 'required');
		$this->form_validation->set_rules('no_rpd_tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('warkah_no_surat', 'No Surat', 'required');
		$this->form_validation->set_rules('warkah_tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('no_sk_no_surat', 'No Surat', 'required');
		$this->form_validation->set_rules('no_sk_tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('peruntukan', 'Peruntukan', 'required');
		$this->form_validation->set_rules('tanggal_pengiriman_ke_loket', 
			'Tanggal Pengiriman Ke Loket ', 'required');
		foreach ($_FILES as $key => $value) {
			if (empty($_FILES[$key]['name'])) {
				$this->form_validation->set_rules($key, 'File', 'required');
			}
		}
	}

	public function fileRemove($name) 
	{
		$path = $this->upload_path.$name;
		return unlink($path);
	}


	public function fileUpload($field)
	{
		$config['upload_path']          = $this->upload_path;
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['encrypt_name']        = TRUE;

		$this->load->library('upload');
		$this->upload->initialize($config);
		$response = array();
		if ( ! $this->upload->do_upload($field))
		{

			$response['success'] = "N";
			$response['error'] = $this->upload->display_errors();


		}
		else
		{
			$response['success'] = "Y";
			$response['upload_data'] = $this->upload->data();
		}
		return $response;
	}



	public function jsonDataPnbpHgb()
	{
		$dt = new Datatables(new CodeigniterAdapter);
		$dt->query('SELECT tr.status_instansi, 
			tr.id,
			tr.jenis_hak, 
			ip.nama_instansi, 
			ip.nama_pemohon 
			FROM transaksi as tr 
			JOIN info_pemilik AS ip ON tr.id = ip.transaksi_id
			WHERE status_instansi = "PNBP" AND jenis_hak = "HGB"
			');

		$dt->add('action', function($data){

			$urlEdit = base_url('pnbp/hgb/edit/'.$data['id']);
			$urlDelete = base_url('pnbp/hgb/delete/'.$data['id']);

			$html = '<a href="'.$urlEdit.'" class="btn btn-sm btn-warning">Ubah</a>
			<a href="javascript:void(0)" class="btn btn-sm btn-danger" onClick="showDelete('.$data['id'].')">Hapus</a>';
			return $html;
		});

		echo $dt->generate();
	}

}

/* End of file Hp.php */
/* Location: ./application/controllers/pnbp/Hp.php */