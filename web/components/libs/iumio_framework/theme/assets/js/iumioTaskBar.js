/**
 * iumioTaskBar JAVASCRIPT
 **/

var inload = false;
window.onload = function () {
    getSimpleApps();
};

var refreshId = setInterval(function() {
    var e = document.getElementsByClassName("iumioTaskBarAllAppRemove")[0];
    if (typeof e !== "undefined")
        e.parentNode.removeChild(e);
    getSimpleApps();
}, 5000);

document.getElementById("iumioTaskBarReduce").addEventListener("click", function () {
    document.getElementsByClassName("iumioTaskBar")[0].style.display = "none";
    document.getElementById("iumioTaskBarBlank").style.display = "none";
    document.getElementsByClassName("iumioTaskBarVSmall")[0].style.display = "block";

});


document.getElementById("iumioTaskBarRestore").addEventListener("click", function () {
    document.getElementsByClassName("iumioTaskBarVSmall")[0].style.display = "none";
    document.getElementsByClassName("iumioTaskBar")[0].style.display = "block";
    document.getElementById("iumioTaskBarBlank").style.display = "block";


});


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
            case 'iumioTaskBarCacheClearPreprod':
                cacheClear(document.querySelector(".iumioTaskBarCacheClearPreprod"));
                break;
            case 'iumioTaskBarCacheClearProd':
                cacheClear(document.querySelector(".iumioTaskBarCacheClearProd"));
                break;
            case 'iumioTaskBarOneApp':
                switchApp(e.target);
                break;
        }

        switch (e.target.id)
        {
            case 'iumioTaskBarPublishAssets':
                publishAssets(document.querySelector("#iumioTaskBarPublishAssets"));
                break;
        }
    }
});


function cacheClear(elem) {
    var pElem = document.querySelector("#iumioTaskBarCacheClear");
    var href = elem.getAttribute("attr-href");
    var xhr = new XMLHttpRequest();
    xhr.open('GET', href);
    xhr.send(null);
    xhr.addEventListener('readystatechange', function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                pElem.style.backgroundColor = 'green';
                var content = pElem.cloneNode(true);
                pElem.innerHTML  = '<a href="#">Successful</a>';
                setTimeout(function () {
                    pElem.style.backgroundColor = '#2b4e9e';
                    pElem.innerHTML = content.innerHTML;
                }, 5000);
            }
    });
}


function publishAssets(elem) {
    var pElem = document.querySelector("#iumioTaskBarPublishAssets");
    var href = elem.getAttribute("attr-href");
    var xhr = new XMLHttpRequest();
    xhr.open('GET', href);
    xhr.send(null);
    xhr.addEventListener('readystatechange', function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var content = pElem.parentElement.cloneNode(true);
            elem.parentElement.style.backgroundColor = 'green';
            elem.parentElement.innerHTML  = '<a href="#" id="iumioTaskBarPublishAssets">Successful</a>';
            setTimeout(function () {
                document.querySelector("#iumioTaskBarPublishAssets").parentElement.style.backgroundColor = '#2b4e9e';
                document.querySelector("#iumioTaskBarPublishAssets").parentElement.innerHTML = content.innerHTML;
            }, 5000);
        }
    });
}


function getSimpleApps() {
    if (inload === true)
        return ;
    inload = true;
    var elem = document.getElementById("iumioTaskBarSwitchApp");
    var content = elem.parentElement.cloneNode(true);
    var href = elem.getAttribute("attr-href");
    var xhr = new XMLHttpRequest();
    xhr.open('GET', href);
    xhr.send(null);
    var he = 100;
    xhr.addEventListener('readystatechange', function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var result = JSON.parse(xhr.response);
            result = result['result'];
            if (ObjectLength(result) > 0)
            {
                elem.parentNode.className = " iumioTaskBarDropdown";
                var str = '';
                for(var i = 0; i < ObjectLength(result); i++)
                {
                    var e =   '<li class="iumioTaskBarOneApp" '+((result[i]['isdefault'] === "yes")? "  style='background-color:green;' " : "")+'  attr-href="'+result[i]['link']+'">'+result[i]['name']+'</li>';
                    str += e;
                }
                str += '';
                var edd = document.createElement('ul');
                edd.innerHTML = str;
                var rs = he - (ObjectLength(result) * 20);
                if (rs < 0)
                    rs = 0;
                edd.style.bottom = "60px";
                edd.className = " iumioTaskBarDropdownContent iumioTaskBarAllAppRemove";
                insertAfter(edd, elem);
                inload = false;
            }
        }
    });
}


function switchApp(elem) {
    var pElem = document.querySelector("#iumioTaskBarSwitchApp");
    var href = elem.getAttribute("attr-href");
    var xhr = new XMLHttpRequest();
    xhr.open('GET', href);
    xhr.send(null);
    xhr.addEventListener('readystatechange', function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var e = document.getElementsByClassName("iumioTaskBarAllAppRemove")[0];
            e.parentNode.removeChild(e);
            pElem.style.backgroundColor = 'green';
            var content = pElem.cloneNode(true);
            pElem.innerHTML  = 'Successful';
            inload = true;
            setTimeout(function () {
               pElem.style.backgroundColor = '';
               pElem.innerHTML = content.innerHTML;
               inload = false;
               location.reload();
            }, 5000);
        }
    });
}


function ObjectLength(object) {
    var length = 0;
    for( var key in object ) {
        if( object.hasOwnProperty(key) ) {
            ++length;
        }
    }
    return length;
};


function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}
