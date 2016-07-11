/**
 * Created by User3D on 12.04.2016.
 */
function body(pl){
    var _this = this;
    this.body = $(pl);

    this.resizeBackground = function(){
            $(document).scroll(function(event){
                var size = $(this).scrollTop()*0.015;
                _this.body.css({'background-size': size+30+'%'})
            });
    }
}