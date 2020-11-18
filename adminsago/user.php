<?php
    include "../include/connect.php";
    $sql_kh = "SELECT tbthanhvien.hoten, tbthanhvien.diachi, tbthanhvien.email, tbthanhvien.sdt, tbthanhvien.id_user, tbthanhvien.pass, tbthanhvien.hieuluc FROM tbthanhvien";
    $datakh = $o->query($sql_kh);
    $arrKH = $datakh->fetchALL();
  // print_r($arrKH);
    function dinhdangso(&$number)
    {
    $format_number = number_format($number, 0, '', '.');
    echo $format_number;
    }
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminSago - Quản lý Sago</title>
    <meta name="description" content="AdminSago - Quản lý Sago">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
    <!-- Left Panel -->
    <!--left menu-->
    <?php include "include/leftmenu.php";?>
    <!--/left menu-->
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <?php include "include/header.php";?>
        </header>
        <!-- /header -->
        <!-- Header-->


        <div class="content">

            <div class="animated fadeIn">
                <div class="row">
                
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header">
                                <strong class="card-title">Danh sách thành viên</strong>
                            </div>

                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered" style="font-size: 10px;">
                                    <thead>

                                        <tr>
                                            <th>STT</th>
                                            <th>Tài khoản</th>
                                            <th>Họ tên KH</th>
                                            <th>Địa chỉ</th>
                                            <th>Email</th>
                                            <th>SĐT</th>
                                            <th>Pass</th>
                                            <th>Hiệu lực</th>
                                            <th>Hành động</th>


                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                        
                                        <!-- data thanhvien-->
                                         
                                        <tr>
                                      <?php
                                      $i=1;
                                      foreach ($arrKH as $key => $value) {
                                      	$i++;
                                      
                                      ?>
                                          	<td><?php echo $i;?></td>
 											<td><?php echo $value['id_user']; ?></td>
 											<td><?php echo $value['hoten'];?></td>
 											<td><?php echo $value['diachi']; ?></td>
 											<td><?php echo $value['email'] ?></td>
 											<td><?php echo $value['sdt']; ?></td>
 											<td><?php echo $value['pass']; ?></td>
 											<td><?php echo $value['hieuluc']; ?></td>   
 											<td><a href="module/xoa_user.php?id=<?php echo $value['id_user'];?>">Xóa</a></td>   
 											
                                        </tr>
                                        <?php }
                                        ?>
                                         
                                        <!-- /data thanhvien-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>


</body>
</html>
