@extends('layouts.layout')
@section('css-export')
<link rel="stylesheet" href="{{ base_url("assets/modules/datatables/datatables.min.css") }}">
<link rel="stylesheet" href="{{ base_url("assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css") }}">


@endsection
@section('content')
<section class="section">
	<div class="section-header">
		<h1>PNBP - HP | Tambah Data</h1>
		
	</div>

	<div class="section-body">
		<div class="row">
			<div class="col-md-12">
				<form id="form-pnbp-hp" enctype="multipart/form-data">
					<div class="card">
						<div class="card-header">
							<h4>Info Pemilik</h4>
						</div>
						<div class="card-body">
							<div class="row">
								
								<div class="col-md-6">

									<div class="form-group">
										<label>Nama Instansi</label>
										<input type="text" value="random" id="nama_instansi" name="nama_instansi" class="form-control" >
									</div>
									<div class="form-group">
										<label>Nama Pemohon</label>
										<input type="text" value="random" id="nama_pemohon" name="nama_pemohon" class="form-control" >
									</div>

								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>File KTP</label>
										<input id="file_ktp" name="file_ktp" type="file" class="form-control">
									</div>
									<div class="form-group mb-0">
										<label>File PBB</label>
										<input type="file" id="file_pbb" name="file_pbb" class="form-control" >

									</div>
								</div>

							</div>
						</div>

					</div>
					<div class="card">
						<div class="card-header">
							<h4>Dokumen Penerbitan</h4>
						</div>
						<div class="card-body">
							

							<div class="form-group">
								<label>file_pelepasan_hak</label>
								<input type="file" id="file_pelepasan_hak" name="file_pelepasan_hak" class="form-control" >
							</div>
							<div class="form-group">
								<label>file_sertifikat_tidak_berlaku</label>
								<input type="file" id="file_sertifikat_tidak_berlaku" name="file_sertifikat_tidak_berlaku" class="form-control" >
							</div>
							<div class="form-group">
								<label>file_kib</label>
								<input type="file" id="file_kib" name="file_kib" class="form-control" >
							</div>
							<div class="form-group">
								<label>file_surat_penguasaan</label>
								<input type="file" id="file_surat_penguasaan" name="file_surat_penguasaan" class="form-control" >
							</div>
							<div class="form-group">
								<label>file_surat_pernyataan</label>
								<input type="file" id="file_surat_pernyataan" name="file_surat_pernyataan" class="form-control" >
							</div>
							


						</div>

					</div>

					<div class="card">
						<div class="card-header">
							<h4>Data Penguasaan</h4>
						</div>
						<div class="card-body">
							
							
							<div class="form-group">
								<label>tanggal_masuk</label>
								<input type="text"   id="tanggal_masuk" name="tanggal_masuk" class="form-control datepicker" >
							</div>
							<div class="form-group">
								<label>no_berkas</label>
								<input type="text" value="random" id="no_berkas" name="no_berkas" class="form-control" >
							</div>
							<div class="form-group">
								<label>nama_pemohon</label>
								<input type="text" value="random" id="data_penguasaan.nama_pemohon" name="data_penguasaan.nama_pemohon" class="form-control" >
							</div>
							<div class="form-group">
								<label>nama_instansi</label>
								<input type="text" value="random" id="data_penguasaan.nama_instansi" name="data_penguasaan.nama_instansi" class="form-control" >
							</div>
							<div class="form-group">
								<label>nama_kecamatan</label>
								<input type="text" value="random" id="nama_kecamatan" name="nama_kecamatan" class="form-control" >
							</div>
							<div class="form-group">
								<label>nama_desa</label>
								<input type="text" value="random" id="nama_desa" name="nama_desa" class="form-control" >
							</div>
							<div class="form-group">
								<label>nama_jalan</label>
								<input type="text" value="random" id="nama_jalan" name="nama_jalan" class="form-control" >
							</div>
							<hr>

							<div class="form-group">
								<label>Surat Tugas Panitita</label>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">No Surat</label>
									<div class="col-sm-4">
										<input type="text" value="random" class="form-control" id="stp_no_surat" name="stp_no_surat" placeholder="">

									</div>

									<label for="" class="col-sm-2 col-form-label">Tanggal Masuk</label>
									<div class="col-sm-4">
										<input type="text"  class="form-control datepicker" id="stp_tanggal_masuk" name="stp_tanggal_masuk" placeholder="">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">Tanggal Keluar</label>
									<div class="col-sm-4">
										<input type="text"  class="form-control datepicker" id="stp_tanggal_keluar" name="stp_tanggal_keluar" placeholder="">
									</div>
									<label for="" class="col-sm-2 col-form-label">File</label>
									<div class="col-sm-4">
										<input type="file" class="form-control" id="stp_file" name="stp_file" placeholder="">
									</div>
								</div>
								
							</div>
							<hr>
							<div class="form-group">
								<label>Surat Tugas Ke Lapangan</label>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">No Surat</label>
									<div class="col-sm-4">
										<input type="text" value="random" class="form-control" id="stk_no_surat" name="stk_no_surat" placeholder="">
									</div>

									<label for="" class="col-sm-2 col-form-label">Tanggal Masuk</label>
									<div class="col-sm-4">
										<input type="text"  class="form-control datepicker" id="stk_tanggal_masuk" name="stk_tanggal_masuk" placeholder="">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">Tanggal Keluar</label>
									<div class="col-sm-4">
										<input type="text"  class="form-control datepicker" id="stk_tanggal_keluar" name="stk_tanggal_keluar" placeholder="">
									</div>
									<label for="" class="col-sm-2 col-form-label">File</label>
									<div class="col-sm-4">
										<input type="file" class="form-control" id="stk_file" name="stk_file" placeholder="">
									</div>
								</div>
								
							</div>
							<hr>

							
							<div class="form-group">
								<label>BA Ke Lapangan</label>
								<div class="form-group row">
									<label for="" class="col-sm-1 col-form-label">No Surat</label>
									<div class="col-sm-3">
										<input type="text" value="random" class="form-control" id="ba_lapangan_no_surat" name="ba_lapangan_no_surat" placeholder="">
									</div>

									
									<label for="" class="col-sm-1 col-form-label">File</label>
									<div class="col-sm-4">
										<input type="file" class="form-control" id="ba_lapangan_file" name="ba_lapangan_file" placeholder="">
									</div>
								</div>
							</div>
							<hr>

							<div class="form-group">
								<label>No Risalah Panitia</label>
								<div class="form-group row">
									<label for="" class="col-sm-1 col-form-label">No Surat</label>
									<div class="col-sm-3">
										<input type="text" value="random" class="form-control" id="no_risalah_panitia_no_surat" name="no_risalah_panitia_no_surat" placeholder="">
									</div>

									<label for="" class="col-sm-1 col-form-label">Tanggal</label>
									<div class="col-sm-2">
										<input type="text"  class="form-control datepicker" id="no_risalah_panitia_tanggal" name="no_risalah_panitia_tanggal" placeholder="">
									</div>
									<label for="" class="col-sm-1 col-form-label">File</label>
									<div class="col-sm-4">
										<input type="file" class="form-control" id="no_risalah_panitia_file" name="no_risalah_panitia_file" placeholder="">
									</div>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<label>No RPD</label>
								<div class="form-group row">
									<label for="" class="col-sm-1 col-form-label">No Surat</label>
									<div class="col-sm-3">
										<input type="text" value="random" class="form-control" id="no_rpd_no_surat" name="no_rpd_no_surat" placeholder="">
									</div>

									<label for="" class="col-sm-1 col-form-label">Tanggal</label>
									<div class="col-sm-2">
										<input type="text"  class="form-control datepicker" id="no_rpd_tanggal" name="no_rpd_tanggal" placeholder="">
									</div>
									<label for="" class="col-sm-1 col-form-label">File</label>
									<div class="col-sm-4">
										<input type="file" class="form-control" id="no_rpd_file" name="no_rpd_file" placeholder="">
									</div>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<label>Warkah</label>
								<div class="form-group row">
									<label for="" class="col-sm-1 col-form-label">No Surat</label>
									<div class="col-sm-3">
										<input type="text" value="random" class="form-control" id="warkah_no_surat" name="warkah_no_surat" placeholder="">
									</div>

									<label for="" class="col-sm-1 col-form-label">Tanggal</label>
									<div class="col-sm-2">
										<input type="text"  class="form-control datepicker" id="warkah_tanggal" name="warkah_tanggal" placeholder="">
									</div>
									<label for="" class="col-sm-1 col-form-label">File</label>
									<div class="col-sm-4">
										<input type="file" class="form-control" id="warkah_file" name="warkah_file" placeholder="">
									</div>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<label>No SK</label>
								<div class="form-group row">
									<label for="" class="col-sm-1 col-form-label">No Surat</label>
									<div class="col-sm-3">
										<input type="text" value="random" class="form-control" id="no_sk_no_surat" name="no_sk_no_surat" placeholder="">
									</div>

									<label for="" class="col-sm-1 col-form-label">Tanggal</label>
									<div class="col-sm-2">
										<input type="text"  class="form-control datepicker" id="no_sk_tanggal" name="no_sk_tanggal" placeholder="">
									</div>
									<label for="" class="col-sm-1 col-form-label">File</label>
									<div class="col-sm-4">
										<input type="file" class="form-control" id="no_sk_file" name="no_sk_file" placeholder="">
									</div>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<label>peruntukan</label>
								<input type="text" value="random" id="peruntukan" name="peruntukan" class="form-control" >
							</div>
							<div class="form-group">
								<label>tanggal_pengiriman_ke_loket</label>
								<input type="text"   id="tanggal_pengiriman_ke_loket" name="tanggal_pengiriman_ke_loket" class="form-control datepicker" >
							</div>

						</div>
						<div class="card-footer text-right">
							<button class="btn btn-primary">Submit</button>
						</div>

					</div>

				</form>
			</div>
		</div>
	</div>
</section>
@endsection
@section('js-export')
<script src="{{ base_url('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ base_url('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ base_url('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ base_url('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
@endsection
@section('js-inline')
<script>
	let $form = null;
	let $iNamaInstansi = null;
	let $iNamaPemohon = null;
	let $iFileKtp = null;
	let $iFilePBB = null;
	let $iFilePelepasanHak = null;
	let $iFileSertifikatTidakBerlaku = null;
	let $iFileKib = null;
	let $iFileSuratPenguasaan = null;
	let $iFileSuratPernyataan = null;
	$(function() {

		$form = $("#form-pnbp-hp");
		$iNamaInstansi = $("#nama_instansi");
		$iNamaPemohon = $("#nama_pemohon");
		$iFileKtp = $("#file_ktp");
		$iFilePBB = $("#file_pbb");
		$iFilePelepasanHak = $("#file_pelepasan_hak");
		$iFileSertifikatTidakBerlaku = $("#file_sertifikat_tidak_berlaku");
		$iFileKib = $("#file_kib");
		$iFileSuratPenguasaan = $("#file_surat_penguasaan");
		$iFileSuratPernyataan = $("#file_surat_pernyataan");

		$form.submit(function(event) {
			event.preventDefault();
			$(".invalid-feedback").remove();
			$(".is-invalid").removeClass('is-invalid');
			var formData = new FormData(this);

			$form.find(':submit').attr('disabled','disabled');
			$.ajax({
				url: "{{ base_url('pnbp/hp/store') }}",
				type: 'POST',
				data: formData,
				success: function (data) {
					if (data['success'] == "Y") {
						Swal.fire({
							title: 'Berhasil!',
							text: 'Berhasil menambah data !!!.',
							icon: 'success',
							timer: 1500	,
							showConfirmButton: false,

						})
						.then(() => {
							location.href="{{ base_url('pnbp/hp/index') }}";
						});
					} else {
						$form.find(':submit').attr('disabled',false);
						

						$.each(data.messages, function(key, value) {
							key = value.field;
							$('#'+key).addClass('is-invalid');
							$('#'+key).after('<div class="invalid-feedback">'+value.messages+'</div>');
						});
					}
				},
				cache: false,
				contentType: false,
				processData: false
			});

		});




	});
</script>
@endsection