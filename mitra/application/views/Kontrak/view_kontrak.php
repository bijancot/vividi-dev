<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Hubungi Kami
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-laptop"></i> Home</a></li>
            <li class="active">Upload Kontrak</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body pad" style="min-height: 500px">
                        <br/>
                        <?php

                        if ($this->session->flashdata("message")) {
                            echo "
            <div class='alert alert-success'>
              " . $this->session->flashdata("message") . "
            </div>
            ";
                        }
                        ?>
                        <h4 align="center">Upload Kontrak Hotel Anda</h4>
                        <br/>
                        <form method="post" action="<?php echo base_url(); ?>Kontrak/send"
                              enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Masukkan Nama Hotel</label>
                                    <select class="form-control" name="properti">
                                        <option value="">-- Pilih --</option>
                                        <?php
                                        foreach ($prpti as $r) { ?>
                                            <option value="<?php echo $r->Judul; ?>"><?php echo $r->Judul; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Masukkan Tanggal Mulai dan Berakhir Kontrak</label>
                                    <div>
                                        <input id="litepicker" class="form-control" name="tgl"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Upload Kontrak Anda</label>
                                    <input type="file" name="kontrak" accept=".doc,.docx, .pdf" required/>
                                </div>
                            </div>

                            <div class="form-group" align="center">
                                <input type="submit" name="submit" value="Kirim" class="btn btn-info"/>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>

<script src="https://cdn.jsdelivr.net/npm/litepicker@1.0.19/dist/js/main.js"></script>
<script src="<?php echo base_url('assets/js/demo_kontrak.js'); ?>"></script>
