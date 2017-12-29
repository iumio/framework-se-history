/*
 * This is an iumio Framework component
 *
 * (c) RAFINA DANY <dany.rafina@iumio.com>
 *
 * iumio Framework - iumio Components
 *
 * To get more information about licence, please check the licence file
 */

/**
 * Class Rt - Routing
 * @constructor
 */
var Rt = function () {

    this.json = null;
    this.fullUrl = false;

    /**
     * Get the json Routing File contain
     * @returns {number} 1 if a success -  0 if failure
     */
    this.getJson =  function()
    {
        if (typeof iumiortdata !== "undefined")
            this.json = iumiortdata;
        else
            return (0);
        return (1);
    };

    /**
     * Check validity of required elements for Route Alpha
     * @returns {number} 1 if a success -  0 if failure
     */
    this.checkValidityAlpha = function()
    {
        if (this.getJson() === 0)
            return (0);
        if (typeof document.getElementById("rt_app_referer") === "undefined")
            return (0);
        if (typeof document.getElementById("rt_app_referer").getAttribute("referer-app") === "undefined")
            return (0);
        return (1);
    };

    /**
     *  Get the current base url
     * @returns {string} Base url
     */
    this.baseUrl = function () {
        return location.protocol + "//" + location.hostname +
            (location.port && ":" + location.port);
    };

    /**
     *  Get the current part url
     * @returns {string} part url
     */
    this.partUrl = function () {
        var part = document.getElementById("rt_app_referer").getAttribute("base-url");
        return (part);
    };

    /**
     * Get a route by name
     * @param name Route name
     * @returns {string} Return the route value or nullrte [Null Routing Exception] for no route
     */
    this.getRouteAlpha =  function(name) {
        if (this.checkValidityAlpha() === 0)
            return ("$nullrte");
        var app = document.getElementById("rt_app_referer").getAttribute("referer-app");
        var file = this.json;
        if (typeof file[0] === "undefined" && typeof file[0][app] === "undefined")
            return ("$nullrte");
        var routes = file[0][app];
        for (var route in routes) {
            var rt = routes[route];
                if (rt.name === name && rt.params === "")
                    return (((this.fullUrl)? this.baseUrl() : "") + this.partUrl() + rt.path);
        }
        return ("nullrte");
    };

    /**
     *  Get a route by name, parameters and app name
     * @param name Route name
     * @param parameters Parameters for route
     * @param appname App name
     * @returns {string} Return the route value or nullrte [Null Routing Exception] for no route
     */
    this.getRouteBeta =  function(name, parameters, appname)
    {
        if (this.getJson() === 0)
            return ("$nullrte");
        var file = this.json;
        if (typeof file[0] === "undefined" && typeof file[0][appname] === "undefined")
            return ("$nullrte");
        var routes = file[0][appname];
        for (var route in routes) {
            var rt = routes[route];
            if (rt.name === name && rt.params !== "")
            {
                var onert = rt.path;
                var ind = onert.split("/");
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        var val = parameters[key];
                        for (var i = 0; i < ind.length; i++)
                        {
                            if ("{"+key+"}" === ind[i])
                                ind[i] = val;
                        }

                    }
                }
                onert = ind.join("/");
                return (((this.fullUrl)? this.baseUrl() : "") + onert);
            }
        }
        return ("nullrte");
    };

    /**
     *  Get a route by name and parameters
     * @param name Route name
     * @param parameters Parameters for route
     * @returns {string} Return the route value or nullrte [Null Routing Exception] for no route
     */
    this.getRouteGamma =  function(name, parameters)
    {
        if (this.checkValidityAlpha() === 0)
            return ("$nullrte");
        var app = document.getElementById("rt_app_referer").getAttribute("referer-app");
        var file = this.json;
        if (typeof file[0] === "undefined" && typeof file[0][app] === "undefined")
            return ("$nullrte");
        var routes = file[0][app];
        for (var route in routes) {
            var rt = routes[route];
            if (rt.name === name && rt.params !== "")
            {
                var onert = rt.path;
                var ind = onert.split("/");
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        var val = parameters[key];
                        for (var i = 0; i < ind.length; i++)
                        {
                            if ("{"+key+"}" === ind[i])
                               ind[i] = val;
                        }

                    }
                }
                onert = ind.join("/");
                return (((this.fullUrl)? this.baseUrl() : "") + onert);
            }
        }
        return ("nullrte");
    };

    /**
     * Get a route by name and app name
     * @param name Route name
     * @param appname App name
     * @returns {string} Return the route value or nullrte [Null Routing Exception] for no route
     */
    this.getRouteDelta =  function(name, appname)
    {
        if (this.getJson() === 0)
            return ("$nullrte");
        var file = this.json;
        if (typeof file[0] === "undefined" && typeof file[0][appname] === "undefined")
            return ("$nullrte");
        var routes = file[0][appname];
        for (var route in routes) {
            var rt = routes[route];
            if (rt.name === name && rt.params === "")
                return (((this.fullUrl)? this.baseUrl() : "") + rt.path);
        }
        return ("nullrte");
    };

    /**
     * Get a route
     * @param name Route name
     * @param parameters Route parameters (optionnal)
     * @param appname App name for route (optionnal)
     * @returns {string} Return the route value or nullrte [Null Routing Exception] for no route
     */
    this.getRoute = function (name, parameters, appname)
    {
        if (typeof name === "undefined")
            return ("nullrte");
        else if (!parameters && !appname)
            return (this.getRouteAlpha(name));
        else if (parameters && typeof !appname)
            return (this.getRouteGamma(name, parameters));
        else if (parameters && typeof appname)
            return (this.getRouteBeta(name, parameters, appname));
        else if (!parameters && appname)
            return (this.getRouteDelta(name, appname));
        else
            return ("nullrte");
    };

    /**
     * Change the value of full url
     * @param status Status value (true or false)
     */
    this.setFullUrl = function(status)
    {
        if (typeof status === "boolean")
          this.fullUrl = status;
        else
            throw {
                name:        "Rt Error",
                level:       "CRITICAL",
                message:     "Error detected. Full Url parameters must be a boolean.",
                htmlMessage: "Error detected. Full Url parameters must be a boolean.",
                toString:    function(){return this.name + ": " + this.message;}
            };
    };

};
