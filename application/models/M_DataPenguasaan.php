<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class M_DataPenguasaan extends Eloquent
{
	public $timestamps = false;
	protected $table = 'data_penguasaan';
	protected $primaryKey = 'id';
	protected $appends = array('letak_tanah');
	protected $fillable = [
		'tanggal_masuk',
		'no_berkas',
		'nama_pemohon',
		'nama_instansi',
		'nama_kecamatan',
		'nama_desa',
		'nama_jalan',
		'stp_no_surat',
		'stp_tanggal_masuk',
		'stp_tanggal_keluar',
		'stp_file',
		'stk_no_surat',
		'stk_tanggal_masuk',
		'stk_tanggal_keluar',
		'stk_file',
		'ba_lapangan_no_surat',
		'ba_lapangan_file',
		'no_risalah_panitia_no_surat',
		'no_risalah_panitia_tanggal',
		'no_risalah_panitia_file',
		'no_rpd_no_surat',
		'no_rpd_tanggal',
		'no_rpd_file',
		'warkah_no_surat',
		'warkah_tanggal',
		'warkah_file',
		'no_sk_no_surat',
		'no_sk_tanggal',
		'no_sk_file',
		'peruntukan',
		'tanggal_pengiriman_ke_loket',
		'transaksi_id',
	];

	public function Transaksi()
	{
		return $this->belongsTo(new M_Transaksi(), 'transaksi_id');
	}

	public function getLetakTanahAttribute()
	{
		return $this->nama_jalan;
	}
	

}