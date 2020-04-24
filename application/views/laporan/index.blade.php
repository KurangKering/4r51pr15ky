@extends('layouts.layout')
@section('css-export')
<link rel="stylesheet" href="{{ base_url("assets/modules/datatables/datatables.min.css") }}">
<link rel="stylesheet" href="{{ base_url("assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css") }}">


@endsection
@section('content')
<section class="section">
	<div class="section-header">
		<h1>Laporan</h1>
		
	</div>

	<div class="section-body">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					
					<div class="card-body">
						<div class="form-group row mb-4">
							<label class="col-form-label text-md-right col-12 col-md-3 col-lg-4">Instansi</label>
							<div class="col-sm-12 col-md-5">
								<select name="status_instansi" id="status_instansi" class="form-control">
									<option value="">Semua Status</option>
									@foreach (hStatusInstansi() as $instansi => $hak)
									<option value="{{ $instansi }}">{{ $instansi }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row mb-4">
							<label class="col-form-label text-md-right col-12 col-md-3 col-lg-4">Hak</label>
							<div class="col-sm-12 col-md-5">
								<select name="jenis_hak" id="jenis_hak" class="form-control">
									<option value="">Semua Hak</option>
									@foreach (hStatusInstansi() as $instansi => $dataHak)
									@foreach ($dataHak as $hak)
									<option  data-chained="{{ $instansi }}" value="{{ $hak }}">{{ $hak }}</option>
									@endforeach
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row mb-4">
							<label class="col-form-label text-md-right col-12 col-md-3 col-lg-4">Tanggal Masuk Mulai</label>
							<div class="col-sm-12 col-md-5">
								<input type="text" id="start_date"  name="start_date" class="form-control ">
							</div>
						</div>
						<div class="form-group row mb-4">
							<label class="col-form-label text-md-right col-12 col-md-3 col-lg-4">Tanggal Masuk Sampai </label>
							<div class="col-sm-12 col-md-5">
								<input type="text" id="end_date" name="end_date" class="form-control ">
								
							</div>
						</div>
						
						
						<div class="form-group row mb-4">
							<label class="col-form-label text-md-right col-12 col-md-3 col-lg-4"></label>
							<div class="col-sm-12 col-md-5">
								<button class="btn btn-primary " type="button" id="btn-generate">Generate</button>
							</div>
						</div>
						

						

					</div>
					<div class="card-body">
						<div id="print-area">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	@endsection
	@section('js-export')

	@section('js-inline')
	<script>
		let $btnGenerate = null;

		let iStatusInstansi = null;
		let iJenisHak = null;
		let iStartDate = null;
		let iEndDate = null;

		$(function() {
			$btnGenerate = $("#btn-generate");
			iStatusInstansi = $("#status_instansi");
			iJenisHak = $("#jenis_hak");
			iStartDate = $("#start_date");
			iEndDate = $("#end_date");

			$("#jenis_hak").chained("#status_instansi");

			
			
			iStartDate.daterangepicker({
				singleDatePicker: true,
				showDropdowns: true,
				locale: {
					format: 'DD-MM-YYYY'
				},
			}, function(start, end, label) {
				iEndDate.daterangepicker({
					singleDatePicker: true,
					showDropdowns: true,
					minDate: start,
					locale: {
						format: 'DD-MM-YYYY'
					},


				});
			});

			iEndDate.daterangepicker({
				singleDatePicker: true,
				showDropdowns: true,
				locale: {
					format: 'DD-MM-YYYY'
				},
				minDate: iStartDate.val(),
				

			});





			$btnGenerate.click(function(e) {
				formData = {
					status_instansi: iStatusInstansi.val(),
					jenis_hak: iJenisHak.val(),
					start_date: iStartDate.val(),
					end_date: iEndDate.val(),
				};

				data = Object.keys(formData).map(key => encodeURIComponent(key) + '=' + encodeURIComponent(formData[key])).join('&');
				encoded = btoa(data);			
				url = "{{ base_url('laporan/generateLaporan?x=') }}"+encoded;
				window.open(url, "_blank");

			});
		});
	</script>
	@endsection