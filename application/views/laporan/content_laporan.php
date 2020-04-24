<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan</title>
	<style>
		/* Style definitions for pdfs */

		/**********************************************************************/
/* Default style definitions
/**********************************************************************/

/* General
-----------------------------------------------------------------------*/
body {
	background-color: #114C8D;
	color: #000033;
	font-family: "verdana", "sans-serif";
	margin: 0px;
	padding-top: 0px;
	font-size: 1em;
}

h1 {
	font-size: 1.1em;
	color: #114C8D;
	font-style: italic;
}

h2 {
	font-size: 1.05em;
	color: #114C8D;
}

h3 { 
	font-size: 1em;
	color: #114C8D;
}

img { 
	border: none;
}

img.border {
	border: 1px solid #114C8D;
}

pre {
	font-family: "verdana", "sans-serif";
	color: #FFFFff;
	font-size: 0.7em;
}

ul {
	color: #BEAC8B;
	list-style-type: circle;
	list-style-position: inside;
	margin: 0px;
	padding: 3px;
}

li { 
	color: #000033;
}

li.alpha {
	list-style-type: lower-alpha;
	margin-left: 15px;
}

p {
	font-size: 0.8em;
}

a:link,
a:visited {
	text-decoration: none;
	color: #114C8D;
}

a:hover {
	text-decoration: underline;
	color: #860000;
}

hr {
	border: 0;
}

#page_header { 
	position: relative; /* required to make the z-index work */  
	z-index: 2;
}

#body { 
	background-color: #F9F0E9;
	padding: 12px 0.5% 2em 3px;
	min-height: 20em;
	margin: 0px;
	width: 100%;
}

#body pre {
	color: #000033;
}

#left_column { 
	width: 84%;
	height: auto;
	padding-right: 8px;
	padding-bottom: 30px;
}

#right_column {
/*  position: absolute;
right: 0.5%;*/
padding-left: 16px;
width: 15%;
min-width: 160px;
}




/* Footer
-----------------------------------------------------------------------*/
#footer {
	color: #FFFFff;
	border-top: 1px solid #000033;
}

#copyright { 
	padding: 5px;
	font-size: 0.6em;
	background-color: #114C8D;
}

#footer_spacer_row {
	border-spacing: 0;
	width: 100%;
}

#footer_spacer_row td {
	padding: 0px;
	border-bottom: 1px solid #000033;
	background-color: #F7CF07;
	height: 2px;
	font-size: 2px;
	line-height: 2px;
}

#logos {
	padding: 5px;
	float: right;
}





/* Tables
-----------------------------------------------------------------------*/
table {
	empty-cells: show;
}

.head td {
	color: #8B7958;
	background-color: #E5D9C3;
	font-weight: bold;
	font-size: 0.7em;
	padding: 3px;
}

.head input {
	font-weight: normal;
}

.sub_head td {
	border: none;
	white-space: nowrap;
	font-size: 10px;
}

.foot td {
	color: #8B7958;
	background-color: #E5D9C3;
	font-size: 0.8em;
}

.label {
	color: #8B7958;
	background-color: #F8F5F2;
	padding: 3px;
	font-size: 0.75em;
}

.label_right {
	color: #8B7958;
	background-color: #F8F5F2;
	padding: 3px;
	font-size: 0.75em;
	text-align: right;
	padding-right: 1em;
}

.sublabel {
	color: #8B7958;
	font-size: 0.6em;
	padding: 0px;
	text-align: center;
}

.field {
	color: #000033;
	background-color: #F9F0E9;
	padding: 3px;
	font-size: 0.75em;
}

.field_center {
	color: #000033;
	background-color: #F9F0E9;
	padding: 3px;
	font-size: 0.75em;  
	text-align: center;
}

.field_nw {
	color: #000033;
	background-color: #F9F0E9;
	padding: 3px;
	font-size: 0.75em;
	white-space: nowrap;
}

.field_money {
	color: #000033;
	background-color: #F9F0E9;
	padding: 3px;
	font-size: 0.75em;
	white-space: nowrap;
	text-align: right;
}

.field_total {
	color: #000033;
	background-color: #F9F0E9;
	padding: 3px;
	font-size: 0.75em;
	white-space: nowrap;
	text-align: right;
	font-weight: bold;
	border-top: 1px solid black;
}

/* Table Data
-----------------------------------------------------------------------*/
.h_scrollable { 
	overflow: -moz-scrollbars-horizontal;
}

.v_scrollable { 
	overflow: -moz-scrollbars-vertical;
}

.scrollable {
	overflow: auto;/*-moz-scrollbars-horizontal;*/
}

tr.head>td.center,
tr.list_row>td.center,
.center {
	text-align: center;
}

.left,
tr.head>td.left,
tr.list_row>td.left { 
	text-align: left;
	padding-left: 2em;
}

.total,
.right,
.list tr.head td.right,
tr.list_row td.right,
tr.foot td.right,
tr.foot td.total {
	text-align: right;
	padding-right: 2em;
}

.list tr.foot td {
	font-weight: bold;
}

.no_wrap {
	white-space: nowrap;
}

.bar {
	border-top: 1px solid black;
}

.total {
	font-weight: bold;
}

.summary_spacer_row {
	line-height: 2px;
}

.light { 
	color: #999999;
}

/* Detail
-----------------------------------------------------------------------*/
.fax_head,
.narrow,
.detail {
	border-spacing: 1px;
	border-top: 1px solid #8B7958;
	border-bottom: 1px solid #8B7958;
	width: 99%;
	padding: 3px;
	margin-bottom: 10px;
}

.detail td.label {
	width: 16%;
	background-color: #F9F0E9;
}

.detail td.field {
	width: 33%;
	text-align: center;
	background-color: #F8F5F2;
}

.detail_spacer_row td {
	background-color: #BEAC8B;
	font-size: 2px;
	line-height: 2px;
	padding: 0px;
	border-top: 1px solid #F9F0E9;
	border-bottom: 1px solid #F9F0E9;
}

.detail td.field_money {
	width: 33%;
	background-color: #F8F5F2;
}

.narrow {
	width: 60%;
}

.narrow td.label { 
	width: 50%;
	background-color: #F9F0E9;
}

.narrow td.field_money,
.narrow td.field_total,
.narrow td.field { 
	width: 49%;
}

.narrow td.field_money,
.narrow td.field { 
	background-color: #F8F5F2;
}

.narrow td.field_total,
.narrow td.field_money {
	padding-right: 4em;
}

.detail td.field {
	text-align: center;
	background-color: #F8F5F2;
}

.fax_head td.label {
	width: 7%;
}

.fax_head td.field {
	width: 26%;
}

.operation {
	width: 1%;
}


/* Lists
-----------------------------------------------------------------------*/
.list {
	border-collapse: collapse;
	border-spacing: 0px;
	border-top: 1px solid #8B7958;
	border-bottom: 1px solid #8B7958;
	width: 99%;
	margin-top: 3px;
}

.list tr.head td {
	font-size: 0.7em;
	white-space: nowrap;
	padding-right: 0.65em;
	border-bottom: 1px solid #8B7958;
}

.list table.sub_head td {
	border: none;
	white-space: nowrap;
	font-size: 10px;
}

.list tr.foot td {
	border-top: 1px solid #8B7958;
	font-size: 0.7em;
}

tr.list_row>td {
	background-color: #EDF2F7;
	border-bottom: 1px dotted #8B7958;
	font-size: 0.65em;
	padding: 3px;
}

tr.list_row:hover td {
	background-color: #F8EEE4;
}

tr.problem_row>td {
	background-color: #FDCCCC;
	border-bottom: 1px dotted #8B7958;
	font-size: 0.65em;
	padding: 3px;
}

tr.problem_row:hover td {
	background-color: #F8EEE4;
}

.row_form td {
	font-size: 0.7em;
	padding: 3px;
	white-space: nowrap;
	/*  text-align: center; */
}

.row_form td.label {
	text-align: left;
	white-space: normal;
}

.inline_header td {
	color: #8B7958;
	font-size: 0.6em;
	white-space: nowrap;
	text-align: center;
}


/* Reports
-----------------------------------------------------------------------*/
.report { 
	border-collapse: collapse;
	border-spacing: 0px;
	border-top: 1px solid #8B7958;
	border-bottom: 1px solid #8B7958;
	width: 80%;
	margin-top: 3px;
}

.report tr td { 
	padding: 4px 6px;
}

.report tr.head td { 
	font-size: 0.7em;
	white-space: nowrap;
	text-align: center;
	border-bottom: 1px solid #8B7958;
}

.report tr.foot td { 
	font-size: 0.7em;
	border-top: 1px solid #8B7958;
}

.report tr.list_row>td { 
	background-color: #EDF2F7;
	border-bottom: 1px dotted #8B7958;
	font-size: 0.65em;
}

.report tr.list_row:hover td { 
	background-color: #F8EEE4;
}

.report td.total_col {
	font-weight: bold;
	border-left: 1px dotted #8B7958;
	text-align: center;  
	width: 10%;
}

.report tr.head td.group_col { 
	text-align: left;
}

.report td.group_col { 
	font-weight: bold;
	text-align: left;
	border-right: 1px dotted #8B7958;
	width: 12%;
}

.graph { 
	width: 80%;
	margin-top: 2em;
	margin-bottom: 3em;
	text-align: center;
}

/* Style definitions for printable pages */


/* Hide non-printing stuff
-----------------------------------------------------------------------*/
#page_header,
#main_menu,
#right_column,
#footer {
	display: none;
}

/* General
-----------------------------------------------------------------------*/
@page { 
	margin: 0.25in;
}

body { 
	background-color: white;
	color: black;
}

h1 {
	color: black;
}

h2 {
	color: black;
}

pre {
	color: black;
}

ul {
	color: black;
}

a:link,
a:visited {
	color: black;
}

a:hover {
	text-decoration: none;
	color: black;
}

p a {
	display: none;
}

#body { 
	background-color: white;
}

#body pre {
	color: black;
}

/* Tables
-----------------------------------------------------------------------*/
.head td {
	color: black;
	background-color: white;
}

.head input {
}

.foot td {
	color: black;
	background-color: white;
}

.label {
	color: black;
	background-color: white;
}

.sublabel {
	color: black;
}

.field {
	color: black;
	background-color: white;
}

.field_center {
	color: black;
	background-color: white;
}

.field_nw {
	color: black;
	background-color: white;
}

.field_money {
	color: black;
	background-color: white;
}

.field_total {
	color: black;
	background-color: white;
}

/* Detail
-----------------------------------------------------------------------*/
.detail {
	border-top: 1px solid black;
	border-bottom: 1px solid black;
}

.detail td.label {
	background-color: white;
}

.detail td.field_total,
.detail td.field {
	font-weight: bold;
	background-color: #eee;
}

.detail td.field_money { 
	background-color: #eee;
}

.detail_spacer_row td {
	background-color: white;
	border-top: 1px solid black;
	border-bottom: 1px solid black;
}

.narrow td.label {
	background-color: white;
}

.narrow td.field {
	background-color: #eee;
}

/* Wizards
-----------------------------------------------------------------------*/
.wizard {
	border-top: 1px solid black;
	border-bottom: 1px solid black;
}

/* Forms
-----------------------------------------------------------------------*/
.form {
	border-top: 1px solid black;
	border-bottom: 1px solid black;
}

/* Lists
-----------------------------------------------------------------------*/
.list {
	border-top: 1px solid black;
	border-bottom: 1px solid black;
}

.list tr.head>td {
	border-bottom: 1px solid black;
}
.list tr.foot td {
	border-top: 1px solid black;
}

tr.list_row>td {
	background-color: white;
	border-bottom: 1px dotted #666;
}

tr.list_row:hover td {
	background-color: white;
}

/* General
-----------------------------------------------------------------------*/
body { background-color: white; }

/* Detail
-----------------------------------------------------------------------*/

.narrow td.field,
.detail td.field { 
	text-align: left;
	padding-left: 1em;
	background-color: white;
}

/* Lists
-----------------------------------------------------------------------*/
.list tr.head td { 
	background-color: #eee;
}

tr.list_row>td {
	background-color: white;
	border-bottom: 0.7pt solid #666;
}

.list tr.foot td { 
	background-color: #eee;
}

/* Pages
-----------------------------------------------------------------------*/
.page { 
	font-size: 1em;
	border: none;
	margin: none;
	width: auto;
	padding: 0px;
}

.foot td { 
	font-size: 1em;
}


.page>*>p, .page>p { 
	font-size: 0.8em;
}


table.signature_table { 
	width: 88%;
	font-size: 0.6em;  
}

#special_conditions { 
	font-size: 1.5em;
}

.header h1 {
	font-size: 0.8em;
}

p.small { 
	font-size: 0.8em;
}

.page td {
	padding: 1px;
}

td.label {
	font-size: 0.7em;
}

td.field {
	font-size: 0.7em;
}

td.field_money {
	font-size: 0.7em;
}
td {
	border: 1px solid;
}
</style>
</head>
<body>

	<table class="list" style="width: 100%; margin-top: 1em;">
		

		<tr class="head">
			<td class="center" style="width: 1%">No</td>
			<td class="center" style="width: 4%">Tgl <br> 
				Masuk
			</td>
			<td class="center" >No <br>
				Berkas
			</td>
			<td class="center" style="width: 2%">Permohonan <br>
				HGB/HP
			</td>
			<td class="center" style="width: 13%">Pemohon <br>
				Nama
			</td>
			<td class="center" >Letak Tanah <br>
				Kel/Kec <br>
				Jalan <br>
				Luas
			</td>
			<td class="center" >Surat Tugas <br>
				Panitia
			</td>
			<td class="center" >Surat Tugas <br>
				Kelapangan
			</td>
			<td class="center" >BA Lapang</td>
			<td class="center" >No Risalah <br>
				Panitia
			</td>
			<td class="center" >No <br>
				RPD
			</td>
			<td class="center" >Warkah <br>
				D1307 <br>
				Tanggal <br>
				HP
			</td>
			<td class="center" >No <br>
				SK
			</td>
			<td class="center" >Peruntukan</td>
			<td class="center" style="width: 1%" >Tgl Pengiriman <br>
				Ke Loket
			</td>
			<td class="center" >KET</td>
		</tr>
		<?php foreach ($data['transaksi'] as $key => $transaksi): ?>
			<tr class="list_row">
				<td class="center"><?php echo $transaksi->id ?></td>
				<td style="white-space: nowrap"><?php echo indoDate($transaksi->DataPenguasaan->tanggal_masuk, 'd-m-Y') ?></td>
				<td><?php echo $transaksi->DataPenguasaan->no_berkas ?></td>
				<td class="center"><?php echo $transaksi->jenis_hak ?></td>
				<td><?php echo $transaksi->DataPenguasaan->nama_pemohon  ?></td>
				<td><?php echo $transaksi->DataPenguasaan->nama_jalan ?></td>
				<td><?php echo $transaksi->DataPenguasaan->stp_no_surat ?></td>
				<td><?php echo $transaksi->DataPenguasaan->stk_no_surat ?></td>
				<td><?php echo $transaksi->DataPenguasaan->ba_lapangan_no ?></td>
				<td><?php echo $transaksi->DataPenguasaan->no_risalah_panitia_no_surat ?></td>
				<td><?php echo $transaksi->DataPenguasaan->no_rpd_no_surat ?></td>
				<td><?php echo $transaksi->DataPenguasaan->warkah_no_surat ?></td>
				<td><?php echo $transaksi->DataPenguasaan->no_sk_no_surat ?></td>
				<td><?php echo $transaksi->DataPenguasaan->peruntukan ?></td>
				<td class="center"><?php echo indoDate($transaksi->DataPenguasaan->tanggal_pengiriman_ke_loket, 'd-m-Y') ?></td>
				<td></td>
			</tr>
		<?php endforeach ?>
	</table>
	
</body>
</html>