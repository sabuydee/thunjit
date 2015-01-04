(function($) {
    $.fn.van14 = function(options) {

        var booking = $.extend({
            "seat01": {status: "seat-free", change: "allow"},
            "seat02": {status: "seat-free", change: "allow"},
            "seat03": {status: "seat-active", change: "allow"},
            "seat04": {status: "seat-free", change: "allow"},
            "seat05": {status: "seat-free", change: "allow"},
            "seat06": {status: "seat-free", change: "allow"},
            "seat07": {status: "seat-free", change: "allow"},
            "seat08": {status: "seat-free", change: "allow"},
            "seat09": {status: "seat-free", change: "allow"},
            "seat10": {status: "seat-free", change: "allow"},
            "seat11": {status: "seat-free", change: "allow"},
            "seat12": {status: "seat-free", change: "allow"},
            "seat13": {status: "seat-free", change: "allow"},
            "seat14": {status: "seat-free", change: "allow"},
        }, options);

        var html = '<div class="ivan14"><div id="seat01" class="seat">01</div><div id="seat02" class="seat">02</div><div id="seat03" class="seat">03</div><div id="seat04" class="seat">04</div><div id="seat05" class="seat">05</div><div id="seat06" class="seat">06</div><div id="seat07" class="seat">07</div><div id="seat08" class="seat">08</div><div id="seat09" class="seat">09</div><div id="seat10" class="seat">10</div><div id="seat11" class="seat">11</div><div id="seat12" class="seat">12</div><div id="seat13" class="seat">13</div><div id="seat14" class="seat">14</div></div>';

        this.disableSelection();

        var setSeat = function(booking) {

            $.each(booking, function(index, value) {

                if (!$(this).hasClass(value.status))
                    $("#" + index).addClass(value.status);

                if (!$(this).hasClass(value.change))
                    $("#" + index).addClass(value.change);
            });
        }

        if (!options) {

            this.html(html);
            setSeat(booking);
        } else if (options) {

            if (options != "get") {

                this.html(html);
                setSeat(booking);
            } else {

                var x = [];
                this.children().children().each(function(){
                    
                    if($(this).hasClass("seat-booking")){
                        x.push($(this).attr("id"));
                    }
                });
                return x;
            }
        }

        this.children().children().click(function(e) {

            if (!$(this).hasClass("not-allow"))
                $(this).toggleClass("seat-booking");
        });


    }
}(jQuery));


