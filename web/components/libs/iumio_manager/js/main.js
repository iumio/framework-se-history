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
                        "<td><button class='todefaultapp' attr-href='"+value['link']+"' attr-appname='"+value['name']+"'>SW</button></td>"+
                        "<td><button class='deleteapp' attr-href='"+value['link_remove']+"' attr-appname='"+value['name']+"'>DE</button></td>"+
                        "</tr>");
                });
                simpleapps = results;

            }
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
        }
    })

});

