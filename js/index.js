function search(search_input){
    var value = $(search_input).val();
    location.href="search_result.php?word="+value;
}

function getContents(page){
    $.ajax({
        url: "js/ajax_main.php",
        method: "GET",
        dataType: "json",
        
        data: {
            "page_num": page
        },

        success: function(res){
            var num_rec = 18;
            for (var i = 0; i < num_rec; i++){
                console.log(res.cover[i]);
                $(".recommend ul").append("<li class='novel_"+(i+1+page*num_rec)+"'><a href=''>작품"+(i+1+page*num_rec)+"</a></li>");
                $(".recommend a:eq("+(i+page*num_rec)+")").css({"background-image":"url('"+res.cover[i]+"')", "background-repeat":"no-repeat", "background-size":"cover"});
            };
        },
        error(err){
            console.log(err)
            return;
        }
    })
}

$(document).ready(function(){
    getContents(0);
    var page=1;

    $(window).scroll(function() {
        if ($(window).scrollTop() +1 > $(document).height() - $(window).height()) {
            getContents(page);
            page++;
        }
    });
  
});

