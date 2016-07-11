/**
 * Created by User3D on 06.04.2016.
 */
function imgCRUD()
{
    var _this = this;
    this.inp;
    this.id = 0;


    this.newLoad = function() {
        _this.inp = $('#loadImg').find('input[type="file"]');
        _this.inp.change(function () {
            for (var i = 0; i < this.files.length; i++) {
                var imgPlace = $('#newImg');

                imgPlace.children().remove();
                var reader = new FileReader();
                reader.readAsDataURL(this.files[i]);

                reader.onload = function (e) {

                    var img = createImg(e);
                    $(img).appendTo(imgPlace);
                };
            }
        });
    };

    var createImg = function(data){
        var img = '<div class="addImg">' +
            '<img src="' + data.target.result + '" height="120px"></div>';
        var size = function(data){
        };
        return img;
    };
    this.deleteOne = function(id){
        $('#prev_' + id).animate({'opacity': 0}, 300, function(){
            $(this).remove();
        }); console.log(t.files)

    };
    this.save = function(t){

        return true;
    }
}