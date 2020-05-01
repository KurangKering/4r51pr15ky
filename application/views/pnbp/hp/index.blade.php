@extends('layouts.layout')
@section('css-export')
<link rel="stylesheet" href="{{ base_url("assets/modules/datatables/datatables.min.css") }}">
<link rel="stylesheet" href="{{ base_url("assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css") }}">


@endsection
@section('css-inline')

@endsection
@section('content')
<section class="section">
	<div class="section-header">
		<h1>PNBP - HP</h1>
		
	</div>

	<div class="section-body">
		<div class="card">
			<div class="card-header">
				<h4></h4>
				<div class="card-header-action">
					<button class="btn btn-primary" type="button" id="btn-tambah">Tambah Data</button>
					
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped" id="table-1">
						<thead>                                 
							<tr>
								<th>No Berkas</th>
								<th>Tanggal Masuk</th>
								<th>Nama Pemohon</th>
								<th>Nama Jalan</th>
								<th>Status Dokumen</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
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
	let $tablePnbpHp = null;
	$(function() {
		

		$tablePnbpHp = $('#table-1').DataTable({ 
			"bAutoWidth": false ,
			"processing": true, 
			"serverSide": true, 
			"order": [], 
			"ajax": {
				"url": '<?php echo base_url('pnbp/hp/jsonDataPnbpHp'); ?>',
				"type": "POST",


			},
			"columns": [
			{"data": "no_berkas"},
			{"data": "tanggal_masuk"},
			{"data": "nama_pemohon"},
			{"data": "nama_jalan"},
			{"data": "status_dokumen"},
			{"data": "action"},
			],
			'columnDefs': [
			
			{
				"targets": 1,
				"className" : 'action-no-wrap',

			},
			{
				"targets": 4,
				"className": "text-center",
				"searchable" : false,
				"orderable" : false,
				"className" : 'action-no-wrap',
				"className" : "text-center"

			},
			{
				"targets": 5,
				"className": "text-center",
				"searchable" : false,
				"orderable" : false,
				"className" : 'action-no-wrap',

			}],



		});


		$("#btn-tambah").click(function(event) {
			location.href = "{{ base_url('pnbp/hp/create') }}";
		});

		

	});
	function showDelete(id, no_berkas) {
		Swal.fire({
			title: 'Hapus ?',
			text: 'Yakin ingin menghapus data No Berkas : "' + no_berkas + '" ?.',
			icon: 'question',
			showCancelButton: true,


		})
		.then((option) => {
			if (option.value) {

				let formData = {
					id: id,
				};
				data = Object.keys(formData).map(key => encodeURIComponent(key) + '=' + encodeURIComponent(formData[key])).join('&')
				axios.post("{{ base_url("pnbp/hp/delete") }}", data)
				.then((res) => {
					data = res.data;
					Swal.fire({
						title: 'Deleted!',
						text: 'Your file has been deleted.',
						icon: 'success',
						timer: 500,
						showConfirmButton: false,

					})
					.then(() => {
						$tablePnbpHp.ajax.reload();

					})

				})
				.catch((error) => {
					Swal.fire({
						title: 'Gagal!',
						text: 'Tidak dapat menghapus data ini !!!.',
						icon: 'error',
						timer: 1500	,
						showConfirmButton: false,

					})
				});
			}
		})
	}
</script>
@endsection