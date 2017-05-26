/**
 * iumio Framework Manager main JS
 **/

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
                    selector.append("<li>"+value['time']+" : "+value['content']+"</li>")
                })

            }
        }
    })
};

/**
 * get the default app
 */
var getDefaultApp = function () {

    var selector = $('.defaultapp');
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
    $.ajax({
        url : selector.attr("attr-href"),
        type : 'GET',
        dataType : 'json',
        success : function(data){
            if (data['code'] === 200)
            {
                console.log(data);
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
 * Create on app
 */

var createOneApp = function (href) {
    var name      = $("input[type=text][name=appname]").val();
    var template  = $("input[type=checkbox][name=template]:checked" ).val();
    var isdefault = $( "input[type=checkbox][name=isdefault]:checked" ).val();
    var selecttorModal = $("#modalManager");

    if (name === "")
    {
        selecttorModal.find(".onealert").html("Oups! Enter an app name");
        selecttorModal.find(".onealert").show();
        return (false);
    }

    if (name === "App" || name.length <= 3)
    {
        selecttorModal.find(".onealert").html("Oups! Error on app name. <br>Your app name must to end with 'App' keyword (example TestApp) ");
        selecttorModal.find(".onealert").show();
        return (false);
    }
    var p2 = name[name.length - 1];
    var p1 = name[name.length - 2];
    var a = name[name.length - 3];
    var conca = a + p1 + p2;

    if (conca !== "App") {
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
            console.log(data);
            if (data['code'] === 200)
            {
               console.log(data);
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



$(document).ready(function () {

    getLogs();
    getDefaultApp();
    getAppListSimple();

    setInterval(function () {
        getLogs();
        getDefaultApp();
        getAppListSimple();
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
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Are you sure to set "+appname+" default app ?</h4>");
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
        selecttorModal.find(".modal-body").html("<h4 class='text-center'>Are you sure to delete "+appname+" ?</h4>");
        selecttorModal.find(".btn-close").html("No");
        selecttorModal.find(".btn-valid").html("Yes");

        selecttorModal.find(".btn-valid").attr("attr-href", href);
        selecttorModal.find(".btn-valid").attr("attr-event", "removeapp");
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
    })

});

