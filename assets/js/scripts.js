$(function () {
    $(".sortable th").click(function () {
        var table = $(this).parents("table.sortable").eq(0);
        var rows = table.find("tbody > tr").toArray();
        var index = $(this).index();
        var asc = !$(this).hasClass("asc");

        rows.sort(function (a, b) {
            var A = $(a).children("td").eq(index).text().toUpperCase();
            var B = $(b).children("td").eq(index).text().toUpperCase();
            return (A < B ? -1 : A > B ? 1 : 0) * (asc ? 1 : -1);
        });

        $(this).toggleClass("asc", asc).toggleClass("desc", !asc);
        $(this).siblings().removeClass("asc desc");

        table.children("tbody").append(rows);
    });
});
