$(document).ready(function() {


    function fetchLatestTweets() {
        $.ajax({
            type: "GET",
            url: "../src/includes/fetchtweet.inc.php", 
            success: function(response) {
               
                $('#tweet-container').html(response); 
            }
        });
    }

 
    // function to post the tweet 
    $("#modalTweet").on("submit",(function(e) {
        e.preventDefault()
        var formData = new FormData(this);

 
    $.ajax({
    type: "POST",
    url: "../src/includes/postTweet.inc.php",
    data:  formData,
    cache: false,
    processData: false,
    contentType:false,

     success: function() {
         fetchLatestTweets()
     },
   
    });
    



    }));

    let start=0;
    // function to do the some type on autocompletion for the user 
    $('#content').on('keydown',function(e){
        let val = $('#content').eq(0).val();
        var regex = /(?:^|\s)@(\w+)/;
        console.log(e.target.selectionStart);
        console.log(e.target.selectionEnd);
        if(e.key=="@"){
            start=e.target.selectionStart;
        }else if(e.code == "Space" ||      
        e.keyCode == 32    ){
            start=145;
        }
        $("#content").on('input',function(e){
            let val = e.target.value;
            let words=val.slice(start);


        if(regex.test(words) && start!=145){
            $('#suggestion').eq(0).removeClass("hidden")
            $.ajax({
                type: "GET",
                url: "../src/includes/autocompletion.inc.php",
                data: { 
                   val: words.replace(/^@/, '')
                       }, 
                success: function(response) {
                    if(response){
                        $('#suggestion').html(response);

                    }else{
                        $('#suggestion').eq(0).addClass("hidden")

                    }
                },
                error: function( error) {
                    console.error("Error while retweeting:", error);
                }
            }); 
        }else{
            $('#suggestion').eq(0).addClass("hidden")

        }
        })
        

        
    })

    
 
    });


    
   