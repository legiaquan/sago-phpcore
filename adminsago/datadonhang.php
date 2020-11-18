<?php
    include "include/connect.php";
    $sql_hd = "SELECT tbhoadon.id_hoadon, tbhoadon.id_user, tbhoadon.ngaydat, tbhoadon.tennguoinhan, tbhoadon.diachinguoinhan, tbhoadon.sdtnguoinhan, tbhoadon.tinhtrang, tbhoadon.ghichu FROM tbhoadon order by tbhoadon.ngaydat desc";
    $datahd = $o->query($sql_hd);
    $arrHĐ = $datahd->fetchALL();
    $error = isset($_GET['error'])?$_GET['error']:'';
    echo $error;
    if($error=='tinhtrangcancel'){
        $message = "Không thể chuyển từ trạng thái HỦY sang các trạng thái khác!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    if($error=='tinhtrangcomplete'){
        $message = "Không thể chuyển từ trạng thái THÀNH CÔNG sang các trạng thái khác!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    // print_r($arrDH);
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
                                <strong class="card-title">Danh sách đơn hàng</strong>
                            </div>

                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered" style="font-size: 10px;">
                                    <thead>

                                        <tr>
                                            <th>STT</th>
                                            <th>Mã HĐ</th>
                                            <th>Tài khoản</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Tên người nhận</th>
                                            <th>Địa chỉ người nhận</th>
                                            
                                            <th>SĐT người nhận</th>
                                            <th>Tình trạng</th>
                                            <th>Tổng tiền</th>
                                            <th>Ghi chú</th>

                                            <th>Xem ĐH</th>
                                            <th>Xử lý</th>
                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                        
                                            
                                        
                                        
                                        <!-- data product-->
                                         
                                        <tr>
                                         <?php
                                      $i=1;
                                      foreach ($arrHĐ as $key => $value) {
                                        $i++;
                                      
                                      ?>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $value['id_hoadon'];?></td>
                                                <?php $id_hoadonct=$value['id_hoadon']; ?>
                                                <td><?php echo $value['id_user'];?></td>
                                                <td><?php echo $value['ngaydat'];?></td>
                                                <td><?php echo $value['tennguoinhan'];?></td>
                                                <td><?php echo $value['diachinguoinhan'];?></td>
                                          	    <td>+0<?php echo dinhdangso($value['sdtnguoinhan']);?></td>
                                                <td><?php if($value['tinhtrang']=='pending'){
                                                ?>
                                                <span class="badge badge-pending" style="background-color: #e59443;color:white;">Đang chờ xử lý</span>
                                                
                                                <?php }
                                                else if($value['tinhtrang']=='complete'){
                                                 ?>
                                                <span class="badge badge-complete" style="background-color: #3de290;color:white;">Hoàn thành</span>
                                            <?php }
                                            else if($value['tinhtrang']=='cancel'){
                                                 ?>
                                                <span class="badge badge-complete" style="background-color: #ef3939;color:white;">Thất bại</span>
                                            <?php } ?>
                                                </td>
                                                <?php
                                                    //tinhtong tien
                                                    $sql_cthdon="select tbchitiethoadon.gia, tbsanpham.hinhsp FROM tbchitiethoadon INNER JOIN tbsanpham ON tbchitiethoadon.id_sanpham = tbsanpham.id_sanpham where id_hoadon ='$id_hoadonct'";
                                                    $data_cthdon=$o->query($sql_cthdon);
                                                    $arrCTHoaDon=$data_cthdon->fetchAll(PDO::FETCH_ASSOC);
                                                    $sumgia=0;
                                                    foreach ($arrCTHoaDon as $key => $v) {
                                                        $sumgia+=$v['gia'];
                                            }
                                                ?>
                                                <td><?php echo dinhdangso($sumgia);?> ₫</td>
                                                <td><?php echo $value['ghichu'];?></td>
                                                <td><a href="chitiethoadon?id_hoadon=<?php echo $value['id_hoadon'];?>">Xem</a></td>
                                                <td>
                                                    <div class="dropdown show">
                                                          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Chọn
                                                          </a>

                                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="module/xuly_tinhtrang.php?id=<?php echo $value['id_hoadon'];?>&thaotac=complete" style="background-color: #3de290;color:white;">Hoàn thành</a>
                                                            <a class="dropdown-item" href="module/xuly_tinhtrang.php?id=<?php echo $value['id_hoadon'];?>&thaotac=pending" style="background-color: #e59443;color:white;">Đang chờ xử lý</a>
                                                            <a class="dropdown-item" href="module/xuly_tinhtrang.php?id=<?php echo $value['id_hoadon'];?>&thaotac=cancel" style="background-color: #ef3939;color:white;">Thất bại</a>
                                                          </div>
                                                        </div>
                                                </td>
                                                
                                        </tr>
                                        <?php }
                                        ?>
                                      
                                        <!-- /data product-->
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
