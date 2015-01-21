<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ระบบจัดการการจองตั๋วรถตู้</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <script src="assets/js/jquery.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

        <style>
            .myicon{
                margin: 20px; width: 150px; height: 140px; padding: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="">ระบบจัดการการจองตั๋วรถตู้</a>
                    </div>
                    <p class="navbar-text navbar-right">van station</p>
                </div>
            </nav>
            
            
            <div class="well">
                
                <button class="btn btn-default myicon"  to="CancelTicket/index">
                    <p style="text-align: center; font-size: 50px;"><span class="glyphicon glyphicon-remove"></span></p>
                    <h4 style="text-align: center;">ยกเลิกตั๋ว</h4>
                </button>
                
                <button class="btn btn-default myicon"  to="CancelTicket/index">
                    <p style="text-align: center; font-size: 50px;"><span class="glyphicon glyphicon-play"></span></p>
                    <h4 style="text-align: center;">ออกรถ</h4>
                </button>

                <button class="btn btn-default myicon"  to="Report/day">
                    <p style="text-align: center; font-size: 50px;"><span class="glyphicon glyphicon-list-alt"></span></p>
                    <h4 style="text-align: center;">รายงานรายวัน</h4>
                </button>
                
            </div>
        </div>


        <div id="my_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div id="my_modal_content" class="modal-body"></div>
                </div>
            </div>
        </div>
    </body>
    <script>
        $(function(){
            $(".myicon").click(function(){
                
                $("#my_modal_content").load($(this).attr("to"));
                $("#my_modal").modal("show");
            });
        });
    </script>
</html>
