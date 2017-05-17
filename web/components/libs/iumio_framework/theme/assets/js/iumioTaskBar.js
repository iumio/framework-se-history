/**
 * iumioTaskBar JAVASCRIPT
 **/



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

