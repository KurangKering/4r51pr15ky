<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan</title>
	<link rel="stylesheet" href="">
</head>
<body>

	<table>
		<tr>
			<th>No</th>
			<th>Tgl 
				Masuk
			</th>
			<th>No
				Berkas
			</th>
			<th>Permohonan
				HGB/HP
			</th>
			<th>Pemohon
				Nama
			</th>
			<th>Letak Tanah
				Kel/Kec
				Jalan
				Luas
			</th>
			<th>Surat Tugas
				Panitia
			</th>
			<th>Surat Tugas
				Kelapangan
			</th>
			<th>BA Lapang</th>
			<th>No Risalah
				Panitia
			</th>
			<th>No
				RPD
			</th>
			<th>Warkah
				D1307
				Tanggal
				HP
			</th>
			<th>No
				SK
			</th>
			<th>Peruntukan</th>
			<th>Tgl Pengiriman
				Ke Loket
			</th>
			<th>KET</th>
		</tr>
		<?php foreach ($data['transaksi'] as $key => $transaksi): ?>
			<tr>
				<td><?php echo $transaksi->id ?></td>
				<td><?php echo $transaksi->DataPenguasaan->tanggal_masuk ?></td>
				<td><?php echo $transaksi->DataPenguasaan->no_berkas ?></td>
				<td><?php echo $transaksi->DataPenguasaan->nama_pemohon ?></td>
				<td><?php echo $transaksi->DataPenguasaan->nama_jalan ?></td>
				<td><?php echo $transaksi->DataPenguasaan->stp_no_surat ?></td>
				<td><?php echo $transaksi->DataPenguasaan->stk_no_surat ?></td>
				<td><?php echo $transaksi->DataPenguasaan->ba_lapangan_no ?></td>
				<td><?php echo $transaksi->DataPenguasaan->no_risalah_panitia_no_surat ?></td>
				<td><?php echo $transaksi->DataPenguasaan->no_rpd_no_surat ?></td>
				<td><?php echo $transaksi->DataPenguasaan->warkah_no_surat ?></td>
				<td><?php echo $transaksi->DataPenguasaan->no_sk_no_surat ?></td>
				<td><?php echo $transaksi->DataPenguasaan->peruntukan ?></td>
				<td><?php echo $transaksi->DataPenguasaan->tanggal_pengiriman_ke_loket ?></td>
				<td></td>
			</tr>
		<?php endforeach ?>
	</table>
	
</body>
</html>