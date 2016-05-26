<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/datatables/dataTables.bootstrap.css">

<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Daftar Pengajuan Proposal Kegiatan
            <small><?php echo $himpunan->nama ?></small>
            <small><?php echo $this->session->flashdata('error'); ?></small>
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Pengajuan</a></li>
            <li class="active">Logbook Pengajuan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?php echo base_url() ?>proposal_himpunan/upload_pengajuan"><button type="button" class="btn btn-default"><span class="fa fa-plus"></span> Tambah Pengajuan </button></a>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th align="center">No</th>
                                <th align="center">Pengaju</th>
                                <th align="center">Judul Proposal</th>
                                <th align="center">Tanggal Pengajuan</th>
                                <th align="center">Tanggal Upload Terakhir</th>
                                <th align="center">Status</th>
                                <th align="center">Penanggung Jawab</th>
                                <th colspan="2" align="center">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                <?php foreach ($proposals as $proposal) : ?>
                                  <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $proposal['pengaju']; ?></td>
                                    <td><?php echo $proposal['judul']; ?></td>  
                                    <td><?php echo $proposal['tanggal_pengajuan']; ?></td>
                                    <td><?php echo $proposal['tanggal_proposal_terakhir']; ?></td>
                                    <td>
                                        <?php if ($proposal['status_approve'] == 'y') { ?>
                                          <span class="label label-success">Disetujui</span></td>
                                        <?php } else if ($proposal['status_approve'] == 'n') { ?>
                                          <span class="label label-danger">Ditolak</span></td>
                                        <?php } else { ?>
                                          <span class="label label-warning">Pending</span></td>
                                        <?php }?>
                                    <td><?php echo $proposal['penanggungjawab']; ?></td>
                                    <td>
                                      <a href="<?php echo base_url('proposal_himpunan/detail_pengajuan?id='.$proposal['id']); ?>">
                                        <button class="btn btn-info pull-right"></i> Lihat Detail</button>
                                      </a>
                                    </td>
                                    <td>
                                    <?php if ($proposal['status_approve'] == 'y') { ?>
                                      <a href="<?php echo base_url() ?>proposal_himpunan/upload_lpj">
                                        <button class="btn btn-info pull-left"></i>Upload LPJ</button>
                                      </a>
                                    <?php } ?>
                                    </td>
                                  </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?> 
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable({
            "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true

        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>