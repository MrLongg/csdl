<?php  
    include_once'./ketnoi.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Panel</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <!--Icons-->
        <script src="js/lumino.glyphs.js"></script>

        [if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="quantri.php"><span>FABRIC </span>ADMIN</a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><span style="color: white;">Welcome !</span></a>
                            
                        </li>
                    </ul>
                </div>

            </div><!-- /.container-fluid -->
        </nav>

        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
            <ul class="nav menu">
                <li class="active"><a href="quantri.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Home </a></li>
                <li class="parent ">
                        <ul class="children collapse" id="sub-item-1">
                            <li>
                                <a href="quantri.php?page_layout=themtv">
                                    <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>
                                    Thêm mới
                                </a>
                            </li>
                        </ul>			
                </li>
                <li class="parent ">
                    <a href="quantri.php?page_layout=danhsachdm">
                        <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Categories Management
                    </a>			
                </li>
                <li class="parent ">
                    <a href="quantri.php?page_layout=danhsachsp">
                        <span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Product Management
                    </a>			
                </li>
                <li class="parent ">
                    <a href="quantri.php?page_layout=blsp">
                        <span data-toggle="collapse" href="#sub-item-4"><svg class="glyph stroked two messages"><use xlink:href="#stroked-chevron-down"/></svg></span> Order Management
                    </a>

                </li>
                <li class="parent ">
                    <a href="quantri.php?page_layout=supplier">
                        <span data-toggle="collapse" href="#sub-item-5"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Supplier Management
                    </a>		
                </li>


                
            </ul>

        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <?php  
                //master page
                if(isset($_GET['page_layout'])){
                    switch ($_GET['page_layout']) {
                        case 'danhsachsp':include_once'./chucnang/sanpham/danhsachsp.php';
                            break;
                        case 'danhsachdm':include_once'./chucnang/danhmuc/danhsachdm.php';
                            break;
                        case 'suadm':include_once'./chucnang/danhmuc/suadm.php';
                            break;
                        case 'suasp':include_once'./chucnang/sanpham/suasp.php';
                            break;
                        case 'themsp':include_once'./chucnang/sanpham/themsp.php';
                            break;
                        case 'themdm':include_once'./chucnang/danhmuc/themdm.php';
                            break;
                        case 'blsp': include_once'./chucnang/order/binhluan.php';
                            break;
                        case 'suabl': include_once'./chucnang/order/suabl.php';
                            break;
                        case 'quanlytv': include_once'./chucnang/thanhvien/quanlytv.php';
                            break;
                        case 'themtv': include_once'./chucnang/thanhvien/themtv.php';
                            break;
                        case 'suatv': include_once'./chucnang/thanhvien/suatv.php';
                            break;
                        case 'supplier': include_once'./chucnang/supplier/supplier.php';
                            break;
                        case 'themsupplier': include_once'./chucnang/supplier/themsupplier.php';
                            break;
                        case 'detail': include_once'./chucnang/supplier/detail.php';
                            break;
                        case 'suaquangcao': include_once'./chucnang/supplier/suaquangcao.php';
                            break;
                        default:include_once'./gioithieu.php';
                    }
                }
                else{
                    include_once'./gioithieu.php';
                }
            ?>
        </div>	<!--/.main-->

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/chart.min.js"></script>
        <script src="js/chart-data.js"></script>
        <script src="js/easypiechart.js"></script>
        <script src="js/easypiechart-data.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>	
        <script src="js/bootstrap-table.js"></script>
        <link rel="stylesheet" href="css/bootstrap-table.css"/>
        <script>
            $('#calendar').datepicker({
            });

            !function ($) {
                $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
                    $(this).find('em:first').toggleClass("glyphicon-minus");
                });
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);

            $(window).on('resize', function () {
                if ($(window).width() > 768)
                    $('#sidebar-collapse').collapse('show')
            })
            $(window).on('resize', function () {
                if ($(window).width() <= 767)
                    $('#sidebar-collapse').collapse('hide')
            })
        </script>	
    </body>

</html>
