function getContents(menu, genre){
    console.log(".menu_"+genre+" a");
    $(".menu_"+genre+" a").css({"color":"#5AFFE7"});
    $("#menu_list button").css({"color":"white"});
    $(menu).css({"color":"#5AFFE7"});
    $.ajax({
        url: "js/ajax_genre.php",
        method: "GET",
        dataType: "json",
        
        data: {
            "genre": genre,
            "sub_genre": menu.value
        },

        success: function(res){
            var num_rec = 18;
            for (var i = 0; i < num_rec; i++){
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
    /*
    if(genre=="fantasy"){
        console.log(menu.value);
        $("#menu_list button").css({"color":"white"});
        $(menu).css({"color":"#5AFFE7"});
        if(menu.value=="전체"){
            
            var num_rec = 20;
            for (var i = 0; i < num_rec; i++){
            
                $(".recommend ul").append("<li class='novel_"+(i+1)+"'><a href=''>작품"+(i+1)+"</a></li>");
                $(".recommend a:eq("+i+")").css({"background-image":"url('images/cover_a"+(i+1)+".png')", "background-repeat":"no-repeat", "background-size":"cover"});
            };
    }else if(menu.value=="정통"){

        var num_rec = 20;
            for (var i = 0; i < num_rec; i++){
            
                $(".recommend ul").append("<li class='novel_"+(i+1)+"'><a href=''>작품"+(i+1)+"</a></li>");
                $(".recommend a:eq("+i+")").css({"background-image":"url('images/cover_e"+(i+1)+".png')", "background-repeat":"no-repeat", "background-size":"cover"});
            };
    }else if(menu.value=="퓨전"){
        var num_rec = 20;
            for (var i = 0; i < num_rec; i++){
            
                $(".recommend ul").append("<li class='novel_"+(i+1)+"'><a href=''>작품"+(i+1)+"</a></li>");
                $(".recommend a:eq("+i+")").css({"background-image":"url('images/cover_f"+(i+1)+".png')", "background-repeat":"no-repeat", "background-size":"cover"});
            };
    }else if(menu.value=="게임"){
        var num_rec = 20;
            for (var i = 0; i < num_rec; i++){
            
                $(".recommend ul").append("<li class='novel_"+(i+1)+"'><a href=''>작품"+(i+1)+"</a></li>");
                $(".recommend a:eq("+i+")").css({"background-image":"url('images/cover_g"+(i+1)+".png')", "background-repeat":"no-repeat", "background-size":"cover"});
            };
    }
    

    }
    */
        
}

function load_items(){
    var num_rec = 20;
    for (var i = 0; i < num_rec; i++){
       
        $(".recommend ul").append("<li class='novel_"+(i+1)+"'><a href=''>작품"+(i+1)+"</a></li>");
        $(".recommend a:eq("+i+")").css({"background-image":"url('images/cover_a"+(i+1)+".png')", "background-repeat":"no-repeat", "background-size":"cover"});
    };

}

$(document).ready(function(){
    getContents(document.getElementById("menu_list").firstElementChild.firstElementChild, document.getElementById("category_list").className);

    //load_items();


    
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
