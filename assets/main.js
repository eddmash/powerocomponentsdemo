(function ($) {
    "use strict";
    $(function () {
        $("h4.code").append("<button class='btn btn-primary btn-sm show-code'>Show</button>");

        $(".show-code").click(function (e) {
            $(this).parent(".code").next(".dump-sql").toggle();

        });
    });
})(jQuery);