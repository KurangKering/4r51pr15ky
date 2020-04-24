<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class M_InfoPemilik extends Eloquent
{
	public $timestamps = false;
	protected $table = 'info_pemilik';
	protected $primaryKey = 'id';
	protected $fillable = [
		'nama_instansi',
		'nama_pemohon',
		'file_ktp',
		'file_pbb',
		'file_surat_kuasa',
		'file_npup',
		'file_akta_pendirian',
		'file_proposal',
		'file_tanda',
		'file_isian',
		'transaksi_id',
	];

	public function Transaksi()
	{
		return $this->belongsTo(new M_Transaksi(), 'transaksi_id');
	}
	

}