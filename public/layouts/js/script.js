var $ = jQuery.noConflict();



// Progress Bar

$(document).ready(function ($) {
    "use strict";

    $('.skill-shortcode').appear(function () {
        $('.progress').each(function () {
            $('.progress-bar').css('width', function () {
                return ($(this).attr('data-percentage') + '%')
            });
        });
    }, {accY: -100});

    $('#search_name').on("keyup", function () {
        var $name = $('#search_name').val();
        var $note = $('#search_note').val();
//        alert($query);
        category_search($name,$note);
        
    });
    
    $('#search_note').on("keyup", function () {
        var $name = $('#search_name').val();
        var $note = $('#search_note').val();
//        alert($query);
        category_search($name,$note);
        
    });
    
    function category_search($name, $note){
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
        });
        jQuery.ajax({
            url: '/searchcategory',
            type: 'GET',
            data: {
                name: $name,
                note: $note
            },
            success: function (data) {
                var $categories = data.categories;
//                alert('aaaa'+JSON.stringify(data, null, 4));
//                var $data1 = JSON.stringify(data, null, 4);                
////                alert($data1);
//                $data1 = JSON.parse($data1);
//                alert($data1.categories['0'].name);

                console.log(data.categories);
                $('.foreach').html('');
                $('.page').html('');
                var $num = 0;
                for ($num; $num < $categories.length; $num++) {
                    var $img = encodeURI($categories[$num].image);
                    $('#table_search').find('tr:last').after("<tr class='foreach'>" +
                            "<td>"+($num+1)+"</td>" +
                            "<td><img src="+$img+"></td>" +
                            "<td>"+$categories[$num].name+"</td>" +
                            "<td>"+$categories[$num].note+"</td>" +
                            "<td><a href=http://money.local/updatecategory/"+$categories[$num].id+" title='Edit infor Category'>"+
                                    "<span class='glyphicon glyphicon-edit' aria-hidden='true' ></span>"+
                                    "</a>&nbsp;&nbsp;" +
                                    "<a href=http://money.local/deletecategory/"+$categories[$num].id+" title='Delete Category'>"+
                                    "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>"+
                            "</a></td></tr>");
                }
            },
            error: function (xhr, b, c) {
                console.log("xhr=" + xhr + " b=" + b + " c=" + c);
            }
        });
    }
});