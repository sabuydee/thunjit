<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ยินดีต้อนรับ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/tkahn-Smooth-Div-Scroll-1c3b3a6/css/smoothDivScroll.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script src="assets/js/jquery.js" type="text/javascript"></script>
        <script src="assets/js/ajax.js" type="text/javascript"></script>
        <script src="assets/jquery-ui-1.11.2.custom/jquery-ui.min.js" type="text/javascript"></script>
        <script src="assets/tkahn-Smooth-Div-Scroll-1c3b3a6/js/jquery.mousewheel.min.js" type="text/javascript"></script>
        <script src="assets/tkahn-Smooth-Div-Scroll-1c3b3a6/js/jquery.kinetic.min.js" type="text/javascript"></script>
        <script src="assets/tkahn-Smooth-Div-Scroll-1c3b3a6/js/jquery.smoothdivscroll-1.3-min.js" type="text/javascript"></script>
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
                    //autoScrollingInterval: 10
                });
            });
        </script>

        <style type="text/css">

            #makeMeScrollable
            {
                width:100%;
                height: 80px;
                position: relative;
                //border: 1px solid #000;
                //border-radius: 10px;
            }

            /* Replace the last selector for the type of element you have in
               your scroller. If you have div's use #makeMeScrollable div.scrollableArea div,
               if you have links use #makeMeScrollable div.scrollableArea a and so on. */
            #makeMeScrollable div.scrollableArea img
            {
                position: relative;
                float: left;
                margin: 0;
                padding: 0;
                /* If you don't want the images in the scroller to be selectable, try the following
                   block of code. It's just a nice feature that prevent the images from
                   accidentally becoming selected/inverted when the user interacts with the scroller. */
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -o-user-select: none;
                user-select: none;
                height: 80px;
                border: 5px solid #fff;
            }
        </style>

    </head>


    <body>
        <!--        <div id="google_translate_element"></div>-->

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">
                        ทันจิตต์ทัวร์
                        <!--<img alt="Brand" src="assets/images/Logo1.png" style=" height: 30px;">-->
                    </a>
                </div>
            </div>
        </nav>


        <div class="container">

            <div class="row well" style=" text-align: center;">
                <img height="100" src="assets/images/Logo1.png" alt=""/>
                <h4>ยินดีต้อนรับเข้าสู่ Thunjit.com</h4>
                <p>Van staion ที่นี่คือสถานีให้บริการจองตั๋วรถตู้ออนไลน์</p>
            </div>


            <div class="row"></div>
            <div class="row">
                <div class="col-sm-6">
                    <div id="makeMeScrollable">
                        <img src="assets/images/Logo.png" alt=""/>
                        <img src="assets/images/Logo2.jpg" alt=""/>
                        <img src="assets/images/handshake1.jpg" alt=""/>
                        <img src="assets/images/Station1_1.jpg" alt=""/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <a href="TicketBooking/index" container="#container">จองตั๋วรถง่ายๆ กดที่นี่</a><br>
                    <a>แสดงความคิดเห็น</a>
                </div>
            </div>
            <div class="row" id="container"></div>
        </div>


    </body>
</html>
