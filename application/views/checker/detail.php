<style type="text/css">
	#print {
		display: none;
	}
	@media print {
    #no_print {
        display: none;
    }
	#print {
		display: block;
	}
	}
</style>

<div id="no_print">

<div class="row">
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">

	<?php if ($database->status == "checked"): ?>
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Anggaran akan di check oleh approval ..</strong>
	</div>
	<?php endif; ?>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title" style="font-weight: bold"><?php echo $database->nama; ?></h3>
		</div>
		<div class="panel-body">

	<ul class="nav nav-tabs">
	  <li class="active"><a href="#info" data-toggle="tab" aria-expanded="true">Info Anggaran</a></li>
	  <li class=""><a href="#penerima" data-toggle="tab" aria-expanded="false">Penerima</a></li>
	  <li class=""><a href="#realisasi" data-toggle="tab" aria-expanded="false">Realisasi</a></li>
	  <li class=""><a href="#rka" data-toggle="tab" aria-expanded="false">Rencana Kerja Anggaran</a></li>
	</ul>
	<div id="myTabContent" class="tab-content">
	  <div class="tab-pane fade active in" id="info">

		<table class="table table-striped table-hover">
		  <tr>
		    <th>Status :</th>
		    <td>
		    	<?php if ($database->status == "declined"): ?>
			    	<span class="label label-danger"><b>Ditolak</b></span>
		    	<?php elseif ($database->status == "pending"): ?>
			    	<span class="label label-default"><b>Menunggu</b></span>
		    	<?php elseif($database->status == "checked"): ?>
			    	<span class="label label-primary"><b>Checked</b></span>
			    <?php else: ?>
			    	<span class="label label-success"><b>Approved</b></span>
		    	<?php endif ?>
		    </td>
		  </tr>
		  <tr>
		    <th>Keterangan :</th>
		    <td><?php echo $database->keterangan; ?></td>
		  </tr>
		  <tr>
		    <th>Tanggal Pengajuan:</th>
		    <td><?php echo $database->tanggal; ?></td>
		  </tr>
		  <tr>
		    <th>Nominal :</th>
		    <td><b>Rp.  <?php echo number_format($database->nominal,2,",","."); ?></b></td>
		  </tr>
		  <tr>
		    <th>Mekanisme Pembayaran :</th>
		    <td><?php echo $database->mekanisme_pembayaran; ?></td>
		  </tr>
		  <tr>
		    <th style="color: red">Alasan :</th>
		    <td style="color: red"><?php echo $database->alasan; ?></td>
		  </tr>
		</table>

	  </div>
	  <div class="tab-pane fade" id="penerima">

		<table class="table table-striped table-hover">
		  <tr>
		    <th>Nama :</th>
		    <td><b><?php echo $database->penerima_nama; ?></b></td>
		  </tr>
		  <tr>
		    <th>No Rekening :</th>
		    <td><b><?php echo $database->penerima_rekening; ?></b></td>
		  </tr>
		  <tr>
		    <th>Nama Bank</th>
		    <td><b><?php echo $database->penerima_namabank; ?></b></td>
		  </tr>
		  <tr>
		    <th style="color: red">Atas Nama Rekening :</th>
		    <td><b><?php echo $database->penerima_atasnamabank; ?></b></td>
		  </tr>
		</table>

	  </div>
	  <div class="tab-pane fade" id="realisasi">

		<table class="table table-striped table-hover">
		  <tr>
		    <th>Realisasi Bulan Ini :</th>
		    <td><b>Rp. <?php echo number_format($realisasi_bulan->total,2,",","."); ?></b></td>
		  </tr>
		  <tr>
		    <th>Realisasi Sejak Awal Tahun :</th>
		    <td><b>Rp. <?php echo number_format($realisasi_tahun->total,2,",","."); ?></b></td>
		  </tr>
		</table>

	  </div>
	  <div class="tab-pane fade" id="rka">

<?php if (!empty($rka)): ?>
		<table class="table table-striped table-hover">

				 <tr>
				 <th>January</th>
		    <td><b>Rp. <?php echo number_format($rka->January,2,",","."); ?></b></td>
		  </tr>
				 <tr>
				 <th>February</th>
		    <td><b>Rp. <?php echo number_format($rka->February,2,",","."); ?></b></td>
		  </tr>
				 <tr>
				 <th>March</th>
		    <td><b>Rp. <?php echo number_format($rka->March,2,",","."); ?></b></td>
		  </tr>
				 <tr>
				 <th>April </th>
		    <td><b>Rp. <?php echo number_format($rka->April,2,",","."); ?></b></td>
		  </tr>
				 <tr>
				 <th>May </th>
		    <td><b>Rp. <?php echo number_format($rka->May,2,",","."); ?></b></td>
		  </tr>
				 <tr>
				 <th>June </th>
		    <td><b>Rp. <?php echo number_format($rka->June,2,",","."); ?></b></td>
		  </tr>
				 <tr>
				 <th>July</th>
		    <td><b>Rp. <?php echo number_format($rka->July,2,",","."); ?></b></td>
		  </tr>
				 <tr>
				 <th>August</th>
		    <td><b>Rp. <?php echo number_format($rka->August,2,",","."); ?></b></td>
		  </tr>
				 <tr>
				 <th>September</th>
		    <td><b>Rp. <?php echo number_format($rka->September,2,",","."); ?></b></td>
		  </tr>
				 <tr>
				 <th>October</th>
		    <td><b>Rp. <?php echo number_format($rka->October,2,",","."); ?></b></td>
		  </tr>
				 <tr>
				 <th>November</th>
		    <td><b>Rp. <?php echo number_format($rka->November,2,",","."); ?></b></td>
		  </tr>
			<tr><th>December</th>
		    <td><b>Rp. <?php echo number_format($rka->December,2,",","."); ?></b></td>
		  </tr>

		  <tr>
		  	<th>Total</th>
		  	<td style="font-weight: bolder; color: red">Rp <?php echo number_format($rka_total->total,2,",","."); ?></td>
		  </tr>

		</table>	
	<?php else: ?>
	<br>
	<div class="alert alert-danger">
		<strong>Warning!</strong> RKA belum di input oleh maker
	</div>
	<?php endif ?>

	  </div>
	</div>

		</div>
	</div>
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <?php if ($database->status == "pending"): ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Hak anda sebagai checker</h3>
        </div>
        <ul class="list-group" id="accordion">
          <a href="<?php echo site_url('checker/approveanggaran/') . $this->uri->segment(3); ?>" title="">
			<li class="list-group-item"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Approve</li>
          </a>
          <a href="<?php echo site_url('checker/declineanggaran/') . $this->uri->segment(3); ?>" title="">
			<li class="list-group-item"><i class="fa fa-trash" aria-hidden="true"></i>Decline</li>
          </a>
          <?php if ($this->session->userdata('type') == "approval"): ?>          	
          <a href="window.print();" title="">
            <li class="list-group-item"><i class="fa fa-print" aria-hidden="true"></i>Print</li>
          </a>
          <?php endif ?>
        </ul>
    </div>
    <?php endif ?>

	</div>
</div>


</div>
<div id="print">
		<h1>Memo Instruksi</h1>
		<ul style="list-style: none">
			<li>Nomor : <?php echo $database->id; ?></li>
			<li>Tanggal : <?php echo $database->tanggal; ?></li>
			<li>Dari : Presiden Direktur</li>
			<li>Kepada : Pimpinan KSP Nasari KC. Jakarta</li>
			<li>Perihal : Penarikan Dana Tabungan Tuntas QQ Namalo Rek 6000639320</li>
		</ul>
		<hr>
		<p>Sehubungan dengan adanya kebutuhan operasional KPO, maka dengan ini kami menginstrusikan pembayaran melalui penarikan Dana Tabungan Tunas a/n Tetty ML Situmorang QQ Namalo Persada dengan Rician Biaya SBB:</p>
		<ul>
			<li><?php echo $database->nama; ?> <?php echo $database->tanggal; ?> sebesar Rp. <?php echo number_format($database->nominal,2,",","."); ?></li>
		</ul>
</div>