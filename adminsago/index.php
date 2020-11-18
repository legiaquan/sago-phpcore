<?php 
include "include/connect.php";
//unset($_SESSION['admindangnhap']);
include "module/xuly_dalogin.php";
$sql_tv ="select * from tbthanhvien";
$data_tv =$o->query($sql_tv);
$arrTV = $data_tv->fetchALL();
$dem =count($arrTV);
//doanhthu so sp ban duoc
$sql_dt="SELECT tbhoadon.id_hoadon, tbhoadon.id_user, tbhoadon.ngaydat, tbhoadon.tennguoinhan, tbhoadon.diachinguoinhan, tbhoadon.sdtnguoinhan, tbhoadon.tinhtrang, tbhoadon.ghichu, tbchitiethoadon.soluong, tbchitiethoadon.gia FROM tbhoadon INNER JOIN tbchitiethoadon ON tbchitiethoadon.id_hoadon = tbhoadon.id_hoadon where tbhoadon.tinhtrang = 'complete'";
$data_dt=$o->query($sql_dt);
$arrDT=$data_dt->FetchALL();
$sumdt=0;
foreach ($arrDT as $key => $v) {
    # code...
    $thanhtien= $v['gia']*$v['soluong'];
    $sumdt+=$thanhtien;
}
//so don hang complete
$dhcomplete = count($arrDT);
//don hang pending
$sql_pending="SELECT * from tbhoadon where tinhtrang = 'pending'";
$data_pending=$o->query($sql_pending);
$arrPending=$data_pending->FetchALL();
$dhpending = count($arrPending);
//DS DƠN
$sql_hd = "SELECT tbhoadon.id_hoadon, tbhoadon.id_user, tbhoadon.ngaydat, tbhoadon.tinhtrang,tbhoadon.tennguoinhan, tbhoadon.ghichu FROM tbhoadon order by tbhoadon.ngaydat desc";
    $datahd = $o->query($sql_hd);
    $arrHĐ = $datahd->fetchALL();

//
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
    <?php include "include/leftmenu.php"?>
    <!--/left menu-->
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <?php include "include/header.php"?>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text" style="font-size: 15px"><?php echo dinhdangso($sumdt);?> đ</div>
                                            <div class="stat-heading">Doanh thu</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><?php echo $dhcomplete;?></div>
                                            <div class="stat-heading">SẢN PHẨM ĐÃ BÁN</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><?php echo $dhpending  ;?></div>
                                            <div class="stat-heading">ĐH chờ</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><?php echo $dem;?></div>
                                            <div class="stat-heading">Users</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
               
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders" style="width: 150%">
                    <div class="row" >
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">5 ĐH chờ xử lý gần đây</h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th >ID_USER</th>
                                                    <th>ID_HÓA ĐƠN</th>
                                                    <th>Thời gian đặt</th>
                                                    <th>Họ tên</th>
                                                    <th>Tổng giá</th>
                                                    <th>Xem CTĐH</th>
                                                    <th>Status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($arrHĐ as $key => $v) {
                                                    # code...
                                                    if($v['tinhtrang']=='pending')
                                                     {   
                                                ?>
                                                <tr>
                                                    <td class="serial">1.</td>
                                                    <td>
                                                        <?php echo $v['id_user'];?>
                                                    </td>
                                                    <td><?php echo $v['id_hoadon'];
                                                    $id_hoadon = $v['id_hoadon'];
                                                    ?></td>
                                                    <td><?php echo $v['ngaydat'];?></td>
                                                    <td>  <span class="name"><?php echo $v['tennguoinhan'];?></span> </td>
                                                    <?php
                                                    //tinhtong tien
                                                    $sql_cthdon="select tbchitiethoadon.gia, tbsanpham.hinhsp FROM tbchitiethoadon INNER JOIN tbsanpham ON tbchitiethoadon.id_sanpham = tbsanpham.id_sanpham where id_hoadon ='$id_hoadon'";
                                                    $data_cthdon=$o->query($sql_cthdon);
                                                    $arrCTHoaDon=$data_cthdon->fetchAll(PDO::FETCH_ASSOC);
                                                    $sumgia=0;
                                                    foreach ($arrCTHoaDon as $key => $v) {
                                                        $sumgia+=$v['gia'];
                                            }
                                                ?>
                                                    <td> <span class="product"><?php echo dinhdangso($sumgia);?> đ</span> </td>
                                                    <td><span><a href="chitiethoadon?id_hoadon=<?php echo $id_hoadon;?>">Xem</a></span></td>
                                                    <td>
                                                        <span class="badge badge-pending">Pending</span>
                                                    </td>
                                                    
                                                </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                    </div>
                </div>
                <!-- /.orders -->
                <!-- Orders -->
                <div class="orders" style="width: 150%">
                    <div class="row" >
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">5 ĐH chờ xử lý gần đây</h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th >ID_USER</th>
                                                    <th>ID_HÓA ĐƠN</th>
                                                    <th>Thời gian đặt</th>
                                                    <th>Họ tên</th>
                                                    <th>Tổng giá</th>
                                                    <th>Xem CTĐH</th>
                                                    <th>Status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $stt=0;
                                                foreach ($arrHĐ as $key => $v) {
                                                    # code...
                                                    if($v['tinhtrang']=='complete')
                                                     {  
                                                     $stt++; 
                                                ?>
                                                <tr>
                                                    <td class="serial"><?php echo $stt;?></td>
                                                    <td>
                                                        <?php echo $v['id_user'];?>
                                                    </td>
                                                    <td><?php echo $v['id_hoadon'];
                                                    $id_hoadon = $v['id_hoadon'];
                                                    ?></td>
                                                    <td><?php echo $v['ngaydat'];?></td>
                                                    <td>  <span class="name"><?php echo $v['tennguoinhan'];?></span> </td>
                                                    <?php
                                                    //tinhtong tien
                                                    $sql_cthdon="select tbchitiethoadon.gia, tbsanpham.hinhsp FROM tbchitiethoadon INNER JOIN tbsanpham ON tbchitiethoadon.id_sanpham = tbsanpham.id_sanpham where id_hoadon ='$id_hoadon'";
                                                    $data_cthdon=$o->query($sql_cthdon);
                                                    $arrCTHoaDon=$data_cthdon->fetchAll(PDO::FETCH_ASSOC);
                                                    $sumgia=0;
                                                    foreach ($arrCTHoaDon as $key => $v) {
                                                        $sumgia+=$v['gia'];
                                            }
                                                ?>
                                                    <td> <span class="product"><?php echo dinhdangso($sumgia);?> đ</span> </td>
                                                    <td><span><a href="chitiethoadon?id_hoadon=<?php echo $id_hoadon;?>">Xem</a></span></td>
                                                    <td>
                                                        <span class="badge badge-complete">Complete</span>
                                                    </td>
                                                    
                                                </tr>
                                                <?php }
                                                if($stt==5)
                                                    {break;}
                                            } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                    </div>
                </div>
                <!-- /.orders -->
                <!-- To Do and Live Chat -->
               
                <!-- /To Do and Live Chat -->
                <!-- Calender Chart Weather  -->
                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="box-title">Chandler</h4> -->
                                <div class="calender-cont widget-calender">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div><!-- /.card -->
                    </div>

                   
                    
                </div>
                <!-- /Calender Chart Weather -->
                <!-- Modal - Calendar - Add New Event -->
                <div class="modal fade none-border" id="event-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add New Event</strong></h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /#event-modal -->
                <!-- Modal - Calendar - Add Category -->
                <div class="modal fade none-border" id="add-category">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add a category </strong></h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Choose Category Color</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                <option value="success">Success</option>
                                                <option value="danger">Danger</option>
                                                <option value="info">Info</option>
                                                <option value="pink">Pink</option>
                                                <option value="primary">Primary</option>
                                                <option value="warning">Warning</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
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
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

    
</body>
</html>
