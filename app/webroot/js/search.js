$(document).ready(function(){
    $("#buscador").autocomplete({
        minLength: 2,
        select: function(event, ui) {
            $("#buscador").val(ui.item.label);
        },
        source: function(request, response) {
            $.ajax({
                url: basePath + "productos/searchjson",
                data: {
                    term: request.term
                },
                dataType: "json",
                success: function(data){
                    response($.map(data, function(el, index){
                        return {
                            value: el.Producto.name,
                            name: el.Producto.name,
                            foto: el.Producto.foto,
                            foto_dir: el.Producto.foto_dir
                        };
                    }));
                }
            });
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item){
        return $("<li></li>")
        .data("item.autocomplete", item)
        .append("<a><img width='40' src='" + basePath + "files/producto/foto/" + item.foto_dir + "/" + item.foto + "' />" + item.nombre +  "</a>")
        .appendTo(ul)
    };
});