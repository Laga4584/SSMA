var favorite = 'n';

function getContents(novel_seq){
    
    $.ajax({
        url: "js/ajax_detail.php",
        method: "GET",
        dataType: "json",
        
        data: {
            "novel_seq": novel_seq,
            "req": "fetch",
            "favorite": favorite
        },

        success: function(res){
            console.log(novel_seq);
            console.log(res.favorite[0]);
            $(".info .cover").css({"background-image":"url('"+res.cover[0]+"')", "background-repeat":"no-repeat", "background-size":"cover"});
            $(".info .genre a").text(res.genre[0]);
            $(".info .sub_genre a").text(res.sub_genre[0]);
            $(".info .title").text(res.title[0]);
            $(".info .author a").text(res.author[0]);
            $(".info .publisher a").text(res.publisher[0]);
            $(".info .rating").text(res.rating[0]);
            $(".info .state").text(res.series[0] + " " + res.fin[0]);

            if(res.favorite[0]=='y'){
                $(".like .icon").css({"background-image":"url('images/search.png')"});
                favorite = 'y';
            }else{
                $(".like .icon").css({"background-image":"url('images/heart.png')"});
                favorite = 'n';
            }

            $(".story p").text(res.story[0]);

            var keyword_list = res.keywords[0].split(',');
            
        },

        error(err){
            console.log(err)
            return;
        }
    })
};

function set_favorite(){
    if(favorite=='n'){
                $(".like .icon").css({"background-image":"url('images/search.png')"});
                favorite = 'y';
            }else{
                $(".like .icon").css({"background-image":"url('images/heart.png')"});
                favorite = 'n';
            }
            $.ajax({
                url: "js/ajax_detail.php",
                method: "POST",
                                
                data: {
                    "novel_seq": novel_seq,
                    "req": "post",
                    "favorite": favorite
                },
        
                success: function(res){
                    console.log(res);
                },
        
                error(err){
                    console.log(err);
                    return;
                }
            })
};
    
$(document).ready(function(){
  
});
