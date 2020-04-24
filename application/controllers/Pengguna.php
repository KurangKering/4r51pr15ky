<?php
defined('BASEPATH') OR exit('No direct script access allowed');




use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\CodeigniterAdapter;
use Illuminate\Database\Capsule\Manager as DB;

class Pengguna extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Pengguna');
		
	}

	public function index()
	{
		$data['data_pengguna'] = $this->M_Pengguna->get();
		return view('pengguna.index', compact('data'));
	}

	public function getDataPengguna()
	{
		$id = $this->input->post('id');

		$pengguna = $this->M_Pengguna->findOrFail($id);

		

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($pengguna));
	}

	public function delete()
	{
		$json = array();
		$json['success'] = 1;
		$json['messages'] = array();


		$id = $this->input->post('id');
		$data = $this->M_Pengguna->findOrFail($id);
		$deleteData = $data->delete();


		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($json));

	}
	public function update()
	{
		$this->load->library('form_validation');
		$post = $this->input->post();

		$auth = $this->auth;
		$this->form_validation->set_rules('nama', 'Nama Pengguna', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');

		$json = array();
		$json['success'] = 1;
		$json['messages'] = array();
		if (!$this->form_validation->run()) {
			$json['messages'] = array(
				'input-nama' => form_error('nama', '<p class="mt-3 text-danger">', '</p>'),
				'input-username' => form_error('username', '<p class="mt-3 text-danger">', '</p>'),
			);
			$json['messages'] = array_filter($json['messages']);
			$json['success'] = 0;
		} else {
			$postData = array(
				'nama' => $post['nama'],
				'username' => $post['username'],
				
			);

			if ($post['password']) {
				$postData['password'] = md5($post['password']);
			}

		

			$data = $this->M_Pengguna->findOrFail($post['id']);
			$dataUpdate = $data->update($postData);
		}


		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($json));
	}

	public function store()
	{
		$this->load->library('form_validation');
		$post = $this->input->post();
		$this->form_validation->set_rules('nama', 'Nama Pengguna', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[pengguna.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$json = array();
		$json['success'] = 1;
		$json['messages'] = array();
		if (!$this->form_validation->run()) {
			$json['messages'] = array(
				'input-nama' => form_error('nama', '<p class=" text-danger">', '</p>'),
				'input-username' => form_error('username', '<p class=" text-danger">', '</p>'),
				'input-password' => form_error('password', '<p class=" text-danger">', '</p>'),
			);
			$json['messages'] = array_filter($json['messages']);
			$json['success'] = 0;
		} else {
			
			$postData = array(
				'nama' => $post['nama'],
				'username' => $post['username'],
				'password' => $post['password'],
				'role' => 'admin',
			);

			

			$insertData = $this->M_Pengguna->insert($postData);
		}


		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($json));
	}


	public function jsonDataPengguna()
	{
		$dt = new Datatables(new CodeigniterAdapter);
		$dt->query('SELECT 
			id,
			username,
			nama,
			role
			FROM pengguna
			');
		$this->dt->add_column('action',
			'<a href="javascript:void(0)" class="btn btn-sm btn-warning" onClick="showModal($1,1)">Ubah</a>
			<a href="javascript:void(0)" class="btn btn-sm btn-danger" onClick="showModal($1,2)">Hapus</a>'
			, 'pengguna_id'
		);

		$dt->add('action', function($data){

			$html = '<a href="javascript:void(0)" class="btn btn-sm btn-warning" onClick="showModal('.$data['id'].',1)">Ubah</a>
			<a href="javascript:void(0)" class="btn btn-sm btn-danger" onClick="showModal('.$data['id'].',2)">Hapus</a>';

		
			return $html;
		});

		echo $dt->generate();


	}
	
}

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */