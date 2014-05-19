$(document).ready(function(){

	//Задаем правому блоку ширину по контенту главного блока
    var content_height = $('.content').height() - 20;
    $('.navigation').height(content_height);

    // Аккордеон меню
    $('.navigation').on('click', 'ul>li>a[href="#"]', function(e){
        e.preventDefault();
        if ($(this).next('.submenu').hasClass('active_submenu') ){
            $(this).removeClass('active');
            $(this).next('.submenu').removeClass('active_submenu').slideUp(200);
        } else{
            $('.active').removeClass('active');
            $('.active_submenu').removeClass('active_submenu').slideUp(200);
            $(this).addClass('active').next('.submenu').addClass('active_submenu').slideDown(200);
        }
    });


}); //Конец ready