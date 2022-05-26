var page = 1;
var offset = 60;

function get_blog() {
    var start = (page-1) * offset;
    $.ajax({
        url: "http://localhost/micro/service/blog.php",
        data: {
            start: start,
            offset: offset
        },
        type: "GET",
        dataType: "json"
    }).done(function(json) {
        build_list(json);
    }).fail(function(xhr, status, errorThrown) {
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    });
}

function post_blogpost(data) {
    $.ajax({
        url: "http://localhost/micro/service/post_blogpost.php",
        data: data,
        type: "POST"
    }).done(function() {
        window.document.location.replace("http://localhost/micro/");
    }).fail(function() {
        console.log("ERROR!")
    });
}

function build_list(json) {
    json.forEach(function (item) {
        build_item(item);
    });
    page++;
    //window.scrollTo({ left: 0, top: document.body.scrollHeight, behavior: "smooth" });

}

function validate(data) {
    let go = true;
    $("#errorArea").empty();
    if (data.header.trim() == "" ) {
        let para = document.createElement('p');
        $(para).html("Geen header ingevuld!");
        $("#errorArea").append(para);
        go = false;
    }
    if (data.text.trim() == "" ) {
        let para = document.createElement('p');
        $(para).html("Geen tekst ingevuld!");
        $("#errorArea").append(para);
        go = false;
    }
    if (go) {
        post_blogpost(data);
    }
}

function saveShit() {
    const data = {
        id: item_id,
        header: $("#blogHead").val(),
        text: textBlock
    }
    validate(data);
}

function edit_item(id) {
    window.location.href="editor.php?id=" + id;
}

function delete_item(id) {
    if (confirm("Delete item" + id + "?")) {
        $.ajax({
            url: "http://localhost/micro/service/delete_item.php",
            data: {
                id: id
            },
            type: "GET",
            dataType: "json"
        }).done(function(json) {
            window.document.location.replace("http://localhost/micro/");
        }).fail(function(xhr, status, errorThrown) {
            console.log( "Error: " + errorThrown );
        });
    }
}

function add_item() {
    document.location.href = 'editor.php';
}

function build_item(item) {
    var div = document.createElement("div");
    $(div).addClass('item');
    var head = document.createElement('div');
    $(head).addClass("head");
    $(head).html(item.head);
    $(div).append(head);
    dateDiv = document.createElement("div");
    $(dateDiv).addClass("date");
    $(dateDiv).html(item.blog_date);
    $(div).append(dateDiv);
    $(div).on("click", function () {
        document.location.href = "http://localhost/micro/item.php?id=" + item.id;
    });
    $("#microList").append(div);
}