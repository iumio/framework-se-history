/**
 * iumio Framework Manager main JS
 **/


/**
 * Check if string does not contain any specials characters
 * @param str String to analyse
 * @returns {boolean} If string is valid
 */
var isValidStr = function (str) {
    return !/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
};

/**
 * Open or close a modal
 * @param instruction To close or open
 */
var modal = function (instruction) {
    $("#modalManager").modal(instruction)
};

/**
 * Modal operation is a success
 */
var operationSuccess = function () {
    var selecttorModal = $("#modalManager");
    selecttorModal.find(".modal-body").html("<h4 class='text-center'>Operation is a success</h4>");
    selecttorModal.find(".btn-close").html("Close");
    selecttorModal.find(".btn-valid").hide();
};

/**
 * Modal operation is an error
 */
var operationError = function () {
    var selecttorModal = $("#modalManager");
    selecttorModal.find(".modal-body").html("<h4 class='text-center'>An error was detected</h4>");
    selecttorModal.find(".btn-close").html("Close");
    selecttorModal.find(".btn-valid").hide();
};



/**
 * get debug log (limited to 10 values)
 */
var getLogs = function () {
    var selector = $('.lastlog');
    if (typeof selector.attr("attr-href") === "undefined")
        return (1);

    $.ajax({
        url : selector.attr("attr-href"),
        type : 'GET',
        dataType : 'json',
        success : function(data){
            if (data['code'] === 200)
            {
                var results = data['results'];
                selector.html("");
                if (results.length === 0)
                    return (selector.append("<li>No logs</li>"));

                $.each(results, function (index, value) {
                    selector.append("<li>"+value['time']+" : "+value['content']+"</li>");
                })

            }
        }
    });
};

/**
 * get debug log (unlimited)
 */
var getUnlimitedLogs = function () {
    var selector = $('.logslist');
    if (typeof selector.attr("attr-href") === "undefined")
        return (1);
    $.ajax({
        url : selector.attr("attr-href"),
        type : 'GET',
        dataType : 'json',
        success : function(data){
            if (data['code'] === 200)
            {
                var results = data['results'];
                selector.html("");
                if (results.length === 0)
                    return (selector.append("<tr><td colspan='4'>No logs</td></tr>"));

                $.each(results, function (index, value) {
                    var error = value['content'];
                    error = error.split(":");
                    value['content'] = (value['content']).replace((error[0])+": ", "");
                    error[0] = error[0].replace("[", "");
                    error[0] = error[0].replace("]", "");

                    selector.append("<tr>" +
                        "<td>"+index+"</td>" +
                        "<td>"+value['time']+"</td>" +
                        "<td>"+error[0]+"</td>" +
                        "<td style='word-wrap: break-word;width: 75%'>"+value['content']+"</td>" +
                        "</tr>");
                });

            }
        }
    })
};


/**
 * get databases list
 */
var getDatabasesList = function () {

    var selector = $('.databaseslist');
    if (typeof selector.attr("attr-href") === "undefined")
        return (1);
    $.ajax({
        url : selector.attr("attr-href"),
        type : 'GET',
        dataType : 'json',
        success : function(data){
            if (data['code'] === 200)
            {
                var results = data['results'];
                selector.html("");
                if (results.length === 0)
                    return (selector.append("<tr><td colspan='4'>No database configuration</td></tr>"));

                $.each(results, function (index, value) {
                    selector.append("<tr>" +
                        "<td>"+index+"</td>" +
                        "<td>"+value['db_name']+"</td>" +
                        "<td>"+value['db_host']+"</td>" +
                        "<td>"+value['db_driver']+"</td>" +
                        "<td><button class=' btn-info btn toeditdatabase' attr-href='"+value['edit']+"' attr-href2='"+value['edit_save']+"' attr-dbconfig='"+index+"'>ED</button></td>"+
                        "<td><button class='btn-info btn todeletedatabase' attr-href='"+value['remove']+"' attr-dbconfig='"+index+"'>DE</button></td>"+
                        "</tr>");
                });
            }
        }
    });
};

/**
 * get the default app
 */
var getDefaultApp = function () {

    var selector = $('.defaultapp');
    if (typeof selector.attr("attr-href") === "undefined")
        return (1);
    $.ajax({
        url : selector.attr("attr-href"),
        type : 'GET',
        dataType : 'json',
        success : function(data){
            if (data['code'] === 200)
            {
                var results = data['results'];
                selector.html("");
                if (results.length === 0)
                    return (selector.append("<li>No default app</li>"));

                selector.append("<li>App name : "+results['name']+"</li>");
                selector.append("<li>Creation date : "+results['creation']['date']+"</li>");
                selector.append("<li>Update date : "+results['update']['date']+"</li>");
                selector.append("<li>Class : "+results['class']+"</li>");

            }
        }
    })
};


/**
 * get app list
 */
var simpleapps = null;
var getAppListSimple = function () {

    var selector = $('.applist');
    if (typeof selector.attr("attr-href") === "undefined")
        return (1);
    $.ajax({
        url : selector.attr("attr-href"),
        type : 'GET',
        dataType : 'json',
        success : function(data){
            if (data['code'] === 200)
            {
                var results = data['results'];
                selector.html("");
                if (results.length === 0)
                    return (selector.append("<tr><td colspan='6'>No apps</td></tr>"));

                $.each(results, function (index, value) {
                    selector.append("<tr>" +
                        "<td>"+index+"</td>" +
                        "<td>"+value['name']+"</td>" +
                        "<td>"+value['isdefault']+"</td>" +
                        "<td>"+value['class']+"</td>" +
                        "<td><button class=' btn-info btn todefaultapp' attr-href='"+value['link']+"' attr-appname='"+value['name']+"'>SW</button></td>"+
                        "<td><button class='btn-info btn deleteapp' attr-href='"+value['link_remove']+"' attr-appname='"+value['name']+"'>DE</button></td>"+
                        "</tr>");
                });
                simpleapps = results;

            }
        }
    })
};

/**
 * get all cache environment
 */
var getAllCacheEnv = function () {

    var selector = $('.getAllEnvCache');
    if (typeof selector.attr("attr-href") === "undefined")
        return (1);
    $.ajax({
        url : selector.attr("attr-href"),
        type : 'GET',
        dataType : 'json',
        success : function(data){
            if (data['code'] === 200)
            {
                var results = data['results'];
                selector.html("");
                if (results.length === 0)
                    return (selector.append("<tr><td colspan='6'>No cache directory</td></tr>"));

                $.each(results, function (index, value) {
                    selector.append("<tr>" +
                        "<td>"+value['name']+"</td>" +
                        "<td>"+value['path']+"</td>" +
                        "<td>"+value['size']+"</td>" +
                        "<td "+((value['perms'] === true)? 'style="background-color:green;color:white;text-align:center"' : 'style="background-color:red;color:white;text-align:center"')+">"+value['nperms']+"</td>" +
                        "<td>"+value['status']+"</td>" +
                        "<td><button class='btn-info btn clearcachespec' attr-href='"+value['clear']+"' attr-env='"+value['env']+"'>CL</button></td>"+
                        "</tr>");
                });
                simpleapps = results;

            }
        }
    })
};




/**
 * Create on app
 */

var createOneApp = function (href) {
    var name           = $("input[type=text][name=appname]").val();
    var template       = $("input[type=checkbox][name=template]:checked" ).val();
    var isdefault      = $( "input[type=checkbox][name=isdefault]:checked" ).val();
    var selecttorModal = $("#modalManager");

    if (name === "")
    {
        selecttorModal.find(".onealert").html("Oups! Enter an app name");
        selecttorModal.find(".onealert").show();
        return (false);
    }

    if (name === "App" || name.length <= 3 || !isValidStr(name))
    {
        selecttorModal.find(".onealert").html("Oups! Error on app name. <br>Your app name must to end with 'App' keyword (example TestApp) ");
        selecttorModal.find(".onealert").show();
        return (false);
    }
    var p2    = name[name.length - 1];
    var p1    = name[name.length - 2];
    var a     = name[name.length - 3];
    var conca = a + p1 + p2;

    if (conca !== "App" && isValidStr(name)) {
        selecttorModal.find(".onealert").html("Oups! Error on app name. <br>Your app name must to end with 'App' keyword (example TestApp) ");
        selecttorModal.find(".onealert").show();
        return (false);
    }

    if (typeof template !== "undefined")
        template = "yes";
    else
        template = "no";

    if (typeof isdefault !== "undefined")
        isdefault = "yes";
    else
        isdefault = "no";

    selecttorModal.find(".onealert").hide();

    $.ajax({
        url : href,
        type : 'POST',
        dataType : 'json',
        data : {"name" : name, "template" : template, "default" : isdefault},
        success : function(data){
            if (data['code'] === 200)
            {
                getAppListSimple();
                if (data['code'] === 200)
                    operationSuccess();
                else
                    operationError();
            }
            else
                operationError();
        }
    })
};


/**
 * save database configuration
 */

var saveDatabaseConfiguration = function (href) {
    var name           = $("input[type=text][name=name]").val();
    var host           = $("input[type=text][name=host]").val();
    var user           = $("input[type=text][name=user]").val();
    var password       = $("input[type=text][name=password]").val();
    var port           = $("input[type=number][name=port]").val();
    var driver         = $("input[type=text][name=driver]").val();

    var selecttorModal = $("#modalManager");

    if (name === ""  || host === ""  || user === ""  || password === ""  || driver === "" )
    {
        selecttorModal.find(".onealert").html("Oups! An error was detected");
        selecttorModal.find(".onealert").show();
        return (false);
    }

    selecttorModal.find(".onealert").hide();

    $.ajax({
        url : href,
        type : 'POST',
        dataType : 'json',
        data : {"name" : name, "host" : host, "user" : user, "password" : password, "port" : port, "driver" : driver},
        success : function(data){
            if (data['code'] === 200)
            {
                getDatabasesList();
                if (data['code'] === 200)
                    operationSuccess();
                else
                    operationError();
            }
            else
                operationError();
        }
    });
};


/**
 * create database configuration
 */

var createDatabaseConfiguration = function (href) {
    var config         = $("input[type=text][name=config]").val();
    var name           = $("input[type=text][name=name]").val();
    var host           = $("input[type=text][name=host]").val();
    var user           = $("input[type=text][name=user]").val();
    var password       = $("input[type=text][name=password]").val();
    var port           = $("input[type=number][name=port]").val();
    var driver         = $("input[type=text][name=driver]").val();

    var selecttorModal = $("#modalManager");

    if (config === ""  || name === ""  || host === ""  || user === ""  || password === ""  || driver === "" )
    {
        selecttorModal.find(".onealert").html("Oups! An error was detected");
        selecttorModal.find(".onealert").show();
        return (false);
    }

    selecttorModal.find(".onealert").hide();

    $.ajax({
        url : href,
        type : 'POST',
        dataType : 'json',
        data : {"config" : config, "name" : name, "host" : host, "user" : user, "password" : password, "port" : port, "driver" : driver},
        success : function(data){
            if (data['code'] === 200)
            {
                getDatabasesList();
                if (data['code'] === 200)
                    operationSuccess();
                else
                    operationError();
            }
            else
                operationError();
        }
    });
};



/**
 * Switch app to defalt
 * @param url Url to switch app
 */
var getSwitchApp = function (url) {

    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'json',
        success : function(data){
            if (data['code'] === 200)
            {
                getAppListSimple();
                operationSuccess();
            }
        }
    })
};


/**
 * Clear logs
 * @param url Url to clear logs
 */
var clearLogs = function (url) {

    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'json',
        success : function(data){
            if (data['code'] === 200)
            {
                getUnlimitedLogs();
                operationSuccess();
            }
        }
    })
};



/**
 * remove an app
 * @param url Url to remove app
 */
var removeApp = function (url) {

    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'json',
        success : function(data){
            getAppListSimple();
            if (data['code'] === 200)
                operationSuccess();
            else
                operationError();
        }
    })
};


/**
 * clear all cache
 * @param url Url to remove all cache
 */
var clearAllCache = function (url) {

    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'json',
        success : function(data){
            getAllCacheEnv();
            if (data['code'] === 200)
                operationSuccess();
            else
                operationError();
        }
    })
};

/**
 * clear cache for specific env
 * @param url Url to clear cache for specific env
 */
var clearCache = function (url) {

    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'json',
        success : function(data){
            getAllCacheEnv();
            if (data['code'] === 200)
                operationSuccess();
            else
                operationError();
        }
    })
};

/**
 * remove db configuration
 * @param url Url to remove db
 */
var removeDb = function (url) {

    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'json',
        success : function(data){
            getDatabasesList();
            if (data['code'] === 200)
                operationSuccess();
            else
                operationError();
        }
    })
};


$(document).ready(function () {

    getLogs();
    getDefaultApp();
    getAppListSimple();
    getUnlimitedLogs();
    getDatabasesList();
    getAllCacheEnv();

    setInterval(function () {
        getLogs();
        getDefaultApp();
        getAppListSimple();
        getUnlimitedLogs();
        getDatabasesList();
        getAllCacheEnv();
    }, 7000);

    /**
     * Event to switch default app
     */
    $(document).on('click', ".todefaultapp", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");
        var appname = selector.attr("attr-appname");

        var selecttorModal = $("#modalManager");
        selecttorModal.find(".modal-header").html("<strong class='text-center'>Switch to default</strong>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Are you sure to set <strong>"+appname+"</strong> default app ?</h4>");
        selecttorModal.find(".btn-close").html("No");
        selecttorModal.find(".btn-valid").html("Yes");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "switchapp");
        selecttorModal.find(".btn-close").show();
        selecttorModal.find(".btn-valid").show();

        modal("show");
    });

    /**
     * Event to delete an app
     */
    $(document).on('click', ".deleteapp", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");
        var appname = selector.attr("attr-appname");

        var selecttorModal = $("#modalManager");
        selecttorModal.find(".modal-header").html("<strong class='text-center'>Delete "+appname+"</strong>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Are you sure to delete <strong>"+appname+"</strong> ?</h4>");
        selecttorModal.find(".btn-close").html("No");
        selecttorModal.find(".btn-valid").html("Yes");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "removeapp");
        selecttorModal.find(".btn-close").show();
        selecttorModal.find(".btn-valid").show();

        modal("show");
    });


    /**
     * Event to delete an database configuration
     */
    $(document).on('click', ".todeletedatabase", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");
        var name = selector.attr("attr-dbconfig");

        var selecttorModal = $("#modalManager");
        selecttorModal.find(".modal-header").html("<strong class='text-center'>Delete "+name+"</strong>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Are you sure to delete <strong>"+name+"</strong> database configuration ?</h4>");
        selecttorModal.find(".btn-close").html("No");
        selecttorModal.find(".btn-valid").html("Yes");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "removedb");
        selecttorModal.find(".btn-close").show();
        selecttorModal.find(".btn-valid").show();

        modal("show");
    });



    /**
     * Event to validate an event
     */
    $(document).on('click', ".btn-valid", function () {
        var selector = $(this);
        var event = selector.attr("attr-event");
        var href = selector.attr("attr-href");

        switch (event)
        {
            case "switchapp":
                getSwitchApp(href);
                break;
            case "removeapp":
                removeApp(href);
                break;
            case "createvalidapp":
                createOneApp(href);
                break;
            case "clearlogs":
                clearLogs(href);
                break;
            case "removedb":
                removeDb(href);
                break;
            case "editdatabasesave":
                saveDatabaseConfiguration(href);
                break;
            case "createsavedatabase":
                createDatabaseConfiguration(href);
                break;
            case "clearallcache":
                clearAllCache(href);
                break;
            case "clearcache":
                clearCache(href);
                break;

        }
    });


    /**
     * Event to show create app modal
     */
    $(document).on('click', ".createapp", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");

        var selecttorModal = $("#modalManager");

        selecttorModal.find(".modal-header").html("<strong class='text-center'>Create one app</strong>");
        selecttorModal.find(".modal-header").append("<p class='alert alert-danger onealert' style='display: none'></p>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Fill in the fields to create an application.</h4>");
        selecttorModal.find(".modal-body").append("<br>");
        selecttorModal.find(".modal-body").append("<div class='container'><div class='row'>");

        selecttorModal.find(".modal-body").append("<div class='form-group text-center'><label>Name</label><input type='text' name='appname' class='form-control'></div>");
        selecttorModal.find(".modal-body").append("</div></div>");
        selecttorModal.find(".modal-body").append('<div class="container-new">' +
            '<div class="form-group text-center"> <label>Default template</label> <div class="check"><input id="check" type="checkbox" name="template" style="display: none"/><label for="check"><div class="box"><i class="fa fa-check"></i></div> </label></div></div>' +
            '<div class="form-group text-center"><label>Default app</label> <div class="check"><input id="check1" name="isdefault"  type="checkbox" style="display: none" /><label for="check1"><div class="box"><i class="fa fa-check"></i></div> </label></div></div>' +
            '</div>');

        selecttorModal.find(".btn-close").html("Close");
        selecttorModal.find(".btn-valid").html("Create");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "createvalidapp");
        selecttorModal.find(".btn-close").show();
        selecttorModal.find(".btn-valid").show();

        modal("show");
    });


    /**
     * Event to show edit database modal
     */
    $(document).on('click', ".toeditdatabase", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");
        var href2 = selector.attr("attr-href2");
        var name = selector.attr("attr-dbconfig");
        var result = null;

        $.ajax({
            url : href,
            type : 'GET',
            dataType : 'json',
            success : function(data){
                if (data['code'] === 200)
                {
                    result = data['results'];
                    var selecttorModal = $("#modalManager");

                    selecttorModal.find(".modal-header").html("<strong class='text-center'>Edit "+name+" configuration</strong>");
                    selecttorModal.find(".modal-header").append("<p class='alert alert-danger onealert' style='display: none'></p>");
                    selecttorModal.find(".modal-body").html("<h4 class='text-center'>Edit fields to update database configuration.</h4>");
                    selecttorModal.find(".modal-body").append("<br>");
                    selecttorModal.find(".modal-body").append("<div class='container'><div class='row'>");

                    selecttorModal.find(".modal-body").append("<div class='form-group text-center'><label>Configuration name</label><input type='text' name='config' class='form-control text-center' value='"+name+"' disabled='disabled'></div>");
                    selecttorModal.find(".modal-body").append("</div></div>");
                    selecttorModal.find(".modal-body").append("<div class='form-group text-center'><label>Name</label><input type='text' name='name' class='form-control text-center' value='"+result['db_name']+"'></div>");
                    selecttorModal.find(".modal-body").append("</div></div>");
                    selecttorModal.find(".modal-body").append("<div class='form-group text-center'><label>Host</label><input type='text' name='host' class='form-control text-center' value='"+result['db_host']+"'></div>");
                    selecttorModal.find(".modal-body").append("</div></div>");
                    selecttorModal.find(".modal-body").append("<div class='form-group text-center'><label>User name</label><input type='text' name='user' class='form-control text-center' value='"+result['db_user']+"'></div>");
                    selecttorModal.find(".modal-body").append("</div></div>");
                    selecttorModal.find(".modal-body").append("<div class='form-group text-center'><label>User password</label><input type='text' name='password' class='form-control text-center' value='"+result['db_password']+"'></div>");
                    selecttorModal.find(".modal-body").append("</div></div>");
                    selecttorModal.find(".modal-body").append("<div class='form-group text-center'><label>Port</label><input type='number' name='port' class='form-control text-center' value='"+result['db_port']+"'></div>");
                    selecttorModal.find(".modal-body").append("</div></div>");
                    selecttorModal.find(".modal-body").append("<div class='form-group text-center'><label>Driver</label><input type='text' name='driver' class='form-control text-center' value='"+result['db_driver']+"'></div>");
                    selecttorModal.find(".modal-body").append("</div></div>");

                    selecttorModal.find(".btn-close").html("Close");
                    selecttorModal.find(".btn-valid").html("Update");

                    selecttorModal.find(".btn-valid").attr("attr-href", href2);
                    selecttorModal.find(".btn-valid").attr("attr-dbconfig", name);
                    selecttorModal.find(".btn-valid").attr("attr-event", "editdatabasesave");
                    selecttorModal.find(".btn-close").show();
                    selecttorModal.find(".btn-valid").show();

                    modal("show");
                }
                else
                {
                    operationError();
                    return (0);
                }
            }
        });
    });

    /**
     * Event to show create database config modal
     */
    $(document).on('click', ".createdatabaseconfig", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");

        var selecttorModal = $("#modalManager");

        selecttorModal.find(".modal-header").html("<strong class='text-center'>Create a new database configuration</strong>");
        selecttorModal.find(".modal-header").append("<p class='alert alert-danger onealert' style='display: none'></p>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Fill in the fields to create a database configuration.</h4>");
        selecttorModal.find(".modal-body").append("<br>");
        selecttorModal.find(".modal-body").append("<div class='container'><div class='row'>");

        selecttorModal.find(".modal-body").append("<div class='form-group text-center'><label>Configuration name</label><input type='text' name='config' class='form-control text-center'></div>");
        selecttorModal.find(".modal-body").append("</div></div>");
        selecttorModal.find(".modal-body").append("<div class='form-group text-center'><label>Name</label><input type='text' name='name' class='form-control text-center'></div>");
        selecttorModal.find(".modal-body").append("</div></div>");
        selecttorModal.find(".modal-body").append("<div class='form-group text-center'><label>Host</label><input type='text' name='host' class='form-control text-center'></div>");
        selecttorModal.find(".modal-body").append("</div></div>");
        selecttorModal.find(".modal-body").append("<div class='form-group text-center'><label>User name</label><input type='text' name='user' class='form-control text-center'></div>");
        selecttorModal.find(".modal-body").append("</div></div>");
        selecttorModal.find(".modal-body").append("<div class='form-group text-center'><label>User password</label><input type='text' name='password' class='form-control text-center'></div>");
        selecttorModal.find(".modal-body").append("</div></div>");
        selecttorModal.find(".modal-body").append("<div class='form-group text-center'><label>Port</label><input type='number' name='port' class='form-control text-center'></div>");
        selecttorModal.find(".modal-body").append("</div></div>");
        selecttorModal.find(".modal-body").append("<div class='form-group text-center'><label>Driver</label><input type='text' name='driver' class='form-control text-center'></div>");
        selecttorModal.find(".modal-body").append("</div></div>");

        selecttorModal.find(".btn-close").html("Close");
        selecttorModal.find(".btn-valid").html("Update");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "createsavedatabase");
        selecttorModal.find(".btn-close").show();
        selecttorModal.find(".btn-valid").show();

        modal("show");
    });



    /**
     * Event to clear logs
     */
    $(document).on('click', ".clearlogs", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");
        var env = selector.attr("attr-env");

        var selecttorModal = $("#modalManager");

        selecttorModal.find(".modal-header").html("<strong class='text-center'>Clear log for "+env+" environment</strong>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Would you like to empty log file for <strong>"+env+"</strong> environment ?</h4>");
        selecttorModal.find(".btn-close").html("No");
        selecttorModal.find(".btn-valid").html("Yes");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "clearlogs");
        selecttorModal.find(".btn-close").show();
        selecttorModal.find(".btn-valid").show();

        modal("show");
    });


    /**
     * Event to clear all cache
     */
    $(document).on('click', ".clearcache", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");
        var env = selector.attr("attr-env");

        var selecttorModal = $("#modalManager");

        selecttorModal.find(".modal-header").html("<strong class='text-center'>Clear cache for all environment</strong>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Would you like to empty cache folder for all environment ?</h4>");
        selecttorModal.find(".btn-close").html("No");
        selecttorModal.find(".btn-valid").html("Yes");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "clearallcache");
        selecttorModal.find(".btn-close").show();
        selecttorModal.find(".btn-valid").show();

        modal("show");
    });


    /**
     * Event to clear all cache
     */
    $(document).on('click', ".clearcachespec", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");
        var env = selector.attr("attr-env");

        var selecttorModal = $("#modalManager");

        selecttorModal.find(".modal-header").html("<strong class='text-center'>Clear cache for "+env+" environment</strong>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Would you like to empty cache folder for <strong>"+env+"</strong> environment ?</h4>");
        selecttorModal.find(".btn-close").html("No");
        selecttorModal.find(".btn-valid").html("Yes");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "clearcache");
        selecttorModal.find(".btn-close").show();
        selecttorModal.find(".btn-valid").show();

        modal("show");
    });

});

