var keyword_list = [];

function keyword_selected(keyword_li){
    
    if(keyword_list.includes(keyword_li.textContent)){
      keyword_list.splice(keyword_list.indexOf(keyword_li.textContent), 1);
      console.log(keyword_list);
      $(keyword_li).css({"color":"white"});
      
    }else{
        keyword_list.push(keyword_li.textContent);
        $(keyword_li).css({"color":"#5AFFE7"});
    }
    
    $(".selected_keywords ul").remove();
    $(".selected_keywords").append("<ul></ul>");
    for(var i = 0; i < keyword_list.length; i++){
        
        $(".selected_keywords ul").append("<li><button>"+keyword_list[i]+"</button></li>");
    }
    getContents(keyword_list);
}

function getContents(keyword_list){
    
    $.ajax({
        url: "js/ajax_keyword.php",
        method: "GET",
        dataType: "json",
        
        data: {
            "keyword_list": keyword_list
        },

        success: function(res){
            console.log(res.cover.length+"건");
            $(".result_info p").text(res.cover.length+"건");
            $(".novels ul").remove();
            $(".novels").append("<ul></ul>");
            
            for (var i = 0; i < res.cover.length; i++){
                $(".novels ul").append("<li><div class='cover'><a href=''></a></div><div class='desc'><p class='title'><a>"+res.title[i]+"</a></p><p class='author'><a>"+res.author[i]+"</a></p><p class='publisher'><a>"+res.publisher[i]+"</a></p><p class='rating'>"+res.rating[i]+"</p><p class='state'>"+res.series[i]+"화 "+res.fin[i]+"</p></div></li>");
                $(".novels li:eq("+i+") .cover a").css({"background-image":"url('"+res.cover[i]+"')", "background-repeat":"no-repeat", "background-size":"cover"});
            };
        },
        error(err){
            console.log(err)
            return;
        }
    })
};
    
$(document).ready(function(){
 


    
    var page = 1;

$(window).scroll(function() {
    //console.log($(document).height());
    //console.log($(window).height());
    //console.log($(window).scrollTop()+1);
    //console.log($(document).height() - $(window).height());
    if ($(window).scrollTop() +1 > $(document).height() - $(window).height()) {
      console.log(++page);
      for (var j = 0; j < num_rec; j++){
        $(".recommend ul").append("<li class='novel_"+(j+1)+"'><a href=''>작품"+(j+1)+"</a></li>");
        $(".recommend a:eq("+j+")").css({"background-image":"url('images/cover_a"+(j+1)+".png')", "background-repeat":"no-repeat", "background-size":"cover"});
    };
      
    }
});

});
