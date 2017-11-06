<?php

echo '<script type="text/javascript">
    function pinMeDaddy(fid){
        var nick = prompt("Enter a nickname for this file (20 characters only)", "");
        $.get("functions/pin.php?fid=" + fid + "&nick=" + nick,
            function(data,status){
                if (status=200) {
                    if (data="1") {
                        alert("Added to pinned files!");
                    }else{
                        alert("Something went wrong");
                    }
                }else{
                    alert("Something went wrong. Error " + status);
                }
                
           
        });
    
        
    }
    function idleLogout() {
    var t;
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer; // catches touchscreen presses
    window.onclick = resetTimer;     // catches touchpad clicks
    window.onscroll = resetTimer;    // catches scrolling with arrow keys
    window.onkeypress = resetTimer;

    function logout() {
        window.location.href = "logout.php";
    }

    function resetTimer() {
        clearTimeout(t);
        t = setTimeout(logout, 300000);  // 5 MINUTES
    }
}
idleLogout();
</script>'

?>