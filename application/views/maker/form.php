<div class="col-xs-12 col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">
<strong>Input Pengeluaran</strong>
<a href="<?php echo base_url(); ?>rka" class="btn-xs pull-right">
<i class="fa fa-angle-left"></i> 
Kembali
</a>
</div>
<div class="panel-body">

<!-- Tab panes -->
<div class="tab-content">
<div role="tabpanel" class="tab-pane active" id="letter">

<?php echo validation_errors(); ?>

<?php echo form_open('maker/index'); ?>

<!-- 	<div class="col-sm-12">
		<h4><i class="fa fa-file" aria-hidden="true"></i> Data Anggaran</h4>
	</div> -->

	<div class="form-group">
		<label for="inputEmail3">Transaksi</label>
		<select name="akun" id="input" class="form-control" required="required">
			<option value="">Pilih Jenis Transaksi</option>
	        <?php foreach ($select->result() as $value): ?>            
				<option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
	        <?php endforeach ?>
		</select>
	</div>

	<div class="form-group">
		<label for="inputPassword3" class="control-label">Nominal</label>
		  <input name="nominal" type="number" class="form-control" id="inputPassword3" placeholder="Masukan Nominal" required="required">
	</div>

	<div class="form-group">
		<label for="inputPassword3" class="control-label">Mekanisme Pembayaran</label>
		<select name="mekanisme_pembayaran" id="mekanisme" class="form-control" required="required">
			<option value="">Pilih Mekanisme Pembayaran</option>
			<option value="tunai">Tunai</option>
			<option value="transfer">Transfer</option>
		</select>
	</div>

	<div class="form-group">
		<label for="inputPassword3" class="control-label">Nama Penerima</label>
		<input name="penerima_nama" type="text" class="form-control" id="inputPassword3" placeholder="Masukan Nama Penerima" required="required">
	</div>

	<div id="pilihanbank">
	<div class="form-group">
		<label for="inputPassword3" class="control-label">Nomor Rekening</label>
		<input name="penerima_rekening" type="number" class="form-control" id="inputPassword3" placeholder="Masukan Nomor Rekening">
	</div>

	<div class="form-group">
		<label for="inputPassword3" class="control-label">Atas Nama Rekening</label>
		<input name="penerima_atasnamabank" type="text" class="form-control" id="inputPassword3" placeholder="Masukan Atas Nama Rekening">
	</div>

	<div class="form-group">
		<label for="inputPassword3" class="control-label">Nama Bank</label>
		<select name="penerima_namabank" id="input" class="form-control">
			<option value="">Pilih Nama Bank</option>
			<option value="Mandiri">Bank Indonesia</option>
			<option value="BCA">BCA</option>
			<option value="BTN">BTN</option>
			<option value="BNI">BNI</option>
			<option value="Mandiri">Mandiri</option>
			<option value="Lainnya">Lainnya</option>
		</select>
	</div>
	</div>

	<div class="form-group">
		<label for="inputPassword3" class="control-label">Keterangan</label>
		<textarea name="keterangan" id="input" class="form-control" rows="2" required="required"></textarea>
	</div>


	<div class="modal-footer">
		<button type="reset" class="btn btn-default" data-dismiss="modal">Reset</button>
		<input type="submit" class="btn btn-primary" value="Save"></button>
		</form>
	</div>
</form>

</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
$('#mekanisme').change(function(){
  if($(this).val() == 'transfer'){ // or this.value == 'volvo'
    $( "#pilihanbank" ).addClass( "show" );
  }
   if($(this).val() == 'tunai'){ // or this.value == 'volvo'
    $( "#pilihanbank" ).removeClass( "show" );
  }
});
</script>