@extends('layouts.layout')
@section('css-export')
<link rel="stylesheet" href="{{ base_url("assets/modules/datatables/datatables.min.css") }}">
<link rel="stylesheet" href="{{ base_url("assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css") }}">


@endsection
@section('content')
<section class="section">
	<div class="section-header">
		<h1>PNBP - HP | Edit Data</h1>
		
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
										<input type="text" id="nama_instansi" name="nama_instansi" class="form-control" value="{{ $data['hp']->InfoPemilik->nama_instansi }}">
									</div>
									<div class="form-group">
										<label>Nama Pemohon</label>
										<input type="text" id="nama_pemohon" name="nama_pemohon" class="form-control" value="{{ $data['hp']->InfoPemilik->nama_pemohon }}">
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
								<label>file_surat_penguasaan_fisik</label>
								<input type="file" id="file_surat_penguasaan_fisik" name="file_surat_penguasaan_fisik" class="form-control" >
							</div>
							


						</div>

					</div>

					<div class="card">
						<div class="card-header">
							<h4>Data Penguasaan</h4>
						</div>
						<div class="card-body">
							
							
							<div class="form-group">
								<label>Your Name</label>
								<input type="text" class="form-control" >
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" >
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
	let $iFileSuratPenguasaanFisik = null;
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
		$iFileSuratPenguasaanFisik = $("#file_surat_penguasaan_fisik");

		$form.submit(function(event) {
			event.preventDefault();
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
						Swal.fire({
							title: 'Gagal!',
							text: 'Gagal menambah data !!!.',
							icon: 'error',
							timer: 1500	,
							showConfirmButton: false,

						})
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