$(document).ready(function() {
    // function to get the conv at the mount 
     function conv(){
            
         $.ajax({
            type: "GET",
            url: "../src/includes/listConv.inc.php",
            success: function(response) {
               $('#conversation').html(response);
            },
            error: function( error) {
                console.error("Error while retweeting:", error);
            }
        });
        }

        conv()

       // we check the input to display th modal , display the result
        $("#searchMessage").on("input",(function(e) {
            e.preventDefault()
            const modal= $("#modalMessage").eq(0);

            modal.removeClass("hidden")
            
            let val = $('#searchMessage').eq(0).val();



         $.ajax({
             type: "GET",
             url: "../src/includes/searchAccount.inc.php",
             data: { 
                val: val
                }, 
             success: function(response) {
                $('#usersearch').html(response);
             },
             error: function( error) {
                 console.error("Error while retweeting:", error);
             }
         });

        }));
        
  

        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const id = urlParams.get('q')


        refetchMessage(id);

        // we find the p in the url and if so fetch the message fron the q


    })


    function refetchMessage(id_conv){
        $.ajax({
            type: "GET",
            url: "../src/includes/getMessage.inc.php",
            data:{id:id_conv},
            success: function(response) {
               $('#containerConv').html(response);
            },
            error: function( error) {
                console.error("Error while retweeting:", error);
            }
        });
    }


    // function to send a message 
    function sendMessage(id_conv){ 
        const content = $('#send').eq(0).val() 


        if(content){
            $.ajax({
                type: "GET",
                url: "../src/includes/sendmessage.inc.classes.php",
                data:{
                    idconv:id_conv,
                    content:content
                },
                success: function(response) {
                   refetchMessage(id_conv)
                   $('#send').eq(0).val("") 
                },
                error: function( error) {
                    console.error("Error while retweeting:", error);
                }
            });
        }else{
            console.log('empty input')
        }
       

        }
    