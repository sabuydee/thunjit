/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function() {

    $(document).delegate(".pull", "click", function() {

        var request = $(this).attr("href");
        var container = $(this).attr("container");
        getView(request, container);
    });

    $(document).delegate("a", "click", function() {


        var iremove = $(this).attr("iremove");
        if (iremove != null && iremove != "") {

            if (!confirm(iremove)) {

                return false;
            }
        }

        var container = $(this).attr("container");
        if (container != null && container != "") {

            var url = $(this).attr("href");
            $.post(url, function(ans) {

                $(container).html(ans);
            });
            return false;
        }
    });

    $(document).delegate("form", "submit", function() {


        var container = $(this).attr("container");
        if (container != null && container != "") {

            var url = $(this).attr("action");
            var data = $(this).serialize();
            $.post(url, data, function(ans) {

                $(container).html(ans);
            });
            return false;
        }
    });

    $(document).delegate(".iremove", "click", function() {


    });
});