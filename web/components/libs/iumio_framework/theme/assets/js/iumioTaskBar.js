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


})