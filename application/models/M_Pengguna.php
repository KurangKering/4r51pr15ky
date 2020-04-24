<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class M_Pengguna extends Eloquent
{
	public $timestamps = false;
	protected $table = 'pengguna';
	protected $primaryKey = 'id';
	protected $fillable = [
		'username',
		'password',
		'nama',
		'role',
	];

	
}