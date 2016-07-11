/**
 * Created by User3D on 19.04.2016.
 */
function Services()
{
    var _this = this;
    this.block = undefined;
    this.blockStatus = false;

    this.viewFile = function(){
        alert(123);
    };
    this.getData = function(thisFile){
        var file = thisFile.replace(new RegExp('#'), '');
        console.log(file)
        $.ajax({
            cache: false,
            type: "POST",
            url: "/services/GetDataFile",
            data: {'file': file},
            dataType: 'json',
            success: function(data){
                if(_this.blockStatus) {
                    $(_this.block).remove();
                    _this.blockStatus = false;
                }
                var modal = $('#modalServices').modal({show:true, keyboard:true});
                    var cont = generateView(data);
                modal.find('.modal-content').html(cont);


            }
        })
    };
    var generateView = function(data){
        var content = '' +
            '<div class="serviceView">' +
            '<div class="row"><div class="col-xs-12 text-center"><h3>' + data.title + '</h3></div>' +
            '<div class="row"><div class="col-xs-12 text-center"><h3>' + data.text + '</h3></div>' +
            '<div class="row"><div class="col-xs-12 text-center"><h3>' + data.priceText + '</h3></div><hr width="80%">' +
            '<div class="row"><div class="col-xs-12"><table width="80%" align="center">' + generateTable(data.schedule) + '</table></div>' +
            '<div class="row"><div class="col-xs-12 text-center"><h3>' + ((data.trainer != undefined) ? data.trainer : "") + '</h3></div>' +
            '</div>'+
            '</div>';
        _this.blockStatus = true;
        return content;
    };
    var generateTable = function(list){
        var tbl =
            '<tr>';
            for(var  val in list.head){
                tbl += '<th>' + list.head[val] + '</th>';
            }
            tbl += '</tr>';
        for(var key in list){
            if(key != 'head') {
                tbl += '<tr align="center">';
                tbl += '<td>' + getDayStr(key) + '</td>';
                for(var val in list[key]){
                    tbl += '<td>' + list[key][val] + '</td>';
                }
                    tbl += '</tr>';
            }
        }

        return tbl;
    };
    var getDayStr = function(day) {
        var dayStr = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];
        if(day != 'head') {
            return dayStr[day];
        }
    }
}