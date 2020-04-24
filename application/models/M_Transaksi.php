<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class M_Transaksi extends Eloquent
{
	public $timestamps = false;
	protected $table = 'transaksi';
	protected $primaryKey = 'id';
	protected $fillable = [
		'status_instansi',
		'jenis_hak',
	];

	public function DataPenguasaan()
	{
		return $this->hasOne(new M_DataPenguasaan(), 'transaksi_id','id');
	}
	public function DokumenPenerbitan()
	{
		return $this->hasOne(new M_DokumenPenerbitan(), 'transaksi_id','id');
	}
	public function InfoPemilik()
	{
		return $this->hasOne(new M_InfoPemilik(), 'transaksi_id','id');
	}

	public function Lengkap()
	{
		return $this->with('DataPenguasaan', 'DokumenPenerbitan', 'InfoPemilik');
	}

	public function Laporan($conditions)
	{
		$conditions = array_filter($conditions);
		$output = $this;
		if (isset($conditions['status_instansi'])) {
			$output = $output->where('status_instansi', $conditions['status_instansi']);
		}
		if (isset($conditions['jenis_hak'])) {
			$output = $output->where('jenis_hak', $conditions['jenis_hak']);
		}
		if (isset($conditions['start_date'])) {
			$output = $output->whereHas('DataPenguasaan', function($q) use($conditions) {
				$q->where('tanggal_masuk', '>=',$conditions['start_date']);
			});
		}

		if (isset($conditions['end_date'])) {
			$output = $output->whereHas('DataPenguasaan', function($q) use($conditions) {
				$q->where('tanggal_masuk', '<=', $conditions['end_date']);
			});
		}
		return $output->with('DataPenguasaan', 'DokumenPenerbitan', 'InfoPemilik');
		
	}

	public function Pencarian($keyword)
	{
		return $this->WhereHas('DataPenguasaan', function($q) use($keyword) {
			$q->where('no_sk_no_surat', 'like', '%'.$keyword.'%')
			->orWhere('nama_instansi',  'like', '%'.$keyword.'%')
			->orWhereYear('tanggal_masuk', '=', $keyword);
		})
		->with('DataPenguasaan','InfoPemilik','DokumenPenerbitan');
	}

}