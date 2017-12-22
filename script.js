function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

$(document).ready(function () {
    var date = new Date(0);
    var compare_ids= [];
    function getGoods() {
        var cat = $(".select").attr('id');
        $.ajax({
            url: 'index.php',
            data: '[{"get_goods":"1"},{"category":"' + cat + '"}]',
            type: 'post',
            dataType: 'json',
            success: function (html) {
                console.log(html);
                $("#list").html('');
                for (value in html) {
                    $("#list").append(
                        '<article id="' + html[value]['id'] + '">' +
                        '<img src="img/'+html[value]['img']+'" alt="" title="">' + '<p>' + html[value]['title'] + '</p>' +
                        '<h2>Цена: ' + html[value]['price'] + '</h2>' +
                        '<button class="add_cart">Добавить в сравнение</button>' +


                        '</article>'
                    );
                }


                $("#list").hide().fadeIn(2000);
                $("#fon").css({'display': 'none'});
                $("#load").fadeOut(1000);
            }
        });
    }
    getGoods();

    $("nav li a").click(function() {
        $(".select").removeClass("select");
        $(this).addClass("select");
        getGoods();
    });

    $("#compare").click(function(){
        $.ajax({
            url: 'index.php',
            data: '[{"compare":"1"},{"ids":"' + compare_ids +'"}]',
            type: 'post',
            dataType: 'json',
            success: function (html) {
                console.log(html);

                $("#list").html('');
                for (value in html) {
                    $("#list").append(
                        '<article id="' + html[value]['id'] + '">' +
                        '<img src="img/'+html[value]['img']+'" alt="" title="">' +
                        '<p>' + html[value]['title'] + '</p>' +
                        '<h2>Цена: ' + html[value]['price'] + '</h2>' +
                        '<p>Сходство: ' + (html[value]['equ'] ? html[value]['equ'] : '-') + '</p>' +


                        '</article>'
                    );
                }


                $("#list").hide().fadeIn(2000);
                $("#fon").css({'display': 'none'});
                $("#load").fadeOut(1000);
            }
        });
    });

    $("select").on('change', function() {
        var cat = $(".select").attr('id');
        var id = this.value;

        $.ajax({
            url: 'index.php',
            data: '[{"sort":"1"},{"type":"' + id + '"},{"category":"' + cat + '"}]',
            type: 'post',
            dataType: 'json',
            success: function (html) {
                console.log(html);

                $("#list").html('');
                for (value in html) {
                    $("#list").append(
                        '<article id="' + html[value]['id'] + '">' +
                        '<img src="img/'+html[value]['img']+'" alt="" title="">' +
                        '<p>' + html[value]['title'] + '</p>' +
                        '<h2>Цена: ' + html[value]['price'] + '</h2>' +
                        '<button class="add_cart">Добавить в сравнение</input>' +


                        '</article>'
                    );
                }


                $("#list").hide().fadeIn(2000);
                $("#fon").css({'display': 'none'});
                $("#load").fadeOut(1000);
            },
            error: function (html) {
                console.log(html);

            }
        });

    });

    $(document).on('click','article button', function(){
        var id = $(this).parent().attr('id');
        compare_ids.push(id);
        console.log(compare_ids);
    });
    $("#searchsubmit").click(function(){
        var id = $('#search').val();

        $.ajax({
            url: 'index.php',
            data: '[{"search":"1"},{"query":"' + id + '"}]',
            type: 'post',
            dataType: 'json',
            success: function (html) {
                console.log(html);
                $("#list").html('');
                for (value in html) {
                    $("#list").append(
                        '<article id="' + html[value]['id'] + '">' +
                        '<img src="img/'+html[value]['img']+'" alt="" title="">' +
                        '<p>' + html[value]['title'] + '</p>' +
                        '<h2>Цена: ' + html[value]['price'] + '</h2>' +
                        '<button class="add_cart">Добавить в сравнение</button>' +


                        '</article>'
                    );
                }


                $("#list").hide().fadeIn(2000);
                $("#fon").css({'display': 'none'});
                $("#load").fadeOut(1000);
            }
        });
    });
});
