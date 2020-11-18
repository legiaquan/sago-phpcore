<?php
    include "include/connect.php";
    include "module/xuly_dalogin.php";
    $id_sanpham=isset($_GET['id_sanpham'])?$_GET['id_sanpham']:"";
    echo $id_sanpham;
    $sql_sp="select * from tbsanpham where id_sanpham=$id_sanpham
    ";
    $data_sp=$o->query($sql_sp);
    $arrSanpham=$data_sp->FetchAll();
    //print_r($arrSanpham);
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
        <!-- /header --><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Sửa thông tin sản phẩm</h1>
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Basic</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                -->
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">

                    

                    <div class="col-lg-6" >
                        <div class="card">
                            <div class="card-header">
                                <strong>Thông tin sản phẩm</strong> 
                            </div>
                            <!--Sua product-->
                            <?php
                                foreach ($arrSanpham as $key => $v) {
                                    # code...
                                
                            ?>
                            <div class="card-body card-block">
                                <form action="module/xuly_sua" method="get" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Mã sản phẩm</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="id_sanpham" placeholder="Text" class="form-control" readonly="readonly" value="<?php echo $v['id_sanpham'];?>"><small class="form-text text-muted"  />
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên sản phẩm</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="tensp" placeholder="Text" class="form-control" value="<?php echo $v['tensp'];?>"><small class="form-text text-muted"  /></small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">ID Hãng</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="email-input" name="id_hangdt" placeholder="Enter Email" class="form-control" value="<?php echo $v['id_hangdt'];?>"><small class="help-block form-text"></small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">ID Nhóm</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="email-input" name="id_nhom" placeholder="Enter Email" class="form-control" value="<?php echo $v['id_nhom'];?>"><small class="help-block form-text"></small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Giá</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="email-input" name="gia" placeholder="Enter Email" class="form-control" value="<?php echo $v['gia'];?>"><small class="help-block form-text"></small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Số lượng</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="email-input" name="soluong" placeholder="Enter Email" class="form-control" value="<?php echo $v['soluong'];?>"><small class="help-block form-text"></small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Khuyến mãi</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="email-input" name="khuyenmai" placeholder="Enter Email" class="form-control" value="<?php echo $v['khuyenmai'];?>"><small class="help-block form-text"></small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">NEW</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="email-input" name="new" placeholder="Enter Email" class="form-control" value="<?php echo $v['new'];?>"><small class="help-block form-text"></small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">SEO</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="email-input" name="seo" placeholder="Enter Email" class="form-control" value="<?php echo $v['seo'];?>"><small class="help-block form-text"></small></div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Mô tả</label></div>
                                        <div class="col-12 col-md-9"><input  type="text" id="email-input" name="mota" placeholder="Enter Email" class="form-control" value="<?php echo $v['mota'];?>"><small class="help-block form-text"></small></div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <?php
                                }
                            ?>
                            <!--/Sua product-->
                            
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


</body>
</html>
