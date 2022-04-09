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

function build_list(json) {
    json.forEach(function (item) {
        build_item(item);
    });
    page++;
    //window.scrollTo({ left: 0, top: document.body.scrollHeight, behavior: "smooth" });

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
    })
    $("#microList").append(div);

}