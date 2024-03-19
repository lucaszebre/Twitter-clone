$(document).ready(function(){
    let popup = $('#popup-modal').eq(0);

    // when click the delete account we display off the pop up 
    $("#deleteAccount").on("click",()=>{
        if(popup.find("hidden")){
            popup.removeClass("hidden");
        }else{
            popup.addClass("hidden");

        }

            
        })

        // display off the pop up
        $("#close").on('click',()=>{
            popup.addClass("hidden");

        })

        // display the pop up 
        $("#cancel").on('click',()=>{
            popup.addClass("hidden");

        })


    });