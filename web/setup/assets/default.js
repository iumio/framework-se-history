/*
 *
 *  * This is an iumio Framework component
 *  *
 *  * (c) RAFINA DANY <dany.rafina@iumio.com>
 *  *
 *  * iumio Framework - iumio Components
 *  *
 *  * To get more information about licence, please check the licence file
 *
 */

var rsp1, rsp2, rsp3, rsp4 = -1;
var appinfo = [];
var framework = [];

/**
 *
 * Set url base
 *
 */
window.onload = function () {
    document.getElementById("furl").innerHTML = (getBaseUrl())+"Dev.php/index";
    document.getElementById("furl2").href = (getBaseUrl())+"Dev.php/index";

}
/**
 *
 * Set a splashscreen
 *
 */
setTimeout(function () {
    $("#step0").hide();
    $("body").removeClass("body-mod");
    $(".row-app").show();
}, 3500);



$(document).ready(function () {
    /**
     * Step 1
     */
    $("#clicked").click(function () {
        $("#step1").hide();
        $("#s1").removeClass("active");
        $("#s1 i").removeClass("hidden");
        $("#step1").hide();
        $("#s2").addClass("active");
        $("#step2").removeClass("hidden");
        updateGlobalProgressBar();
    });

    /**
     * Step 2 - decline - reload page
     */
    $(".decline-licence").click(function () {
        location.reload();
    });

    /**
     * Step 2 - accept - verification
     */
    $(".accept-licence").click(function () {
        var check = document.querySelector(".cterms:checked");
        if (check === null)
        {
            $(".errorlicence").show();
            return ;
        }
        $("#step2").hide();
        $("#s2").removeClass("active");
        $("#s2 i").removeClass("hidden");
        $("#s3").addClass("active");
        $("#step3").removeClass("hidden");
        updateGlobalProgressBar();
        step3();
    });

    /**
     * Step 3 - Continue to the next step
     */
    $("#continues3").click(function () {
        $("#step3").hide();
        $("#s3").removeClass("active");
        $("#s3 i").removeClass("hidden");
        $("#step3").hide();
        $("#s4").addClass("active");
        $("#step4").removeClass("hidden");
        updateGlobalProgressBar();
    });

    /**
     * Step 4 - Check application name
     */
    $("#continues4").click(function () {
        var appname = $("#appname").val();
        if (appname === "App" || appname.length <= 3 ||  !isValid(appname))
            $("#error1").show();
        else if (appname.length <= 3 )
            $("error1").show();
        else
        {

            if (isValid(appname))
            {
                appinfo[0] = appname.charAt(0).toUpperCase() + appname.slice(1) + "App";
                appinfo[10] = appname.charAt(0).toUpperCase() + appname.slice(1);
                $("#step4").hide();
                $("#s4").removeClass("active");
                $("#s4 i").removeClass("hidden");
                $("#step4").hide();
                $("#s5").addClass("active");
                $("#step5").removeClass("hidden");
                updateGlobalProgressBar();
            }
            else
                $("#error1").show();
        }

        /**
         * Step 5 - Accept default template
         */
        $("#no5").click(function () {
            appinfo[1] = 1;
            appinfo[2] = 0;
            $("#appnamers").html(appinfo[0]);
            $("#templaters").html((appinfo[2] === 0)? "No" : "Yes");
            $(".rsp2-recap").show();
            $("#appnamesplited").html(appinfo[10]);

            $("#step5").hide();
            $("#s5").removeClass("active");
            $("#s5 i").removeClass("hidden");
            $("#step5").hide();
            $("#s6").addClass("active");
            $("#step6").removeClass("hidden");
            updateGlobalProgressBar();
            setRecapGlobal();
        });

        /**
         * Step 5 - Decline default template
         */
        $("#yes5").click(function () {
            appinfo[1] = 1;
            appinfo[2] = 1;

            $("#appnamers").html(appinfo[0]);
            $("#templaters").html((appinfo[2] === 0)? "No" : "Yes");
            $("#appnamesplited").html(appinfo[10]);
            $(".rsp1-recap").show();
            $("#s5").removeClass("active");
            $("#s5 i").removeClass("hidden");
            $("#step5").hide();
            $("#s6").addClass("active");
            $("#step6").removeClass("hidden");
            updateGlobalProgressBar();
            setRecapGlobal();
        });

    });

    /**
     *
     * Step 6 - Cancel the installation
     * Step 9 - Retry the installation
     *
     */
   $("#cancelfinal, #retryinstallation").click(function () {
        location.reload();
    });



    $("#create").click(function () {
        document.getElementById("appnamecreate").innerHTML = appinfo[0];
        $("#step6").hide();
        $("#s6").removeClass("active");
        $("#s6 i").removeClass("hidden");
        $("#step6").hide();
        $("#s7").addClass("active");
        $("#step7").removeClass("hidden");
        updateGlobalProgressBar();
        createApp();
    });

});


/**
 * Update value for next step on global progress bar
 */
function updateGlobalProgressBar() {
    var selector = $(".iumio-installer-global-pg");
    var val = parseInt(selector.attr("aria-valuenow"));
    var nval = val + 12.25;
    nval = nval + '%';

    selector.width(nval);
    selector.attr("aria-valuenow", (val + 12.25))
}






 /**
 * Step 6 - Set framework information for recap
 *
 */
function setRecapGlobal() {
    $("#recapfversion").html(framework[0]);
    $("#recapfedition").html(framework[1]);
    $("#currentstage").html(framework[2]);
    if (framework[2] == "BETA")
        $("#betastage").show();
}





 /**
 * Step 3 - Requirements
 */
function step3() {
    rsp1 = rsp2 = rsp3 = -1;
    document.getElementById("retrys3").style.display = "none";
    document.getElementById("continues3").style.display = "none";

    var parentphp = document.getElementsByClassName("phpversion")[0];
    parentphp.getElementsByClassName("error")[0].style.display = "none";
    document.getElementsByClassName("phpversionnum")[0].innerHTML = "...";
    parentphp.getElementsByClassName("isok")[0].innerHTML = '';
    $(".phpversion").find("i").hide();

    var parentf = document.getElementsByClassName("fversion")[0];
    parentf.getElementsByClassName("error")[0].style.display = "none";
    document.getElementsByClassName("fversionnum")[0].innerHTML = "...";
    parentf.getElementsByClassName("isok")[0].innerHTML = ''
    $(".fversion").find("i").hide();


    var parentwr = document.getElementsByClassName("wr")[0];
    parentwr.getElementsByClassName("error")[0].style.display = "none";
    parentwr.getElementsByClassName("isok")[0].innerHTML = '';
    $(".wr").find("i").hide();

    var parentlibsr = document.getElementsByClassName("libsr")[0];
    parentlibsr.getElementsByClassName("error")[0].style.display = "none";
    parentlibsr.getElementsByClassName("isok")[0].innerHTML = '';
    $(".libsr").find("i").hide();

    getPHPVersion();
    getFrameworkVersion();
    getWR();
    getLibsRequired();


}

/**
 * Notifiy the end of requirements checked
 */
function notify() {
    if (rsp1 === 0 || rsp2 === 0 || rsp3 === 0 || rsp4 === 0)
    {
        $("#retrys3").show();
        $("#continues3").hide();
    }
    else if (rsp1 === 1 && rsp2 === 1 && rsp3 === 1 && rsp4 === 1)
    {
        $("#continues3").show();
        $("#retrys3").hide();
    }
}


/**
 * Get the PHP server version
 */
function getPHPVersion() {
    var parent = document.getElementsByClassName("phpversion")[0];
    parent.getElementsByClassName("error")[0].style.display = "none";
    document.getElementsByClassName("phpversionnum")[0].innerHTML = "...";
    parent.getElementsByClassName("isok")[0].innerHTML = '';

    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "Tools.php?action=phpv", true);
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200)
        {
            var rsp = JSON.parse(this.response);
            if (rsp.results === "OK")
            {
                document.getElementsByClassName("phpversionnum")[0].innerHTML = rsp.phpv;
                parent.getElementsByClassName("isok")[0].innerHTML = ' - '+rsp.results;
                parent.getElementsByClassName("isok")[0].style.color = 'rgb(15, 232, 15)';
                $(".phpversion").find("i").show();
                rsp1 = 1;
            }
            else
            {
                document.getElementsByClassName("phpversionnum")[0].innerHTML = rsp.phpv;
                parent.getElementsByClassName("isok")[0].innerHTML = ' - '+rsp.results;
                parent.getElementsByClassName("isok")[0].style.color = 'red';
                parent.getElementsByClassName("error")[0].innerHTML = ' &nbsp; '+rsp.msg;
                parent.getElementsByClassName("error")[0].style.display = "block";
                $(".phpversion").find("i").hide();
                rsp1 = 0;
            }


        }
        else
            rsp1 = 0;
        notify();
    };
    window.setTimeout(function () {
        xhttp.send();
    }, 2000);
}

/**
 * Get the librairies required
 */
function getLibsRequired() {
    var parent = document.getElementsByClassName("libsr")[0];
    parent.getElementsByClassName("error")[0].style.display = "none";
    parent.getElementsByClassName("isok")[0].innerHTML = '';

    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "Tools.php?action=libsr", true);
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200)
        {
            var rsp = JSON.parse(this.response);
            if (rsp.results === "OK")
            {
                parent.getElementsByClassName("isok")[0].innerHTML = ' - '+rsp.results;
                parent.getElementsByClassName("isok")[0].style.color = 'rgb(15, 232, 15)';
                $(".libsr").find("i").show();
                rsp4 = 1;
            }
            else
            {
                parent.getElementsByClassName("isok")[0].innerHTML = ' - '+rsp.results;
                parent.getElementsByClassName("isok")[0].style.color = 'red';
                parent.getElementsByClassName("error")[0].innerHTML = ' &nbsp; '+rsp.msg;
                parent.getElementsByClassName("error")[0].style.display = "block";
                document.getElementById("retrys3").style.display = "block";
                $(".libsr").find("i").hide();
                rsp4 = 0;
            }
        }
        else
            rsp4 = 0;
        notify();
    };
    window.setTimeout(function () {
        xhttp.send();
    }, 2000);
}

/**
 * Get the version of current instance of iumio Framework
 */
function getFrameworkVersion() {
    var parent = document.getElementsByClassName("fversion")[0];
    parent.getElementsByClassName("error")[0].style.display = "none";
    document.getElementsByClassName("fversionnum")[0].innerHTML = "...";
    parent.getElementsByClassName("isok")[0].innerHTML = '';

    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "Tools.php?action=fv", true);
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200)
        {
            var rsp = JSON.parse(this.response);
            if (rsp.results === "OK")
            {
                framework[0] = rsp.fv;
                framework[1] = rsp.edition;
                framework[2] = rsp.stage;
                document.getElementsByClassName("fversionnum")[0].innerHTML = rsp.fv;
                parent.getElementsByClassName("isok")[0].innerHTML = ' - '+rsp.results;
                parent.getElementsByClassName("isok")[0].style.color = 'rgb(15, 232, 15)';
                $(".fversion").find("i").show();
                rsp2 = 1;
            }
            else
            {
                document.getElementsByClassName("fversionnum")[0].innerHTML = rsp.fv;
                parent.getElementsByClassName("isok")[0].innerHTML = ' - '+rsp.results;
                parent.getElementsByClassName("isok")[0].style.color = 'red';
                parent.getElementsByClassName("error")[0].innerHTML = ' &nbsp; '+rsp.msg;
                parent.getElementsByClassName("error")[0].style.display = "block";
                document.getElementById("retrys3").style.display = "block";
                $(".fversion").find("i").hide();
                rsp2 = 0;
            }
        }
        else
            rsp2 = 0;
        notify();
    };
    window.setTimeout(function () {
        xhttp.send();
    }, 2000);
}

/**
 * Get readable and writeable directory
 */
function getWR() {
    var parent = document.getElementsByClassName("wr")[0];
    parent.getElementsByClassName("error")[0].style.display = "none";
    parent.getElementsByClassName("isok")[0].innerHTML = '';

    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "Tools.php?action=wr", true);
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200)
        {
            var rsp = JSON.parse(this.response);
            if (rsp.results === "OK")
            {
                parent.getElementsByClassName("isok")[0].innerHTML = ' - '+rsp.results;
                parent.getElementsByClassName("isok")[0].style.color = 'rgb(15, 232, 15)';
                $(".wr").find("i").show();
                rsp3 = 1;
            }
            else
            {
                parent.getElementsByClassName("isok")[0].innerHTML = ' - '+rsp.results;
                parent.getElementsByClassName("isok")[0].style.color = 'red';
                parent.getElementsByClassName("error")[0].innerHTML = ' &nbsp; '+rsp.msg;
                parent.getElementsByClassName("error")[0].style.display = "block";
                $(".wr").find("i").hide();
                rsp3 = 0;
            }
        }
        else
            rsp3 = 0;
        notify();
    };
    window.setTimeout(function () {
        xhttp.send();
    }, 2000);
}




/**
 *
 * Create an application
 *
 */
function createApp() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "Tools.php?action=createapp", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var sender = "appname="+appinfo[0]+"&template="+String(appinfo[2]);
    xhttp.onreadystatechange = function() {
        document.getElementById("step7").style.display = "none";
        $("");
        if (this.readyState === 4 && this.status === 200 && this.responseText === "OK")
        {
            document.getElementById("step7").style.display = "none";
            document.getElementById("s7").classList.remove("step-active");
            document.getElementById("s7").classList.add("step-valid");
            document.getElementById("s8").classList.add("step-active");
            document.getElementById("step9").style.display = "none";
            document.getElementById("step8").style.display = "block";

            $("#step7").hide();
            $("#s7").removeClass("active");
            $("#s7 i").removeClass("hidden");
            $("#step7").hide();
            $("#s8").addClass("active");
            $("#step8").removeClass("hidden");
            updateGlobalProgressBar();

            redirect();
        }
        else
        {
            $("#step7").hide();
            $("#s7").removeClass("active");
            $("#s7 i").removeClass("hidden");
            $("#step7").hide();
            $("#s8").addClass("active");
            $("#step9").removeClass("hidden");
            updateGlobalProgressBar();
        }
    };
    move();
    window.setTimeout(function () {
        xhttp.send(sender);
    }, 4000);
}

function move() {
    var elem = $("#prg-insta-iumio");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
        if (width >= 100) {
            clearInterval(id);
        } else {
            width++;
            elem.width(width + '%');
            elem.attr("aria-valuenow", width);
        }
    }
}

/**
 * Redirect to first page - iumio Starter Page
 */
function redirect() {
    setTimeout(function () {
        location.href= (getBaseUrl())+"../Dev.php/index";
    }, 5000);
}

/**
 *
 * Get current url
 */
function getBaseUrl() {
    var re = new RegExp(/^.*\//);
    var url = (re.exec(window.location.href))[0].replace('/setup/','/');
    return (url);
}

/**
 * Check is a valid string
 * @param str String to analyse
 * @returns {boolean} The result of the operation
 */
function isValid(str){
    return !/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
}