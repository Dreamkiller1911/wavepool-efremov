/**
 * Created by User3D on 06.04.2016.
 */
$('window').ready(function(){
    var img = new images('placeImgAlbums');
    $('#getImgAlbum').change(function(){
        img.getImgFromAlbum(this);
    });
});