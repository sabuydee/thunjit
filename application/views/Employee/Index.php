<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ระบบบริหารการจองตั๋ว</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/jquery-ui-1.11.2.custom/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/jquery-ui-1.11.2.custom/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/theme1.css" rel="stylesheet" type="text/css"/>
        <link href="assets/van/van.css" rel="stylesheet" type="text/css"/> 
        <script src="assets/js/jquery.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/jquery-ui-1.11.2.custom/jquery-ui.min.js" type="text/javascript"></script>
        <script src="assets/js/jqueryui_datepicker_thai.js" type="text/javascript"></script>
        <script src="assets/js/ajax.js" type="text/javascript"></script>
        <script src="assets/js/onload.js" type="text/javascript"></script>         
        <script src="assets/van/van.js" type="text/javascript"></script>
    </head>

    <body style="margin: 0px; padding: 0px;">


        <div id="head" style="position: fixed; z-index: 1000; left: 0px; top: 0px; width: 100%; height: 150px; background-color: #009999; border-bottom: 1px solid #fff;">
            <p href="employee" style="color: #eee; font-size: 30px; text-align: center; white-space: nowrap;">ระบบบริหารการจองตั๋วรถตู้บริษัทิทันจิตต์</p>
            <div id="navigate" style="margin: auto; width: 1000px;"></div>
            <!--<img src="assets/images/logo1.png" width="200px" alt=""/>-->

        </div>

        <div id="page" style="margin: auto; margin-top: 150px; padding: 20px; width: 1000px;">

            <div id="container" style="margin-top: 20px;">

                <?php
                if ($this->ModelUser->isGuest()) {

                    echo '<script>getView("Employee/Welcome","#container");</script>';
                } else {

                    echo '<script>getView("User/LoginSucceed","#container");</script>';
                }
                ?>
            </div>
            <hr>
            <p style="text-align: center; color: #aaa;">@ power by singha</p>
            <?= br(10) ?>
        </div>
        
        <div id="option"></div>
        
        <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="my_modal">
                </div>
            </div>
        </div>

        <div id="modal_sm" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" id="my_modal_sm">
                    
                </div>
            </div>
        </div>
        

    </body>
</html>
