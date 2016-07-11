/**
 * Created by User3D on 07.04.2016.
 */
function images (place)
{
    var _this = this;
    this.pl = $('#'+place);
    this.divClass = 'listImg';
    this.dataIMG = undefined;
    this.id_album = undefined;


    this.getImgFromAlbum = function (num) {
        if (_this.id_album != $(num).val()) {
            _this.id_album = $(num).val();
            console.log(_this.id_album);

            $.ajax({
                cache: false,
                type: "POST",
                url: "/img/getAll",
                data: {'id': _this.id_album},
                dataType: 'json',
                success: function (data) {
                    _this.createList(data);
                },
            })

        } else {
            alert(123);
        }
    };

    this.createList = function(data)
    {
        $(_this.pl).empty().css('display', 'block');
        $(data).each(function(){
           var tmpDiv = '<div class="' + _this.divClass  +'">' +
               '<a href="' + this['url'] +'" rel="albums">' +
               '<img src="' + this['url'] + '" height="80px">' +
               '</a>' +
               '</div>';
            $(tmpDiv).appendTo(_this.pl);
        });
    }
}




