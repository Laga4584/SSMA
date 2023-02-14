function getContents(){
    $.ajax({
        url: "js/ajax_favorites.php",
        method: "GET",
        dataType: "json",
        
        data: {
            
        },

        success: function(res){
           
            for (var i = 0; i < res.cover.length; i++){
                console.log(res.cover[i]);
                $(".recommend ul").append("<li class='novel_"+(i+1)+"'><a href=''>작품"+(i+1)+"</a></li>");
                $(".recommend a:eq("+i+")").css({"background-image":"url('"+res.cover[i]+"')", "background-repeat":"no-repeat", "background-size":"cover"});
            };
        },
        error(err){
            console.log(err)
            return;
        }
    })
}
$(document).ready(function(){
    getContents();

});
