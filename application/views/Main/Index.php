<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ยินดีต้อนรับ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/jquery-ui-1.11.2.custom/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="assets/tkahn-Smooth-Div-Scroll-1c3b3a6/css/smoothDivScroll.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/van/van.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/theme1.css" rel="stylesheet" type="text/css"/>

        <script src="assets/js/jquery.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/jquery-ui-1.11.2.custom/jquery-ui.min.js" type="text/javascript"></script>
        <script src="assets/js/jqueryui_datepicker_thai.js" type="text/javascript"></script>
        <script src="assets/van/van.js" type="text/javascript"></script>
        <!--<script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
        <script src="assets/js/ajax.js" type="text/javascript"></script>

        <script src="assets/tkahn-Smooth-Div-Scroll-1c3b3a6/js/jquery.mousewheel.min.js" type="text/javascript"></script>
        <script src="assets/tkahn-Smooth-Div-Scroll-1c3b3a6/js/jquery.kinetic.min.js" type="text/javascript"></script>
        <script src="assets/tkahn-Smooth-Div-Scroll-1c3b3a6/js/jquery.smoothdivscroll-1.3-min.js" type="text/javascript"></script>
        <script src="assets/js/system.js" type="text/javascript"></script>
        <script>
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'th'
                }, 'google_translate_element');
            }

            $(document).ready(function() {
                // None of the options are set
                $("div#makeMeScrollable").smoothDivScroll({
                    autoScrollingMode: "onStart",
                    autoScrollingInterval: 30
                });


            });

            $(function() {

                $("#page-left").load("TicketBooking/index");
                $("#page-right").load("Comment/index");
            });


        </script>

        <style type="text/css">

            #makeMeScrollable
            {
                width:100%;
                position: relative;
            }

            #makeMeScrollable div.scrollableArea img,
            #makeMeScrollable div.scrollableArea a
            {
                position: relative;
                float: left;
                margin: 0;
                margin-right: 7px;
                padding: 0;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -o-user-select: none;
                user-select: none;
                height: 150px;

            }


            .gd{
                background: #add9e4;
                background: -moz-linear-gradient(top,  #add9e4 -1%, #add9e4 0%, #d9edf2 40%, #f7fbfc 90%, #f7fbfc 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(-1%,#add9e4), color-stop(0%,#add9e4), color-stop(40%,#d9edf2), color-stop(90%,#f7fbfc), color-stop(100%,#f7fbfc));
                background: -webkit-linear-gradient(top,  #add9e4 -1%,#add9e4 0%,#d9edf2 40%,#f7fbfc 90%,#f7fbfc 100%);
                background: -o-linear-gradient(top,  #add9e4 -1%,#add9e4 0%,#d9edf2 40%,#f7fbfc 90%,#f7fbfc 100%);
                background: -ms-linear-gradient(top,  #add9e4 -1%,#add9e4 0%,#d9edf2 40%,#f7fbfc 90%,#f7fbfc 100%);
                background: linear-gradient(to bottom,  #add9e4 -1%,#add9e4 0%,#d9edf2 40%,#f7fbfc 90%,#f7fbfc 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#add9e4', endColorstr='#f7fbfc',GradientType=0 );

            }
            .gd2{
                background: rgb(169,228,247);
                background: -moz-linear-gradient(top,  rgba(169,228,247,1) 0%, rgba(15,180,231,1) 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(169,228,247,1)), color-stop(100%,rgba(15,180,231,1)));
                background: -webkit-linear-gradient(top,  rgba(169,228,247,1) 0%,rgba(15,180,231,1) 100%);
                background: -o-linear-gradient(top,  rgba(169,228,247,1) 0%,rgba(15,180,231,1) 100%);
                background: -ms-linear-gradient(top,  rgba(169,228,247,1) 0%,rgba(15,180,231,1) 100%);
                background: linear-gradient(to bottom,  rgba(169,228,247,1) 0%,rgba(15,180,231,1) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a9e4f7', endColorstr='#0fb4e7',GradientType=0 );

            }
        </style>

    </head>


    <body style=" background-color: #000;">
        <!--        <div id="google_translate_element"></div>-->

        <div class="container" style=" background-color: #fff; box-shadow: 0px 0px 1000px #00c0ff;">

            <div class="well gd" style=" text-align: center;">
                <!--<img height="100" src="assets/images/Logo1.png" alt=""/>-->
                <img height="100" src="assets/images/Logo2.jpg" alt=""/>
                <h3>ยินดีต้อนรับ</h3>
                <p>Van staion ที่นี่คือสถานีให้บริการจองตั๋วรถตู้ออนไลน์ที่นี่ www.thunjit.com</p>
            </div>



            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href=""><span class="glyphicon glyphicon-road"></span> หน้าแรก</a>

                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <p class="navbar-text">มาตรฐานของการเดินทาง</p>
                        <span class="nav navbar-nav navbar-right">
                            <a href="TicketBooking/index" container="#page-left">
                                <button type="button" class="btn btn-danger navbar-btn">จองตั๋วรถง่ายๆ กดที่นี่</button>
                            </a>
                        </span>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>

            <div class="row">
                <div class="col-md-12">
                    <div id="makeMeScrollable">
                        <img src="assets/images/show/location1.jpg" alt=""/>
                        <img src="assets/images/show/van1.png" alt=""/>
                        <img src="assets/images/show/location2.jpg" alt=""/>
                        <img src="assets/images/show/location3.jpg" alt=""/>
                        <img src="assets/images/show/map1.jpg" alt=""/>
                        <img src="assets/images/show/street1.JPG" alt=""/>
                        <img src="assets/images/show/street2.JPG" alt=""/>
                        <img src="assets/images/show/van1.jpg" alt=""/>
                    </div>
                </div>
            </div>

            <br>
            <div class="row" id="container">
                <div class="col-md-6" id="page-left"></div>
                <div class="col-md-6" id="page-right">
                    <form class="well">
                        <h4>ความคิดเห็น</h4>
                    </form>
                </div>
            </div>
        </div>


        <div id="my_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <span class="glyphicon glyphicon-remove-sign" data-dismiss="modal" style="cursor: pointer; margin: 10px; position: absolute; z-index: 90; right: 0px; font-size: 15px;"></span>
                    <div class="modal-body"  id="my_modal_content"></div>
                </div>
            </div>
        </div>

        <div id="my_modal_sm" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" id="my_modal_sm_content"></div>
            </div>
        </div>
    </body>

</html>