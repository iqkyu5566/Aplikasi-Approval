<div class="col-xs-10 col-sm-offset-1">
<div class="panel panel-default">
<div class="panel-heading">
<strong>Penyusunan RKA</strong>
</div>
<div class="panel-body">

<!-- Tab panes -->
<div class="tab-content">
<div role="tabpanel" class="tab-pane active" id="letter">
	
	<?php echo form_open('rka/susun'); ?>

		<div class="form-group">
			<label for="">Akun</label>
			<select name="akun" id="input" class="form-control" required="required">
				<option value="">Pilih Akun</option>
				<?php foreach ($fetch->result() as $value): ?>
					<option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
				<?php endforeach ?>
			</select>
		</div>

		<div class="form-group">
			<label for="">Bulan</label>
			<select name="bulan" id="input" class="form-control" required="required">
				<option value="">Pilih Akun</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>
			</select>
		</div>

		<div class="form-group">
			<label>Nominal</label>
			<input type="number" name="nominal" id="input" class="form-control" value="" min="{5"} max="" step="" required="required" title="">
		</div>
						
	<div class="modal-footer">
		<button type="button" class="btn btn-reset" data-dismiss="modal">Reset</button>
		<input type="submit" class="btn btn-primary" value="Save"></button>
		</form>
	</div>
	</form>

</div>

</div>

</div>
</div>
</div>
