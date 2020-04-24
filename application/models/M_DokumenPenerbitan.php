<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class M_DokumenPenerbitan extends Eloquent
{
	public $timestamps = false;
	protected $table = 'dokumen_penerbitan';
	protected $primaryKey = 'id';
	protected $fillable = [
		'file_pelepasan_hak',
		'file_sertifikat_tidak_berlaku',
		'file_kib',
		'file_surat_penguasaan',
		'file_surat_pernyataan',
		'transaksi_id',
	];

	public function Transaksi()
	{
		return $this->belongsTo(new M_Transaksi(), 'transaksi_id');
	}
	

}