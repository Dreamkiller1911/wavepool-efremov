/**
 * Created by User3D on 05.05.2016.
 */
(function($){
    $.fn.miniMenu = function(){
        var btn = $(this).find('li.sub').each(function(){
            $(this).click(function(e){
                e = e || window.event;
                e.preventDefault();
                var block = $(this).find('+ ul');
                var span = $(block).prev().find('span');
                if(block.hasClass('dis')){
                    var sumHeight = 0;
                    $(this).find('+ ul li').each(function(){
                        sumHeight += $(this).innerHeight();
                        $(block).stop().animate({"height": sumHeight}, 300, function(){
                            $(this).removeClass('dis').addClass('act');
                            span.removeClass('sdis').addClass('sact');
                        })
                    });

                }else{
                    $(block).stop().animate({"height": 0}, 300, function(){
                        $(this).removeClass('act').addClass('dis');
                        span.removeClass('sact').addClass('sdis');
                    })
                }
            })
        });
    }
})(jQuery);