

    
    function fetchLatestTweets() {

        $.ajax({
            type: "GET",
            url: "../src/includes/fetchtweet.inc.php", 
            success: function(response) {
               
                $('#tweet-container').html(response); 

            }
        });
    }

    // function to retweet the post
    function retweetPost(id_post) {
        $.ajax({
            type: "GET",
            url: "../src/includes/retweet.inc.php",
            data: { id_post: id_post }, 
            success: function() {
                fetchLatestTweets();
            },
            error: function(xhr, status, error) {
                console.error("Error while retweeting:", error);
            }
        });
    }
    // function to like the post
    function likePost(id_post) {
        $.ajax({
            type: "GET",
            url: "../src/includes/like.inc.php",
            data: { id_post: id_post }, 
            success: function() {
                fetchLatestTweets();
            },
            error: function(xhr, status, error) {
                console.error("Error while retweeting:", error);
            }
        });
    } 
    // function to reply to a post 
    function replyModal(id_post) {
        const modal= $("#modalReply").eq(0);

        $.ajax({
            type: "GET",
            url: "../src/includes/tweetId.inc.php",
            data: { id_post: id_post }, 
            success: function(response) {
                modal.toggleClass("hidden");
                $("#tweetReply").html(response);
            },
            error: function( error) {
                console.error("Error while retweeting:", error);
            }
        });
    }  
    
    function replyTweet(id_post) {
       
    }

    function closeReply(){
        const modal= $("#modalReply").eq(0);
        modal.toggleClass("hidden");
    }

   
    $(document).ready(function() {
        // function to post the reply to the tweet
        $("#modalTweetReply").on("submit",(function(e) {
            e.preventDefault()
            const content= $("#content_reply").eq(0).val();
            const id_post= $("#id_post_reply").eq(0).val();

            console.log(content);
            console.log(id_post);

        $.ajax({
            type: "GET",
            url: "../src/includes/reply.inc.php",
            data: { id_post: id_post,
            content: content }, 
            success: function() {
                fetchLatestTweets();
                $("#modalTweetReply").eq(0).toggleClass("hidden")
            },
            error: function( error) {
                console.error("Error while retweeting:", error);
            }
        });

        }));
        // when click out the input we display off the modal
        $("#search_2").on("focusout", function(e) {
            const modal = $("#modalSearch").eq(0);
            if (!modal.is(':hover')) { 
                modal.addClass("hidden");
            }
        });
        
        $("#modalSearch").on("click", function(e) {
            e.stopPropagation(); 
        });

        // if we still on modal we don't let the modal display off
         $(document).on("click", function(e) {
              const modal = $("#modalSearchHeader");
              if (!$(e.target).closest('#search_2').length && !modal.is(':hover')) {
                  modal.addClass("hidden");
              }
         });
        
         // on input we get the result for the search 
        $("#search_2").on("input",(function(e) {
            e.preventDefault()
            const modal= $("#modalSearchHeader");
            console.log(modal)

            modal.removeClass("hidden")
            
            let val = $('#search_2').eq(0).val();
            var regex = /^#\w+/;

            console.log(val)
            var isHash = regex.test(val);

         $.ajax({
             type: "GET",
             url: "../src/includes/search.inc.php",
             data: { 
                val: val.replace(/^#/, ''),
                hash:isHash 
                }, 
             success: function(response) {
                console.log(response)
                $('#containerSearch').html(response);
             },
             error: function( error) {
                 console.error("Error while retweeting:", error);
             }
         });

        }));
        
  



    })
    

    function replace(pattern,value){
        let content = $('#content').eq(0).val();
        console.log(pattern,value);
        console.log(content);
        content = content.replace("@"+pattern,"@"+value)

        $('#content').eq(0).val(content)
        
    }  


    // document.addEventListener("DOMContentLoaded", function() {
      
      
    //     const modalReply = document.getElementById('modalReply');
    //     const insideReply = document.getElementById('insideReply');
      
       
       
      
        
      
    //     document.addEventListener('click', function(event) {
    //       if (!insideReply.contains(event.target) && modalReply.contains(event.target)) {
    //         modal.classList.add('hidden');
    //       }
    //     });
    //   });