<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../koneksi.php';
include 'header.php';
?>

<div class="container"> 
    <div class="alert alert-info text-center"> 
        <h4 style="margin-bottom: 0px"> 
            <b>Selamat Datang !</b><br>
            <span style="font-size: 18px;">di sistem informasi laundry</span>
        </h4> 
    </div> 
</div>

<div class="panel">
    <div class="panel-heading">
        <h4>Dashboard</h4>
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>
                            <i class="glyphicon glyphicon-user"></i>

                            <span class="pull-right">
                                <?php
                                $pelanggan = mysqli_query(
                                    $koneksi,
                                    "select * from pelanggan"
                                );

                                echo mysqli_num_rows($pelanggan);
                                ?>
                            </span>
                        </h1>

                        Jumlah pelanggan
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h1>
                            <i class="glyphicon glyphicon-retweet"></i>

                            <span class="pull-right">
                                <?php
                                $proses = mysqli_query(
                                    $koneksi,
                                    "select * from  transaksi where status_transaksi='0'"
                                );

                                echo mysqli_num_rows($proses);
                                ?>
                            </span>
                        </h1>

                        Jumlah Cucian Diproses
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h1>
                            <i class="glyphicon glyphicon-info-sign"></i>

                            <span class="pull-right">
                                <?php
                                $proses = mysqli_query(
                                    $koneksi,
                                    "select * from transaksi where status_transaksi='1'"
                                );

                                echo mysqli_num_rows($proses);
                                ?>
                            </span>
                        </h1>

                        Jumlah Cucian Siap Diambil
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h1>
                            <i class="glyphicon glyphicon-ok-circle"></i>

                            <span class="pull-right">
                                <?php
                                $proses = mysqli_query(
                                    $koneksi,
                                    "select * from transaksi where status_transaksi='2'"
                                );

                                echo mysqli_num_rows($proses);
                                ?>
                            </span>
                        </h1>

                        Jumlah Cucian Selesai
                    </div>
                </div>
            </div>
            <div class="panel">
                <h4>Riwayat Transaksi Terakhir</h4>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="1%">No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Berat (KG)</th>
                        <th>Tgl. selesai</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>

                    <?php
                        $data = mysqli_query($koneksi, "select * from pelanggan, transaksi where pelanggan.id_pelanggan = transaksi.id_pelanggan order by id_transaksi desc");
                        $no = 1;
                        while ($d=mysqli_fetch_array($data)){
                    ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td>INVOICE-<?php echo $d['id_transaksi']; ?></td>
                                <td><?php echo $d['tgl_transaksi']; ?></td>
                                <td><?php echo $d['nama_pelanggan']; ?></td>
                                <td><?php echo $d['berat_transalksi']; ?></td>
                                <td><?php echo $d['tgl_selesai_transaksi']; ?></td>
                                <td><?php echo "Rp. ".number_format($d['harga_transaksi']). ",-"; ?></td>
                                <td>
                                    <?php
                                        if ($d['status_transaksi']=="0"){
                                            echo "<div class='label label-warning'>PROSES</div>";
                                        }elseif ($d['status_transaksi']=="1"){
                                            echo "<div class='label label-info'>DICUCI</div>";
                                        }elseif ($d['status_transaksi']=="2"){
                                            echo "<div class='label label-success'>SELESAI</div>";
                                        }
                                    ?>
                                </td>
                                
                            </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>