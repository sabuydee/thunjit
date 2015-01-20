(function($) {

    $.fn.van = function(options) {

        var defaults = {
            type: $.fn.van.type,
            booking: [],
            fix: [],
            classSeatFix: "seat-succeed",
            classSeatSelect: "seat-booking",
        };

        var settings = $.extend({}, defaults, options);

        if (options === "get") {

            var list = [];
            $.each(this.children().children("div.seat"), function() {

                if ($(this).hasClass(settings.classSeatSelect)) {
                    list.push($(this).index());
                }
            });
            return list;
        }

        return this.each(function() {

            var seatAmount = 0;
            if (settings.type === "van9") {
                var html = '<div class="ivan9"><p id="title" style="text-align : center;">van station</p><div id="seat01" class="seat">01</div><div id="seat02" class="seat">02</div><div id="seat03" class="seat">03</div><div id="seat04" class="seat">04</div><div id="seat05" class="seat">05</div><div id="seat06" class="seat">06</div><div id="seat07" class="seat">07</div><div id="seat08" class="seat">08</div><div id="seat09" class="seat">09</div></div>';
                $(this).html(html);
                seatAmount = 9;
            }
            if (settings.type === "van14") {
                var html = '<div class="ivan14"><p id="title" style="text-align : center;">van station</p><div id="seat01" class="seat">01</div><div id="seat02" class="seat">02</div><div id="seat03" class="seat">03</div><div id="seat04" class="seat">04</div><div id="seat05" class="seat">05</div><div id="seat06" class="seat">06</div><div id="seat07" class="seat">07</div><div id="seat08" class="seat">08</div><div id="seat09" class="seat">09</div><div id="seat10" class="seat">10</div><div id="seat11" class="seat">11</div><div id="seat12" class="seat">12</div><div id="seat13" class="seat">13</div><div id="seat14" class="seat">14</div></div>';
                $(this).html(html);
                seatAmount = 14;
            }

            $(this).disableSelection();
            var childrens = $(this).children();

            for (var i = 1; i <= seatAmount; i++) {
                
                var element = childrens.children(":eq(" + i + ")");
                if ($.inArray(i, settings.fix) < 0) {
                    element.click(function() {
                        $(this).toggleClass(settings.classSeatSelect);
                    });
                } else {
                    element.addClass(settings.classSeatFix);
                }
                
                if ($.inArray(i, settings.booking) > -1){
                    element.addClass(settings.classSeatSelect);
                }                
            }
        });
    };

    $.fn.van.type = "van14";
//    $.fn.van14 = function(options) {
//
//        var defaults = {
//            seat01: {fix: false, value: false},
//            seat02: {fix: false, value: false},
//            seat03: {fix: false, value: false},
//            seat04: {fix: false, value: false},
//            seat05: {fix: false, value: false},
//            seat06: {fix: false, value: false},
//            seat07: {fix: false, value: false},
//            seat08: {fix: false, value: false},
//            seat09: {fix: false, value: false},
//            seat10: {fix: false, value: false},
//            seat11: {fix: false, value: false},
//            seat12: {fix: false, value: false},
//            seat13: {fix: false, value: false},
//            seat14: {fix: false, value: false},
//            html: '<div class="ivan14"><p id="title" style="text-align : center;">van station</p><div id="seat01" class="seat">01</div><div id="seat02" class="seat">02</div><div id="seat03" class="seat">03</div><div id="seat04" class="seat">04</div><div id="seat05" class="seat">05</div><div id="seat06" class="seat">06</div><div id="seat07" class="seat">07</div><div id="seat08" class="seat">08</div><div id="seat09" class="seat">09</div><div id="seat10" class="seat">10</div><div id="seat11" class="seat">11</div><div id="seat12" class="seat">12</div><div id="seat13" class="seat">13</div><div id="seat14" class="seat">14</div></div>',
//            classSeatFix: "seat-succeed",
//            classSeatFree: "seat-free",
//            classSeatSelect: "seat-booking",
//        };
//
//        var settings = $.extend({}, defaults, options);
//
//        if (options === "get") {
//            seats = {};
//            $.each(this.children().children("div.seat"), function() {
//                if ($(this).hasClass(settings.classSeatSelect)) {
//                    seats[$(this).attr("id")] = true;
//                }
//            });
//            return $.extend({}, seats);
//        }
//
//        return this.each(function() {
//
//            $(this).html(settings.html);
//            $(this).disableSelection();
//            $.each($(this).children().children("div.seat"), function() {
//
//                var seat = $(this).attr("id");
//                var fix = settings[seat].fix;
//                var value = settings[seat].value;
//                $(this).removeClass(settings.classSeatFix);
//                $(this).removeClass(settings.classSeatFree);
//                $(this).removeClass(settings.classSeatSelect);
//
//                if (fix === false && value === false) {
//
//                    $(this).addClass(settings.classSeatFree);
//                    $(this).click(function() {
//                        $(this).toggleClass(settings.classSeatSelect);
//                    });
//                } else if (fix === false && value === true) {
//
//                    $(this).addClass(settings.classSeatSelect);
//                    $(this).click(function() {
//                        $(this).toggleClass(settings.classSeatSelect);
//                    });
//                } else if (fix === true && value === false) {
//
//                    $(this).addClass(settings.classSeatFix);
//                } else if (fix === true && value === true) {
//
//                    $(this).addClass(settings.classSeatFix);
//                }
//            });
//        });
//    };
//
//    $.fn.van9 = function(options) {
//
//        var defaults = {
//            seat01: {fix: false, value: false},
//            seat02: {fix: false, value: false},
//            seat03: {fix: false, value: false},
//            seat04: {fix: false, value: false},
//            seat05: {fix: false, value: false},
//            seat06: {fix: false, value: false},
//            seat07: {fix: false, value: false},
//            seat08: {fix: false, value: false},
//            seat09: {fix: false, value: false},
//            html: '<div class="ivan9"><p id="title" style="text-align : center;">van station</p><div id="seat01" class="seat">01</div><div id="seat02" class="seat">02</div><div id="seat03" class="seat">03</div><div id="seat04" class="seat">04</div><div id="seat05" class="seat">05</div><div id="seat06" class="seat">06</div><div id="seat07" class="seat">07</div><div id="seat08" class="seat">08</div><div id="seat09" class="seat">09</div></div>',
//            classSeatFix: "seat-succeed",
//            classSeatFree: "seat-free",
//            classSeatSelect: "seat-booking",
//        };
//
//        var settings = $.extend({}, defaults, options);
//
//        if (options === "get") {
//            seats = {};
//            $.each(this.children().children("div.seat"), function() {
//                if ($(this).hasClass(settings.classSeatSelect)) {
//                    seats[$(this).attr("id")] = true;
//                }
//            });
//            return $.extend({}, seats);
//        }
//
//        return this.each(function() {
//
//            $(this).html(settings.html);
//            $(this).disableSelection();
//            $.each($(this).children().children("div.seat"), function() {
//                var seat = $(this).attr("id");
//                var fix = settings[seat].fix;
//                var value = settings[seat].value;
//
//                $(this).removeClass(settings.classSeatFix);
//                $(this).removeClass(settings.classSeatFree);
//                $(this).removeClass(settings.classSeatSelect);
//
//                if (fix === false && value === false) {
//
//                    $(this).addClass(settings.classSeatFree);
//                    $(this).click(function() {
//                        $(this).toggleClass(settings.classSeatSelect);
//                    });
//                } else if (fix === false && value === true) {
//
//                    $(this).addClass(settings.classSeatSelect);
//                    $(this).click(function() {
//                        $(this).toggleClass(settings.classSeatSelect);
//                    });
//                } else if (fix === true && value === false) {
//
//                    $(this).addClass(settings.classSeatFix);
//                } else if (fix === true && value === true) {
//
//                    $(this).addClass(settings.classSeatFix);
//                }
//
//            });
//        });
//    };
}(jQuery));


//$.fn.van14 = function(options) {
//
//    var booking = $.extend({
//        "seat01": {status: "seat-free", change: "allow"},
//        "seat02": {status: "seat-free", change: "allow"},
//        "seat03": {status: "seat-free", change: "allow"},
//        "seat04": {status: "seat-free", change: "allow"},
//        "seat05": {status: "seat-free", change: "allow"},
//        "seat06": {status: "seat-free", change: "allow"},
//        "seat07": {status: "seat-free", change: "allow"},
//        "seat08": {status: "seat-free", change: "allow"},
//        "seat09": {status: "seat-free", change: "allow"},
//        "seat10": {status: "seat-free", change: "allow"},
//        "seat11": {status: "seat-free", change: "allow"},
//        "seat12": {status: "seat-free", change: "allow"},
//        "seat13": {status: "seat-free", change: "allow"},
//        "seat14": {status: "seat-free", change: "allow"},
//    }, options);
//
//    var html = '<div class="ivan14"><p id="title" style="text-align : center;">van station</p><div id="seat01" class="seat">01</div><div id="seat02" class="seat">02</div><div id="seat03" class="seat">03</div><div id="seat04" class="seat">04</div><div id="seat05" class="seat">05</div><div id="seat06" class="seat">06</div><div id="seat07" class="seat">07</div><div id="seat08" class="seat">08</div><div id="seat09" class="seat">09</div><div id="seat10" class="seat">10</div><div id="seat11" class="seat">11</div><div id="seat12" class="seat">12</div><div id="seat13" class="seat">13</div><div id="seat14" class="seat">14</div></div>';
//
//    this.disableSelection();
//
//    var setSeat = function(booking) {
//
//        $.each(booking, function(index, value) {
//
//            if (!$(this).hasClass(value.status))
//                $("#" + index).addClass(value.status);
//
//            if (!$(this).hasClass(value.change))
//                $("#" + index).addClass(value.change);
//        });
//    }
//
//    if (!options) {
//
//        this.html(html);
//        setSeat(booking);
//    } else if (options) {
//
//        if (options != "get") {
//
//            this.html(html);
//            setSeat(booking);
//        } else {
//
//            var x = [];
//            this.children().children().each(function() {
//
//                if ($(this).hasClass("seat-booking")) {
//                    x.push($(this).attr("id"));
//                }
//            });
//            return x;
//        }
//    }
//
//    this.children().children().click(function(e) {
//
//        if (!$(this).hasClass("not-allow") && $(this).attr("id") != "title")
//            $(this).toggleClass("seat-booking");
//    });
//}


//$.fn.van9 = function(options) {
//
//        var booking = $.extend({
//            "seat01": {status: "seat-free", change: "allow"},
//            "seat02": {status: "seat-free", change: "allow"},
//            "seat03": {status: "seat-free", change: "allow"},
//            "seat04": {status: "seat-free", change: "allow"},
//            "seat05": {status: "seat-free", change: "allow"},
//            "seat06": {status: "seat-free", change: "allow"},
//            "seat07": {status: "seat-free", change: "allow"},
//            "seat08": {status: "seat-free", change: "allow"},
//            "seat09": {status: "seat-free", change: "allow"},
//        }, options);
//
//        var html = '<div class="ivan9"><p id="title" style="text-align : center;">van station</p><div id="seat01" class="seat">01</div><div id="seat02" class="seat">02</div><div id="seat03" class="seat">03</div><div id="seat04" class="seat">04</div><div id="seat05" class="seat">05</div><div id="seat06" class="seat">06</div><div id="seat07" class="seat">07</div><div id="seat08" class="seat">08</div><div id="seat09" class="seat">09</div></div>';
//
//        this.disableSelection();
//
//        var setSeat = function(booking) {
//
//            $.each(booking, function(index, value) {
//
//                if (!$(this).hasClass(value.status))
//                    $("#" + index).addClass(value.status);
//
//                if (!$(this).hasClass(value.change))
//                    $("#" + index).addClass(value.change);
//            });
//        }
//
//        if (!options) {
//
//            this.html(html);
//            setSeat(booking);
//        } else if (options) {
//
//            if (options != "get") {
//
//                this.html(html);
//                setSeat(booking);
//            } else {
//
//                var x = [];
//                this.children().children().each(function(){
//                    
//                    if($(this).hasClass("seat-booking")){
//                        x.push($(this).attr("id"));
//                    }
//                });
//                return x;
//            }
//        }
//
//        this.children().children().click(function(e) {
//
//            if (!$(this).hasClass("not-allow") && $(this).attr("id") != "title")
//                $(this).toggleClass("seat-booking");
//        });
//
//
//    }
