<div class="row">
  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-check-square-o" aria-hidden="true"></i> Approval
        </h3>
      </div>
      <div class="panel-body">
        <table id="example" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Transaksi</th>
                        <th>Tanggal</th>
                        <th><a href=""><b>Nominal</b></a></th>
                        <th>Nama<br> Penerima</th>
                        <th><a href=""><b>Status</b></a></th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Transaksi</th>
                        <th>Tanggal</th>
                        <th style="font-weight: bolder;"><a href="">Nominal</a></th>
                        <th>Nama <br> Penerima</th>
                        <th style="font-weight: bolder;"><a href="">Status</a></th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>

                <?php foreach ($alldata->result() as $value): ?>
                    <tr>
                        <td style="font-weight: bolder; width: 20%"><?php echo $value->nama; ?></td>
                        <td><?php echo $value->tanggal; ?></td>
                        <td style="font-weight: bolder;">
                          Rp. <?php echo number_format($value->nominal,2,",","."); ?>
                        </td>
                        <td><?php echo $value->penerima_nama; ?></td>
                        
                        <?php if ($value->status == "declined"): ?>
                          <td style="font-weight: bolder; color: red">Ditolak</td>
                        <?php elseif($value->status == "pending"): ?>
                          <td>Menunggu</td>
                        <?php elseif($value->status == "approved"): ?>
                          <td style="font-weight: bolder; color: green">Approved</td>
                        <?php else: ?>
                          <td style="font-weight: bolder; color: blue">Checked</td>
                        <?php endif ?>
                        
                        <td>
                        <a href="<?php echo base_url(); ?>approval/detail/<?php echo $value->idanggaran; ?>" type="button" class="btn btn-xs btn-block btn-info">Lihat Detail</a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Filter berdasarkan Tanggal</h3>
        </div>
        <ul class="list-group">
          <a href="<?php echo base_url(); ?>approval/index/thisday" title="">
            <li class="list-group-item <?php if($this->uri->segment(3) == "thisday"){echo 'active'; }else { echo ''; } ?>">Hari ini <span class="badge"><?php echo $this->DBApproval->TabelHariIni($this->session->userdata('perusahaan'))->num_rows(); ?></span></li>
          </a>
          <a href="<?php echo base_url(); ?>approval/index/thismonth" title="">
            <li class="list-group-item <?php if($this->uri->segment(3) == "thismonth"){echo 'active'; }else { echo ''; } ?>">Bulan ini <span class="badge"><?php echo $this->DBApproval->TabelBulanIni($this->session->userdata('perusahaan'))->num_rows(); ?></span></li>
          </a>
          <a href="<?php echo base_url(); ?>approval/index/thisyear" title="">
            <li class="list-group-item <?php if($this->uri->segment(3) == "thisyear"){echo 'active'; }else { echo ''; } ?>">Tahun <?php echo date("Y"); ?> <span class="badge"><?php echo $this->DBApproval->TabelTahunIni($this->session->userdata('perusahaan'))->num_rows(); ?></span></li>
          </a>
        </ul>
    </div>
  </div>
</div>