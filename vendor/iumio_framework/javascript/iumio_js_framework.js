
var core = {
    init : function () {
        console.log("TEST IN IUM JS");
        // Adding the script tag to the head as suggested before
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'autoloader.js';

        // Then bind the event to the callback function.
        // There are several events for cross browser compatibility.
        script.onreadystatechange = this.myPrettyCode();
        script.onload = this.myPrettyCode();

        // Fire the loading
        head.appendChild(script);


    },
    myPrettyCode : function() {

        // Here, do what ever you want
    },

    ajax : function () {
        var request = r;
    },

    injectView :  function () {
    }
}

core.init();
