$(document).ready(function() {
    // get page name 
    var path = window.location.pathname;
    var path_comps = path.split("/");
    var page = path_comps.pop();

    // iterate until non empty value encountered
    // used in case page name ends in /, in which case
    // page will first equal ""
    while(page == "") {
        page = path_comps.pop();
    }

    // crop string to fit 8 char limit
    page = page.substring(0,8);

    // check if cookies enabled
    var cookieenabled = navigator.cookieEnabled;

    // check if cookie is present and enabled
    // set it to a new value if not present and enabled
    var cookieval = "";
    if (document.cookie == "") {
        if (cookieenabled) {
            var random_time = Math.floor(Math.random() * (2 ** 32 - 1));
            cookieval = random_time.toString();
            document.cookie = "identifier=" + cookieval;
        }
    } else {
        cookieval = document.cookie.substring(11);
    }

    // get width and height of browser
    width = window.outerWidth;
    height = window.outerHeight;

    // get useragent of browser
    useragent = navigator.userAgent.substring(0,200);

    // get fontsizes in use
    // starting with fallback
    var fallback_len = $('#fallback').width();
    console.log("fallback len is " + fallback_len.toString());

    var abyss = deja = gfs = liberation = roboto = true;
    console.log("abyss len is " + $('#abyss').width().toString());
    if ($('#abyss').width() == fallback_len) {
        abyss = false;
    }

    console.log("deja len is " + $('#deja').width().toString());
    if ($('#deja').width() == fallback_len) {
        deja = false;
    }

    console.log("gfs len is " + $('#gfs').width().toString());
    if ($('#gfs').width() == fallback_len) {
        gfs = false;
    }

    console.log("liberation len is " + $('#liberation').width().toString());
    if ($('#liberation').width() == fallback_len) {
        liberation = false;
    }

    console.log("roboto len is " + $('#roboto').width().toString());
    if ($('#roboto').width() == fallback_len) {
        roboto = false;
    }

    // get ip address
    $.get("https://api.ipify.org", function(data) {
        // send POST with evaluated data
        $.post("track.php",
            {
                pagenumber: page,
                cookie: cookieval,
                ip: data,
                width: width.toString(),
                height: height.toString(),
                useragent: useragent,
                cookies: cookieenabled,
                abyss: abyss,
                deja: deja,
                gfs: gfs,
                liberation: liberation,
                roboto: roboto
            },
            function(data) {
                $("#result").html("Successfully sent data to PHP.");
            }
        );
    });
});
