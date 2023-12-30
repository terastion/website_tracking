$(document).ready(function() {
    // get page name 
    var path = window.location.pathname;
    var path_comps = path.split("/");
    var page = path_comps.pop();
    while(page == "") {
        page = path_comps.pop();
    }

    // crop string to fit 8 char limit
    page = page.substring(0,8);
    
    $.post("track.php",
        {
            pagenumber: page
        },
        function(data) {
            $("#result").html("Successfully sent data to PHP.");
        }
    );
});
    
