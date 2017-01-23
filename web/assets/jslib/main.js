VH = {

    retJson : "",

    actionSend: function(url, data_obj){
        $.ajax({
            type: "POST",
            url: url,
            data: data_obj,
            async:false,
            success: function(return_data){
                //console.log(return_data);
                VH.retJson = $.parseJSON(return_data);

            }
        });

    },

    getPhoneGet: function(self){
        var url = self.attr('href');
        var data_obj = {};
        VH.actionSend(url, data_obj);
        if(VH.retJson.error==0){
          alert(VH.retJson.message);
        }else{
          //  alert(VH.retJson.message);
        }

    },

}

$(document).ready(function() {

    $('.getPhoneGet').on('click', function (event) {
        event.preventDefault();
        VH.getPhoneGet($(this));
    });

});