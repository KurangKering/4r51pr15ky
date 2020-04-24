@extends('layouts.layout')
@section('css-export')
<link rel="stylesheet" href="{{ base_url("assets/modules/datatables/datatables.min.css") }}">
<link rel="stylesheet" href="{{ base_url("assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css") }}">


@endsection
@section('css-inline')
<style>
	#result-text {
		/*text-align: bold;
		font-size: 24px;*/
		color: #34395e;
	}
</style>
@endsection
@section('content')
<section class="section">
	{{-- <div class="section-header">
		<h1>Pencarian</h1>
		
	</div> --}}

	<div class="section-body">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-12"><h2 class="text-center mb-4">Pencarian Data</h2></div>
					<div class="col-6 offset-md-3 mb-4">
						<form id="form-pencarian">

							<div class="form-group">
								<div class="input-group mb-3">
									<input type="text" placeholder="Masukkan keyword..." id="pencarian" name="pencarian" class="form-control">
									<div class="input-group-append">
										<button class="btn btn-primary" type="submit" id="btn-generate"><i class="fas fa-search"></i></button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="col-12">
						<div class="result-area mb-4">
							<h5 id="result-text"></h5>
						</div>
						<hr>
						
						<div id="content" style="display: none">
							<table class="table table-striped" id="table-content">
								<thead>
									<tr>
										<th>No Sk</th>
										<th>Status Instansi</th>
										<th>Jenis Hak</th>
										<th>Nama Pemohon</th>
										<th>Nama Instansi</th>
										<th>Tgl Masuk</th>
										<th>Letak Tanah</th>
										<th>Action</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
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
@endsection

@section('js-inline')
<script>
	let $btnGenerate = null;
	let iPencarian = null;
	let $tableContent = null;
	let $divContent = null;
	let $resultText = null;
	let $formPencarian = null;
	$(function() {
		$btnGenerate = $("#btn-generate");
		iPencarian = $("#pencarian");
		$divContent = $("#content");
		$resultText = $("#result-text");
		$formPencarian = $("#form-pencarian");

		$tableContent = $("#table-content").DataTable({

			"columns": [
			{"data": "no_sk"},
			{"data": "status_instansi"},
			{"data": "jenis_hak"},
			{"data": "nama_pemohon"},
			{"data": "nama_instansi"},
			{"data": "tanggal_masuk"},
			{"data": "letak_tanah"},
			{"data": "action"},
			]
		});







		$formPencarian.submit(function(e) {
			e.preventDefault();
			$(this).find(':submit').attr('disabled','disabled');

			formData = {
				keyword: iPencarian.val(),
			};

			data = Object.keys(formData).map(key => encodeURIComponent(key) + '=' + encodeURIComponent(formData[key])).join('&');				
			url = "{{ base_url('pencarian/cari') }}";
			axios({
				url: url,
				method: "POST",
				data: data,
			})
			.then(res => {
				$(this).find(':submit').attr('disabled',false);
				data = res.data;
				console.log(data);

				$tableContent.clear();
				$tableContent.rows.add(data.content);
				$tableContent.draw();

				$resultText.html(data.text);

				if (data.total > 0 ) {
					$divContent.show();
				} else {
					$divContent.hide();
				}

			})
			.catch(err => {
				$(this).find(':submit').attr('disabled',false);

			});

		});
	});
</script>
@endsection