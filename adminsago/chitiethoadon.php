<?php
    include "include/connect.php";
    include "module/xuly_dalogin.php";
   $id_hoadon=$_GET['id_hoadon'];
    $sql_hdon="select * FROM tbhoadon WHERE id_hoadon='$id_hoadon' ORDER BY id_hoadon DESC";
    $data_hdon=$o->query($sql_hdon);
    $arrHoaDon=$data_hdon->fetchAll(PDO::FETCH_ASSOC);

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
                                <strong class="card-title">CHI TIẾT HÓA ĐƠN <a style="font-size: 15px;font-weight: normal;"><i>#<?php echo $id_hoadon;?></i></a></strong>
                            </div>

                            <table width="100%" border="0px">
                                <tbody>
                                   <?php foreach ($arrHoaDon as $key => $v) {
                                        # code...
                                    ?>
                                    <tr>
                                        <!--donhang-->          
                                        <td colspan="2">Ngày đặt: <?php echo $v['ngaydat'];?></td>
                                        <td colspan="2">Tình trạng: <?php if($v['tinhtrang']=='pending'){
                                                ?>
                                                <span class="badge badge-pending" style="background-color: #e59443;color:white;">Đang chờ xử lý</span>
                                                
                                                <?php }
                                                else if($v['tinhtrang']=='complete'){
                                                 ?>
                                                <span class="badge badge-complete" style="background-color: #3de290;color:white;">Hoàn thành</span>
                                            <?php }
                                            else if($v['tinhtrang']=='cancel'){
                                                 ?>
                                                <span class="badge badge-complete" style="background-color: #ef3939;color:white;">Thất bại</span>
                                            <?php } ?></td>  
                                        
                                        <!--/donhang-->

                                    </tr>
                                   <?php
                                            $sql_cthdon="select tbchitiethoadon.gia,tbchitiethoadon.soluong, tbsanpham.hinhsp,tbsanpham.tensp FROM tbchitiethoadon INNER JOIN tbsanpham ON tbchitiethoadon.id_sanpham = tbsanpham.id_sanpham where id_hoadon ='$id_hoadon'";
                                            $data_cthdon=$o->query($sql_cthdon);
                                            $arrCTHoaDon=$data_cthdon->fetchAll(PDO::FETCH_ASSOC);
                                            
                                        ?>
                                        <?php
                                        $sumgia=0;
                                            foreach ($arrCTHoaDon as $key => $value) {
                                                # code...
                                            
                                    ?>
                                    <!--sp don hang-->  
                                    <tr>
                                        <td><hr><img  height="150px" width="150px" src="../img/<?php echo $value['hinhsp'];?>" /></td>
                                        <td><?php echo $value['tensp'];?></td>
                                        <td><?php echo dinhdangso($value['gia']);?> ₫</td>
                                        <td>x<?php echo $value['soluong'];?></td>   
                                    </tr>
                                    <?php
                                    $gia = $value['gia']*$value['soluong'];
                                    $sumgia+=$gia; } ?>
                                    <!--sp don hang-->  
                                    <tr>
                                        <td colspan="2">
                                            <hr>    <b>Địa chỉ giao hàng</b>
                                            <br>
                                               <?php echo $v['tennguoinhan'];?>
                                            <br>
                                                <?php echo $v['diachinguoinhan'];?>
                                            <br>
                                               +0<?php echo dinhdangso($v['sdtnguoinhan']);?>
                                        </td>
                                        <td colspan="2">
                                                <b>Tổng cộng<b>
                                            <br>   <?php echo dinhdangso($sumgia);?> ₫
                                        </td>
                                    </tr>
                                   <?php } ?>
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
