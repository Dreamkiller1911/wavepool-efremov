/**
 * Created by User3D on 19.04.2016.
 */
$(document).ready(function(){
    var services = new Services();
    var e = undefined;
    if(window.event != undefined){
        e = window.event;
    }

    var place = $('#services');
    var btn = place.find('li a');


    btn.each(function(){
        if($(this).attr('href') === window.location.hash){
            services.getData(window.location.hash);
        }
       $(this).click(function(e){
           services.getData($(this).attr('href'));
       })
   });
    $('body').click(function(e){
        $('#serviceView').click(function(){return false});
       if($('div').is('#serviceView')){

           if($(e.target)[0] != $('#serviceView')[0]){
               $('#serviceView').remove();
           }
       };
    });

});