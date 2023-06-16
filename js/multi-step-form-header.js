
    var i =1
    var background_array =[ "url(https://i.imgur.com/JJvDKXZ.png", "url(https://i.imgur.com/j1x9vlF.png","url(https://i.imgur.com/9QqHDFl.png)","url(https://i.imgur.com/6e9FvIO.png)"]
    var banner_headers =["Build My Filters", "My Results", "Chances of Acceptance", "Finalize My List"]
   var sub_sect_index = 1
 var sub_function = function(){
    var x, id, name; 
    if (sect_index ==1){
        x = 7;
        id= "sp";
        name = "profile";
     }else{
         x= 6;
         id= "sf";
         name = "filter";
     }
    if(sub_sect_index<= x){
        $("#sub-category-"+name).show("easing");
        console.log("cat got your tongue");
        $("#"+id+sub_sect_index).addClass("sub-done");
        
        sub_sect_index++
    }else{
        $("#sub-category-"+name).hide("easing");
        $(".number").removeClass("sub-done");
        sub_sect_index = 1; 
    }
}
var sect_index = 1;
var category_function = function(){
    $("#"+(sect_index)).removeClass("done");
    $("#"+(sect_index+1)).addClass('done');
    if(sect_index === 1){

        $("#sub-category-filter").show("easing");
    }
    $("#banner").css("background-image", background_array[sect_index-1]);
    $("#banner-text").text(banner_headers[sect_index-1]);
    sect_index++
    
    if(sect_index > 5){
        $("#"+(sect_index-1)).removeClass("done");
        sect_index=1;
        $("#"+(sect_index)).addClass('done');
        $("#banner").css("background-image", "url(/Users/aarya/Downloads/banners/create_my_profile_background.png)");
        $("#banner-text").text("Create My Profile");
    }
}
$(document).ready(function() {
       // $("#sub-category-filter").hide();
        $("#submit").click(category_function);
        $("#sub-category-button").click(sub_function);
});