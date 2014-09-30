$(document).ready(function(){

    // МЕНЮ (CATALOG)----------------------------------------------------------
        var navigation = $('.navigation');

        // работа с куками
        if($.cookie("activeSection")){
            var selector = "#" + $.cookie("activeSection");
            $(selector).find('.nav_title').addClass('active').next('.submenu').addClass('active_submenu').show();
        }

        // Переход по ссылке, если нет дочерних
        navigation.on('click', 'a', function(e){
            e.preventDefault();
            if( $(this).parent().find('ul').length == 0 ){
                location.href=$(this).attr('href');
            }
        });

        // Аккордеон меню
        navigation.on('click', '.nav_title', function(e){
            e.preventDefault();
            if ($(this).next('.submenu').hasClass('active_submenu') ){
                $(this).removeClass('active');
                $(this).next('.submenu').removeClass('active_submenu').slideUp(500);
            } else{
                $('.active').removeClass('active');
                $('.active_submenu').removeClass('active_submenu').slideUp(500);
                $(this).addClass('active').next('.submenu').addClass('active_submenu').slideDown(500);
            }

        });

        $("li[id^='section_id-'] li").click(function(e){
            e.stopPropagation();
        });

        // задаем куку открытого раздела
        $("li[id^='section_id-']").click(function(){
            if($.cookie("activeSection") != $(this).attr('id')){
                var activeSection = $(this).attr('id');
                $.cookie("activeSection", activeSection, { path: '/' });
            }else {
                $.cookie("activeSection", null);
            }

        });


        //Подраздел 3 уровня - всплывающие пункты
        $('.submenu li').hoverIntent(function(){
            $(this).find('ul').fadeIn(100);
        },function(){
            $(this).find('ul').fadeOut(100);
            }
        );

    // КОНЕЦ МЕНЮ --------------------------------------------------------------------------------------


    // ПЕРЕКЛЮЧАТЕЛЬ ВИДОВ -----------------------------------------------------------------------------

        if($.cookie("display") == null ){
            $.cookie("display", "grid", { path: '/' });
        }

        $(".grid_list").click(function(){
            var display = $(this).attr('id');
            display = (display == "grid") ? "grid" : "list";

            if(display ==  $.cookie("display")){
                return false;
            } else{
                $.cookie("display", display, { path: '/' });
                location.href = "?" + query;
            }

        });

    // КОНЕЦ ПЕРЕКЛЮЧАТЕЛЬ ВИДОВ -----------------------------------------------------------------------


    // СОРТИРОВКА -------------------------------------------------------------------------------------

        $("#order_param").click(function(e){
            e.preventDefault();
            $(".sort-wrap").slideToggle(100);
        });

    // КОНЕЦ СОРТИРОВКИ -------------------------------------------------------------------------------


    // АВТОРИЗАЦИЯ -------------------------------------------------------------------------------------

        $("#auth").click(function(e){
            e.preventDefault();
            var email = $("#email").val();
            var pass = $("#password").val();
            var auth = $("#auth").val();
            ///alert(email + ' ' + pass + ' ' + auth);

            $.ajax({
                url: './',
                type: 'POST',
                data: {auth: auth, email: email, password: pass},
                success: function(result){
                    if((result != 'Поля Email/Пароль должны быть заполнены!') && (result != 'Email и/или Пароль введены не верно!')){
                        // если пользователь успешно авторизован
                        $(".auth").hide().fadeIn(500).html(result + '<a href="?do=logout" class="logout">Выход</a>');
                        // удаляем лишние поля заказа
                        $(".notauth").fadeOut(500);
                        setTimeout(function(){
                            $(".notauth").remove();
                        }, 500);
                    }else{
                        // если авторизация неудачна
                        $(".error").remove();
                        $(".auth").append("<p class='error'></p>");
                        $(".error").hide().fadeIn(500).html(result);
                    }
                },
                error: function(){
                    alert("Error!");
                }
            });

        });

    // КОНЕЦ АВТОРИЗАЦИИ -------------------------------------------------------------------------------------


    // ПЕРЕСЧЕТ КОРЗИНЫ -------------------------------------------------------------------------------------

        $(".kolvo").keypress(function(e){  // клавиша ENTER
            if(e.which == 13)
                return false;
        });


        $(".kolvo").each(function(){
            var count_start = parseInt($(this).val()); // количество до изменения
            var amount = parseInt($(this).data('amount')); // количество товара на складе
            $(this).blur(function(){
                var count = parseInt($(this).val()); //количество перед пересчетом

                if(count_start != count){ // если количество изменилось
                    var result = confirm('Пересчитать итоговую сумму?');
                    if(result){
                        var id = $(this).attr('id');
                        id = id.substr(3);

                        if(!parseInt(count)){
                            count = count_start;
                        }
                        //alert(amount + ' + ' + count_start + ' = ' + (amount + count_start) + ' => ' + (amount + count_start) + ' - ' + count + ' = ' + (amount + count_start - count));
                        if((amount + count_start) - count < 0){
                            count = count_start;
                        }

                        // передаем параметры
                        location.href = '?view=cart&count=' + count + '&id=' + id;

                    }else{
                        $(this).val(count_start);
                    }
                }
            });
        });

    // КОНЕЦ ПЕРЕСЧЕТА КОРЗИНЫ -------------------------------------------------------------------------------------

    // ПОДТВЕРЖДЕНИЕ УДАЛЕНИЯ ТОВАРА ИЗ КОРЗИНЫ---------------------------------------------------------------------

        $(".z_del a").click(function(e){
            e.preventDefault();
            var name = $(this).parent().parent().find('.z_name img').attr('title');
            var link = $(this).attr('href');
            var window = $("#confirm_window");
            $("#window_bg").fadeIn(100);
            window.find('#delete_goods_name').append(name);
            window.find('.confirm a').attr('href', link);
            window.show(350);
        });

        $(".close_window, .cancel").click(function(e){
            e.preventDefault();
            $("#confirm_window").hide(300);
            $("#window_bg").fadeOut(300);
            $("#confirm_window").find('#delete_goods_name').empty();
        });

        $(".confirm").click(function(){
            location.href = $(this).find('a').attr('href');
        });


    // КОНЕЦ ПОДТВЕРЖДЕНИЯ УДАЛЕНИЯ ТОВАРА ИЗ КОРЗИНЫ---------------------------------------------------------------


    // РОТАТОР КОНТЕНТА ---------------------------------------------------------------------

    // КОНЕЦ РОТАТОРА КОНТЕНТА


    //КНОПКА НАВЕРХ

        $(window).scroll(function () {
            if ($(this).scrollTop() > 800) {
                $('#scroller').fadeIn();
            } else {
                $('#scroller').fadeOut();
            }
        });

        $('#scroller').click(function () {
            $('body,html').animate({scrollTop: 0}, 400);
            return false;
        });

    // КОНЕЦ КНОПКИ НАВЕРХ


    // КАРТА GOOGLE

        var map_width = $("iframe").width();
            $("iframe").height(map_width);

    // \КАРТА GOOGLE

}); //Конец ready