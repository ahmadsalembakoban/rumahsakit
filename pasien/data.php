
<?php include_once ('../_header.php'); ?>


<div class="box">
    <h1>Pasien</h1>
    <h4>
        <small>Data Pasien</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
            <a href="add.php" class="btn btn-success btn-xs">
                <i class="glyphicon glyphicon-plus"> Tambah Pasien</i>
            </a>
        </div>
    </h4>
    <form action="" method="post" name="proses">
    <div class="table-responsive">
        <table class="table table-stripped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nomor Identitas</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th class="text-center"><i class="glyphicon glyphicon-cog"></i></th>
                </tr> 
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>
</div>

<?php include_once ('../_footer.php'); ?>