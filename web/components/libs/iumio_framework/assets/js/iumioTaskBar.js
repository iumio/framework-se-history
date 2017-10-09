
/*
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <danyrafina@gmail.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 */


/**
 * iumioTaskBar JAVASCRIPT
 **/

var inload = false;
window.onload = function () {
    getSimpleApps();
    getTaskbarLogs();
    detectTaskBarPosition();
};

var reduce = 0;
var restore = 0;

/**
 * Simulate an event
 * @param el event selector
 * @param etype event type
 */
function eventFire(el, etype){
    if (el.fireEvent) {
        el.fireEvent('on' + etype);
    } else {
        var evObj = document.createEvent('Events');
        evObj.initEvent(etype, true, false);
        el.dispatchEvent(evObj);
    }
}

/**
 * Detect the taskbar position (open or close)
 */
function detectTaskBarPosition() {
    var pos = localStorage.getItem("iumioTaskBar");
    if (pos === "1")
    {
        document.getElementsByClassName("iumioTaskBarVSmall")[0].style.display = "none";
        document.getElementsByClassName("iumioTaskBar")[0].style.display = "block";
        document.getElementById("iumioTaskBarBlank").style.display = "block";
    }
    else if (pos === "0")
    {
        document.getElementsByClassName("iumioTaskBar")[0].style.display = "none";
        document.getElementById("iumioTaskBarBlank").style.display = "none";
        document.getElementsByClassName("iumioTaskBarVSmall")[0].style.display = "block";
    }
}

/**
 *  Interval for functions
 * @type {number}
 */
var refreshId = setInterval(function() {
    getSimpleApps();
}, 5000);

var refreshId2 = setInterval(function() {
    getTaskbarLogs();
}, 2000);


/**
 * Reduce taskbar
 */
document.getElementById("iumioTaskBarReduce").addEventListener("click", function () {
    document.getElementsByClassName("iumioTaskBar")[0].style.display = "none";
    document.getElementById("iumioTaskBarBlank").style.display = "none";
    document.getElementsByClassName("iumioTaskBarVSmall")[0].style.display = "block";
    localStorage.setItem("iumioTaskBar", 0);
});


/**
 * Restore taskbar
 */
document.getElementById("iumioTaskBarRestore").addEventListener("click", function () {

    document.getElementsByClassName("iumioTaskBarVSmall")[0].style.display = "none";
    document.getElementsByClassName("iumioTaskBar")[0].style.display = "block";
    document.getElementById("iumioTaskBarBlank").style.display = "block";
    localStorage.setItem("iumioTaskBar", 1);
});

/**
 * Events of iumio taskbar
 */
document.addEventListener('click',function(e){
    if (e.target)
    {
        switch (e.target.className)
        {
            case 'iumioTaskBarCacheClearAll':
                cacheClear(document.querySelector(".iumioTaskBarCacheClearAll"));
                break;
            case 'iumioTaskBarCacheClearDev':
                cacheClear(document.querySelector(".iumioTaskBarCacheClearDev"));
                break;
            case 'iumioTaskBarCacheClearProd':
                cacheClear(document.querySelector(".iumioTaskBarCacheClearProd"));
                break;
            case 'iumioTaskBarAssetsPublishAll':
                assetsPublish(document.querySelector(".iumioTaskBarAssetsPublishAll"));
                break;
            case 'iumioTaskBarAssetsClearAll':
                assetsClear(document.querySelector(".iumioTaskBarAssetsClearAll"));
                break;
            case 'iumioTaskBarAssetsPublishDev':
                assetsPublish(document.querySelector(".iumioTaskBarAssetsPublishDev"));
                break;
            case 'iumioTaskBarAssetsClearDev':
                assetsClear(document.querySelector(".iumioTaskBarAssetsClearDev"));
                break;
            case 'iumioTaskBarAssetsPublishProd':
                assetsPublish(document.querySelector(".iumioTaskBarAssetsPublishProd"));
                break;
            case 'iumioTaskBarAssetsClearProd':
                assetsClear(document.querySelector(".iumioTaskBarAssetsClearProd"));
                break;
            case 'iumioTaskBarOneApp':
                switchApp(e.target);
                break;
        }
    }
});

/**
 * Clear the cache
 * @param elem Html element
 */
function cacheClear(elem) {
    var pElem = document.querySelector("#iumioTaskBarCacheClear");
    var href = elem.getAttribute("attr-href");
    var xhr = new XMLHttpRequest();
    xhr.open('POST', href);
    xhr.send(null);
    xhr.addEventListener('readystatechange', function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                pElem.style.backgroundColor = 'rgba(23, 202, 23, 0.45)';
                var content = pElem.cloneNode(true);
                pElem.innerHTML  = '<a href="#">Successful</a>';
                setTimeout(function () {
                    pElem.style.backgroundColor = 'initial';
                    pElem.innerHTML = content.innerHTML;
                }, 5000);
            }
    });
}

/**
 * Publish assets
 * @param elem Html element
 */
function assetsPublish(elem) {
    var pElem = document.querySelector("#iumioTaskBarAssets");
    var href = elem.getAttribute("attr-href");
    var xhr = new XMLHttpRequest();
    xhr.open('POST', href);
    xhr.send(null);
    xhr.addEventListener('readystatechange', function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            pElem.style.backgroundColor = 'rgba(23, 202, 23, 0.45)';
            var content = pElem.cloneNode(true);
            pElem.innerHTML  = '<a href="#">Successful</a>';
            setTimeout(function () {
                pElem.style.backgroundColor = 'initial';
                pElem.innerHTML = content.innerHTML;
            }, 5000);
        }
    });
}

/**
 * Clear the assets
 * @param elem Html element
 */
function assetsClear(elem) {
    var pElem = document.querySelector("#iumioTaskBarAssets");
    var href = elem.getAttribute("attr-href");
    var xhr = new XMLHttpRequest();
    xhr.open('POST', href);
    xhr.send(null);
    xhr.addEventListener('readystatechange', function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            pElem.style.backgroundColor = 'rgba(23, 202, 23, 0.45)';
            var content = pElem.cloneNode(true);
            pElem.innerHTML  = '<a href="#">Successful</a>';
            setTimeout(function () {
                pElem.style.backgroundColor = 'initial';
                pElem.innerHTML = content.innerHTML;
            }, 5000);
        }
    });
}


var inloadlog = false;
var iumioTaskBardateSession = new Date();
var iumioTaskBarHeightError = 0;
var logsarray = null;
var iumioInitTaskbarLog = 0;

/**
 * Get the list of logs
 */
function getTaskbarLogs() {
    if (inloadlog === true)
        return ;
    inloadlog = true;
    var elem = document.getElementById("iumioTaskBarRequests");
    var content = elem.parentElement.cloneNode(true);
    var href = elem.getAttribute("attr-href");
    var xhr = new XMLHttpRequest();
    xhr.open('POST', href);
    xhr.send(null);
    var he = 100;
    var start = 0;
    xhr.addEventListener('readystatechange', function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var result = JSON.parse(xhr.response);
            result = result['results'];

            var curr_url = window.location.href;
            if (ObjectLength(result) > 0)
            {

                if (typeof document.getElementsByClassName("iumioTaskBarGetOneLog")[0] !== "undefined")
                    document.getElementsByClassName("iumioTaskBarGetOneLog")[0].remove();
                elem.parentNode.className = " iumioTaskBarDropdown";
                var str = '';
                var ft = 0;
                var u = 0;
                for(var i = 0; i < ObjectLength(result); i++)
                {
                    var referer =  result[i]['referer'];
                    var d2 = new Date(result[i]['time'] * 1000);
                    if (d2 <= iumioTaskBardateSession)
                        continue;
                    if (curr_url != referer)
                        continue;
                    if (i === 0)
                    {
                        document.getElementById("iumioTaskBarRequests").innerHTML = result[i]['method'] +' '+result[i]['code'];
                        document.getElementById("iumioTaskBarRequests").innerHTML = result[i]['method'] +' '+result[i]['code'];

                        if (result[i]['code'] == 200)
                            document.getElementById("iumioTaskBarRequests").style.backgroundColor = 'rgba(56, 171, 27, 0.85)';
                        else if (result[i]['code'] == 500)
                            document.getElementById("iumioTaskBarRequests").style.backgroundColor = 'rgba(171, 27, 27, 0.85)';
                        else
                            document.getElementById("iumioTaskBarRequests").style.backgroundColor = 'rgba(169, 171, 27, 0.85)';

                        ft = 1;
                    }
                    var color = " style='background-color:rgba(169, 171, 27, 0.85);'";
                    if (result[i]['code'] == 200)
                        color = "  style='background-color:rgba(56, 171, 27, 0.85);' ";
                    else if (result[i]['code'] == 500)
                        color = "   style='background-color:rgba(171, 27, 27, 0.85);' ";
                    if (start == 0)
                     var e =   '<li class="iumioTaskBarOneLog" > ' +
                             '<table class="iumioTaskbarTable"><thead><tr><th>UIDIE</th> <th>Method</th> <th>Code</th> <th>URL</th> </tr></thead> <tbody> <tr> <td class="iumiouidieurl" onclick="location.href=\''+result[i]['log_url']+'\'">'+result[i]['uidie'] +'</td> <td>'+((result[i]['method'])) +'</td> <td>'+((result[i]['code'])) +'</td> <td>'+(result[i]['uri']).substr(0, 19) +' '+(((result[i]['referer']).length > 19)? '...' : '' )+'</td> </tr> </tbody> </table>'+
                         '</li>';
                    else
                        var e =   '<li class="iumioTaskBarOneLog" > ' +
                            '<table class="iumioTaskbarTable"><thead></thead><tbody> <tr> <td class="iumiouidieurl" onclick="location.href=\''+result[i]['log_url']+'\'">'+result[i]['uidie'] +'</td> <td>'+((result[i]['method'])) +'</td> <td>'+((result[i]['code'])) +'</td> <td>'+(result[i]['uri']).substr(0, 19) +' '+(((result[i]['referer']).length > 19)? '...' : '' )+'</td> </tr> </tbody> </table>'+
                            '</li>';
                    str += e;
                    u++;
                    if (typeof document.getElementsByClassName("iumioTaskBarGetOneLog")[0] !== "undefined" && iumioTaskBarHeightError < 300)
                    {
                        iumioTaskBarHeightError+= 50;
                        document.getElementsByClassName("iumioTaskBarGetOneLog")[0].style.height = iumioTaskBarHeightError+"!important";
                    }
                    else if (u === 0)
                        iumioTaskBarHeightError = 0;
                    start++;
                }
                if (u === 0)
                {
                    inloadlog = false;
                    return ;
                }
                str += '';

                var edd = document.createElement('ul');
                edd.innerHTML = str;
                var rs = he - (ObjectLength(result) * 20);
                if (rs < 0)
                    rs = 0;
                edd.className = " iumioTaskBarDropdownContent iumioTaskBarGetOneLog";
                insertAfter(edd, elem);
                inloadlog = false;
            }
        }
    });
}


/**
 * Get the list of app
 */
function getSimpleApps() {
    if (inload === true)
        return ;
    inload = true;

    var elem = document.getElementById("iumioTaskBarEnaDisApp");
    var content = elem.parentElement.cloneNode(true);
    var href = elem.getAttribute("attr-href");
    var xhr = new XMLHttpRequest();
    xhr.open('POST', href);
    xhr.send(null);
    var he = 100;
    xhr.addEventListener('readystatechange', function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var result = JSON.parse(xhr.response);
            result = result['results'];
            if (ObjectLength(result) > 0)
            {
                elem.parentNode.className = " iumioTaskBarDropdown";
                var str = '';
                var e = document.getElementsByClassName("iumioTaskBarAllAppRemove")[0];
                if (typeof e !== "undefined")
                    e.parentNode.removeChild(e);
                for(var i = 0; i < ObjectLength(result); i++)
                {
                    var e =   '<li class="iumioTaskBarOneApp" '+((result[i]['enabled'] === "yes")? "  style='background-color:rgba(56, 171, 27, 0.85);' " : "   style='rgba(236, 40, 40, 0.45);' ")+'  attr-href="'+result[i]['link_auto_dis_ena']+'">'+result[i]['name'] +" "+((result[i]['enabled'] === "yes")? " - Enabled" : "- Disabled") +'</li>';
                    str += e;
                }
                str += '';
                var edd = document.createElement('ul');
                edd.innerHTML = str;
                var rs = he - (ObjectLength(result) * 20);
                if (rs < 0)
                    rs = 0;
                edd.className = " iumioTaskBarDropdownContent iumioTaskBarAllAppRemove";
                insertAfter(edd, elem);
                inload = false;
            }
        }
    });
}


/**
 * Enable or disable one app
 * @param elem Html element
 */
function switchApp(elem) {
    var pElem = document.querySelector("#iumioTaskBarEnaDisApp");
    var href = elem.getAttribute("attr-href");
    var xhr = new XMLHttpRequest();
    xhr.open('POST', href);
    xhr.send(null);
    xhr.addEventListener('readystatechange', function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var e = document.getElementsByClassName("iumioTaskBarAllAppRemove")[0];
            e.parentNode.removeChild(e);
            pElem.style.backgroundColor = 'rgba(23, 202, 23, 0.45)';
            var content = pElem.cloneNode(true);
            pElem.innerHTML  = 'Successful';
            setTimeout(function () {
                pElem.style.backgroundColor = 'initial';
                pElem.innerHTML = content.innerHTML;
            }, 5000);
        }
    });
}

/**
 * GET The length of one object
 * @param object The object
 * @returns {number} The length value
 * @constructor
 */
function ObjectLength(object) {
    var length = 0;
    for( var key in object ) {
        if( object.hasOwnProperty(key) ) {
            ++length;
        }
    }
    return length;
}


/**
 * Insert element before reference element
 * @param newNode
 * @param referenceNode
 */
function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}
