<div class="col-xs-10 col-sm-offset-1">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
        <i class="fa fa-calendar-check-o" aria-hidden="true"></i> 
        Rencana Kerja Anggaran</h3>
    </div>
    <div class="panel-body">
    <div class="table-responsive">
    <table class="table table-striped table-hover table-responsive">
        <thead>
            <?php 
            $thismonth = date('F');
            ?>
            <tr>
                <th>Akun</th>
                <th><a>Bulan Ini (<?php echo $thismonth; ?>)</a></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($fetch->result() as $value): ?>
            <tr>
                <td><b><?php echo $value->nama; ?></b></td>
                <td>Rp. <?php echo number_format($value->$thismonth,2,",","."); ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>
    </div>
</div>
</div>