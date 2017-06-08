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
 * get smarty configuration list
 */
var getAllSmartyConfigs = function () {

    var selector = $('.smartyconfigs');
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
                    return (selector.append("<tr><td colspan='4'>No smarty configurations</td></tr>"));

                $.each(results, function (index, value) {
                    selector.append("<tr>" +
                        "<td>"+index+"</td>" +
                        "<td>"+((value['debug'] === true)? "Enabled" : "Disabled") +"</td>" +
                        "<td>"+((value['cache'] === 1)? "Enabled" : "Disabled")+"</td>" +
                        "<td>"+value['console_debug']+"</td>" +
                        "<td><button class=' btn-info btn editsmartyconfig' attr-href='"+value['edit']+"' attr-href2='"+value['save']+"' attr-config='"+index+"'>ED</button></td>"+
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
                    selector.append("<tr "+((value['isdefault'] === "yes")? "style='background-color:#4762be;color:white'": "")+">" +
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

            }
        }
    })
};

/**
 * get all assets
 */
var getAllAssets = function () {

    var selector = $('.getAllAssets');
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
                    return (selector.append("<tr><td colspan='6'>No assets</td></tr>"));

                $.each(results, function (index, value) {
                    /**
                     * 0 : AppName
                     * 1 : Have assets (1 ==> contains assets, 0 ==> not exist,  2 ==> Empty)
                     * 3 : Perms on Dev
                     * 4 : Perms on Prod
                     * 5 : Status dev (0==> "Need to publish (redColor)", 1==> "OK (Green Color)")
                     * 6 : Status prod (0==> "Need to publish (redColor)", 1==> "OK (Green Color)")
                     * 7 : Action (Modal with url clear prod and dev , url publish prod and dev)
                     */
                    selector.append("<tr>" +
                        "<td>"+index+"</td>" +
                        "<td>"+value['name']+"</td>" +
                        "<td>"+((value['haveassets'] === 1)? "Yes" : ((value['haveassets'] === 2)? "Empty" : "No"))+"</td>" +
                        "<td>"+value['dev_perms']+"</td>" +
                        "<td>"+value['prod_perms']+"</td>" +
                        //"<td "+((value['perms'] === true)? 'style="background-color:green;color:white;text-align:center"' : 'style="background-color:red;color:white;text-align:center"')+">"+value['nperms']+"</td>" +
                        "<td "+((value['status_dev'] === 1)? 'style="background-color:green;color:white;"' : 'style="background-color:red;color:white;text-align:center"')+">"+((value['status_dev'] === 1)? 'OK' : 'Need to publish')+"</td>" +
                        "<td "+((value['status_prod'] === 1)? 'style="background-color:green;color:white;"' : 'style="background-color:red;color:white;text-align:center"')+">"+((value['status_prod'] === 1)? 'OK' : 'Need to publish')+"</td>" +
                        ((value['haveassets'] === 1)? "<td><button class='btn-info btn showoptionsassets' attr-href-clear-dev='"+value['clear']['dev']+"' attr-href-clear-prod='"+value['clear']['prod']+"' attr-href-publish-dev='"+value['publish']['dev']+"'  attr-href-publish-prod='"+value['publish']['prod']+"'  attr-href-clear-all='"+value['clear']['all']+"' attr-href-publish-all='"+value['publish']['all']+"' attr-appname='"+value['name']+"' >AC</button></td>" : "")+
                        "</tr>");
                });

            }
        }
    })
};


/**
 * get all compile environment
 */
var getAllCompileEnv = function () {

    var selector = $('.getAllEnvCompile');
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
                    return (selector.append("<tr><td colspan='6'>No compiled directory</td></tr>"));

                $.each(results, function (index, value) {
                    selector.append("<tr>" +
                        "<td>"+value['name']+"</td>" +
                        "<td>"+value['path']+"</td>" +
                        "<td>"+value['size']+"</td>" +
                        "<td "+((value['perms'] === true)? 'style="background-color:green;color:white;text-align:center"' : 'style="background-color:red;color:white;text-align:center"')+">"+value['nperms']+"</td>" +
                        "<td>"+value['status']+"</td>" +
                        "<td><button class='btn-info btn clearcompilespec' attr-href='"+value['clear']+"' attr-env='"+value['env']+"'>CL</button></td>"+
                        "</tr>");
                });

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
 * save smarty configuration
 */

var saveSmartyConfiguration = function (href) {
    var debug           = $("input[type=checkbox][name=debug]:checked").val();
    var cache           = $("input[type=checkbox][name=cache]:checked").val();
    var compile         = $("input[type=checkbox][name=compile]:checked").val();
    var force           = $("input[type=checkbox][name=force]:checked").val();
    var sdebug          = $("input[type=checkbox][name=sdebug]:checked").val();
    var console         = $("input[type=checkbox][name=console]:checked").val();


    var selecttorModal = $("#modalManager");

    if (typeof debug !== "undefined")
        debug = true;
    else
        debug = false;

    if (typeof cache !== "undefined")
        cache = 1;
    else
        cache = 0;

    if (typeof compile !== "undefined")
        compile = true;
    else
        compile = false;

    if (typeof force !== "undefined")
        force = true;
    else
        force = false;

    if (typeof sdebug !== "undefined")
        sdebug = true;
    else
        sdebug = false;

    if (typeof console !== "undefined")
        console = "on";
    else
        console = "off";


    selecttorModal.find(".onealert").hide();

    $.ajax({
        url : href,
        type : 'POST',
        dataType : 'json',
        data : {"debug" : debug, "cache" : cache, "compile" : compile, "force" : force, "sdebug" : sdebug, "console" : console},
        success : function(data){
            if (data['code'] === 200)
            {
                getDatabasesList();
                if (data['code'] === 200)
                {
                    operationSuccess();
                    var selecttorModal = $("#modalManager");
                    selecttorModal.find(".btn-close").hide();
                    setTimeout(function () {
                        location.reload();
                    }, 5000)
                }
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
            {
                if (data['msg'] === "RELOAD")
                {
                    operationSuccess();
                    var selecttorModal = $("#modalManager");
                    selecttorModal.find(".modal-body").html("<h4 class='text-center'>No app was registered</h4>");
                    selecttorModal.attr({'data-backdrop' : "static", "data-keyword" : "false"});
                    selecttorModal.find(".btn-close").hide();
                    selecttorModal.find(".btn-valid").hide();
                    setTimeout(function () {
                        location.reload();
                    }, 5000);

                }
                else
                    operationSuccess();
            }

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
 * clear all compile
 * @param url Url to remove all compile
 */
var clearAllCompile = function (url) {

    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'json',
        success : function(data){
            getAllCompileEnv();
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
 * clear compile for specific env
 * @param url Url to clear compile for specific env
 */
var clearCompile = function (url) {

    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'json',
        success : function(data){
            getAllCompileEnv();
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

/**
 * Publish assets
 * @param url Url to publish
 */
var assetsPublishManager = function (url) {

    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'json',
        success : function(data){
            // getDatabasesList();
            if (data['code'] === 200)
                operationSuccess();
            else
                operationError();
        }
    })
};


/**
 * Clear assets
 * @param url Url to clear
 */
var assetsClearManager = function (url) {

    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'json',
        success : function(data){
            // getDatabasesList();
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
    getAllCompileEnv();
    getAllSmartyConfigs();
    getAllAssets();

    setInterval(function () {
        getLogs();
        getDefaultApp();
        getAppListSimple();
        getUnlimitedLogs();
        getDatabasesList();
        getAllCacheEnv();
        getAllCompileEnv();
        getAllSmartyConfigs();
        getAllAssets();
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
     * Event to publish all assets for all env
     */
    $(document).on('click', ".publishallassets", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");

        var selecttorModal = $("#modalManager");
        selecttorModal.find(".modal-header").html("<strong class='text-center'>Publish all assets - all environments</strong>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Are you sure to publish all assets for all environments ?</h4>");
        selecttorModal.find(".btn-close").html("No");
        selecttorModal.find(".btn-valid").html("Yes");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "pallassets");
        selecttorModal.find(".btn-close").show();
        selecttorModal.find(".btn-valid").show();

        modal("show");
    });

    /**
     * Event to publish all assets for dev env
     */
    $(document).on('click', ".publishalldevassets", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");

        var selecttorModal = $("#modalManager");
        selecttorModal.find(".modal-header").html("<strong class='text-center'>Publish all assets - dev environment</strong>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Are you sure to publish all assets for dev environment ?</h4>");
        selecttorModal.find(".btn-close").html("No");
        selecttorModal.find(".btn-valid").html("Yes");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "palldevassets");
        selecttorModal.find(".btn-close").show();
        selecttorModal.find(".btn-valid").show();

        modal("show");
    });

    /**
     * Event to publish all assets for prod env
     */
    $(document).on('click', ".publishallprodassets", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");

        var selecttorModal = $("#modalManager");
        selecttorModal.find(".modal-header").html("<strong class='text-center'>Publish all assets - prod environment</strong>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Are you sure to publish all assets for prod environment ?</h4>");
        selecttorModal.find(".btn-close").html("No");
        selecttorModal.find(".btn-valid").html("Yes");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "pallprodassets");
        selecttorModal.find(".btn-close").show();
        selecttorModal.find(".btn-valid").show();

        modal("show");
    });


    /**
     * Event to clear all assets for all env
     */
    $(document).on('click', ".clearallassets", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");

        var selecttorModal = $("#modalManager");
        selecttorModal.find(".modal-header").html("<strong class='text-center'>Clear all assets - all environments</strong>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Are you sure to Clear all assets for all environments ?</h4>");
        selecttorModal.find(".btn-close").html("No");
        selecttorModal.find(".btn-valid").html("Yes");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "callassets");
        selecttorModal.find(".btn-close").show();
        selecttorModal.find(".btn-valid").show();

        modal("show");
    });

    /**
     * Event to clear all assets for dev env
     */
    $(document).on('click', ".clearalldevassets", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");

        var selecttorModal = $("#modalManager");
        selecttorModal.find(".modal-header").html("<strong class='text-center'>Clear all assets - dev environment</strong>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Are you sure to Clear all assets for dev environment ?</h4>");
        selecttorModal.find(".btn-close").html("No");
        selecttorModal.find(".btn-valid").html("Yes");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "calldevassets");
        selecttorModal.find(".btn-close").show();
        selecttorModal.find(".btn-valid").show();

        modal("show");
    });

    /**
     * Event to clear all assets for prod env
     */
    $(document).on('click', ".clearallprodassets", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");

        var selecttorModal = $("#modalManager");
        selecttorModal.find(".modal-header").html("<strong class='text-center'>Clear all assets - prod environment</strong>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Are you sure to Clear all assets for prod environment ?</h4>");
        selecttorModal.find(".btn-close").html("No");
        selecttorModal.find(".btn-valid").html("Yes");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "callprodassets");
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
            case "clearallcompile":
                clearAllCompile(href);
                break;
            case "clearcompile":
                clearCompile(href);
                break;
            case "editsmartysave":
                saveSmartyConfiguration(href);
                break;
            case "callprodassets":
            case "calldevassets":
            case "callassets":
                assetsClearManager(href);
                break;
            case "pallprodassets":
            case "palldevassets":
            case "pallassets":
                assetsPublishManager(href);
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
     * Event to show edit smarty configuration
     */
    $(document).on('click', ".editsmartyconfig", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");
        var href2 = selector.attr("attr-href2");
        var name = selector.attr("attr-config");
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
                    selecttorModal.find(".modal-body").html("<h4 class='text-center'>Edit fields to update smarty configuration.</h4>");
                    selecttorModal.find(".modal-body").append("<br>");
                    selecttorModal.find(".modal-body").append("<div class='container'><div class='row'>");

                    selecttorModal.find(".modal-body").append("<div class='form-group text-center'><label>Configuration name</label><input type='text' name='config' class='form-control text-center' value='"+name+"' disabled='disabled'></div>");
                    selecttorModal.find(".modal-body").append("</div></div>");
                    selecttorModal.find(".modal-body").append('<div class="container-new">' +
                        '<div class="form-group text-center"> <label>Debug</label> <div class="check"><input id="check" type="checkbox" name="debug" '+((result['debug'] === true)? "checked='checked'" : "")+' style="display: none"/><label for="check"><div class="box"><i class="fa fa-check"></i></div> </label></div></div>' +
                        '<div class="form-group text-center"><label>Cache</label> <div class="check"><input id="check1" name="cache" '+((result['cache'] === 1)? "checked='checked'" : "")+' type="checkbox" style="display: none" /><label for="check1"><div class="box"><i class="fa fa-check"></i></div> </label></div></div>' +
                        '<div class="form-group text-center"><label>Compile Check</label> <div class="check"><input id="check2" name="compile" '+((result['compile_check'] === true)? "checked='checked'" : "")+' type="checkbox" style="display: none" /><label for="check2"><div class="box"><i class="fa fa-check"></i></div> </label></div></div>' +
                        '<div class="form-group text-center"><label>Force to compile</label> <div class="check"><input id="check3" name="force" '+((result['force_compile'] === true)? "checked='checked'" : "")+' type="checkbox" style="display: none" /><label for="check3"><div class="box"><i class="fa fa-check"></i></div> </label></div></div>' +
                        '<div class="form-group text-center"><label>Smarty Debug</label> <div class="check"><input id="check4" name="sdebug" '+((result['smarty_debug'] === true)? "checked='checked'" : "")+' type="checkbox" style="display: none" /><label for="check4"><div class="box"><i class="fa fa-check"></i></div> </label></div></div>' +
                        '<div class="form-group text-center"><label>Console</label> <div class="check"><input id="check5" name="console" '+((result['console_debug'] === "on")? "checked='checked'" : "")+' type="checkbox" style="display: none" /><label for="check5"><div class="box"><i class="fa fa-check"></i></div> </label></div></div>' +
                        '</div>');
                    selecttorModal.find(".modal-body").append("</div></div>");

                    selecttorModal.find(".btn-close").html("Close");
                    selecttorModal.find(".btn-valid").html("Update");

                    selecttorModal.find(".btn-valid").attr("attr-href", href2);
                    selecttorModal.find(".btn-valid").attr("attr-config", name);
                    selecttorModal.find(".btn-valid").attr("attr-event", "editsmartysave");
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
     * Event to show assets options modal
     */
    $(document).on('click', ".showoptionsassets", function () {
        var selector = $(this);
        var hrefcd = selector.attr("attr-href-clear-dev");
        var hrefcp = selector.attr("attr-href-clear-prod");
        var hrefpd = selector.attr("attr-href-publish-dev");
        var hrefpp = selector.attr("attr-href-publish-prod");
        var hrefca = selector.attr("attr-href-clear-all");
        var hrefpa = selector.attr("attr-href-publish-all");
        var appname = selector.attr("attr-appname");

        var selecttorModal = $("#modalManager");

        selecttorModal.find(".modal-header").html("<strong class='text-center'>Options for "+appname+" assets</strong>");
        selecttorModal.find(".modal-header").append("<p class='alert alert-danger onealert' style='display: none'></p>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Choose the option you want to perform for "+appname+" assets.</h4>");
        selecttorModal.find(".modal-body").append("<br>");

       selecttorModal.find(".modal-body").append(
           '<div class="row center-block text-center manager-options">'
           + '<div class="col-md-4 text-center"><a class="btn-default btn publishappassets" attr-href="'+hrefpd+'"> Publish dev</a></div>'

        +'<div class="col-md-4 text-center"><a class="btn-default btn publishappassets" attr-href="'+hrefpp+'" >Publish prod</a></div>'

        +'<div class="col-md-4 text-center"><a class="btn-default btn publishappassets" attr-href="'+hrefpa+'">Publish all</a></div>'

        +'<div class="col-md-4 text-center"><a class="btn-default btn publishappassets" attr-href="'+hrefcd+'">Clear dev</a></div>'

        +'<div class="col-md-4 text-center"><a class="btn-default btn publishappassets" attr-href="'+hrefcp+'">Clear prod</a></div>'

        +'<div class="col-md-4 text-center"><a class="btn-default btn publishappassets" attr-href="'+hrefca+'">Clear all</a></div>'

        +"</div>");

        selecttorModal.find(".btn-close").html("Close");
        selecttorModal.find(".btn-close").show();
        selecttorModal.find(".btn-valid").hide();

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


    /**
     * Event to clear all compile
     */
    $(document).on('click', ".clearcompile", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");
        var env = selector.attr("attr-env");

        var selecttorModal = $("#modalManager");

        selecttorModal.find(".modal-header").html("<strong class='text-center'>Clear compiled for all environment</strong>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Would you like to empty compiled folder for all environment ?</h4>");
        selecttorModal.find(".btn-close").html("No");
        selecttorModal.find(".btn-valid").html("Yes");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "clearallcompile");
        selecttorModal.find(".btn-close").show();
        selecttorModal.find(".btn-valid").show();

        modal("show");
    });


    /**
     * Event to clear all compile
     */
    $(document).on('click', ".clearcompilespec", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");
        var env = selector.attr("attr-env");

        var selecttorModal = $("#modalManager");

        selecttorModal.find(".modal-header").html("<strong class='text-center'>Clear compiled for "+env+" environment</strong>");
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Would you like to empty compiled folder for <strong>"+env+"</strong> environment ?</h4>");
        selecttorModal.find(".btn-close").html("No");
        selecttorModal.find(".btn-valid").html("Yes");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "clearcompile");
        selecttorModal.find(".btn-close").show();
        selecttorModal.find(".btn-valid").show();

        modal("show");
    });


    /**
     * Event to manage assets (clear, publish)
     */
    $(document).on('click', ".publishappassets", function () {
        var selector = $(this);
        var href = selector.attr("attr-href");

        $.ajax({
            url : href,
            type : 'GET',
            dataType : 'json',
            success : function(data){
                getAllAssets();
                if (data['code'] === 200)
                    operationSuccess();
                else
                    operationError();
            }
        });

    });
});

