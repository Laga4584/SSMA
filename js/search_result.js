function getContents(search_word){
    
    $.ajax({
        url: "js/ajax_search.php",
        method: "GET",
        dataType: "json",
        
        data: {
            "search_word": search_word
        },

        success: function(res){
            console.log(res.cover.length+"건");
            $(".result_info p").text(res.cover.length+"건");
            $(".novels ul").remove();
            $(".novels").append("<ul></ul>");
            
            for (var i = 0; i < res.cover.length; i++){
                $(".novels ul").append("<li class='novel_"+(i+1)+"'><a href=''>작품"+(i+1)+"</a></li>");
                $(".novels a:eq("+i+")").css({"background-image":"url('"+res.cover[i]+"')", "background-repeat":"no-repeat", "background-size":"cover"});
            };
        },
        error(err){
            console.log(err)
            return;
        }
    })
};

function search(search_input){
    var value = $(search_input).val();
    getContents(value);
}