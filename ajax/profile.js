
// function to get the list of following of a user
function listFollowing(user) {
    const modal= $("#modalfollow").eq(0);

    modal.removeClass("hidden");

    $.ajax({
        type: "GET",
        url: "../src/includes/listFollowing.inc.php",
        data: { user: user }, 
        success: function(response) {
            $("#listfollow").html(response);
        },
        error: function( error) {
            console.error("Error while retweeting:", error);
        }
    });
}
// function to get the list of follower of a user

function listFollower(user) {
    const modal= $("#modalfollow").eq(0);

    modal.removeClass("hidden");

    $.ajax({
        type: "GET",
        url: "../src/includes/listFollower.inc.php",
        data: { user: user }, 
        success: function(response) {
            $("#listfollow").html(response);
        },
        error: function( error) {
            console.error("Error while retweeting:", error);
        }
    });
} 

$(document).ready(function() {
      
    $("#editButton").on('click',function(){
        const modal= $("#modalEdit").eq(0);
        modal.removeClass("hidden");
    })

    
    $("#closeFollow").on("click",(function() {
        const modal= $("#modalfollow").eq(0);
        modal.addClass("hidden");
    }))
    
    $("#closeEdit").on("click",(function() {
        const modal= $("#modalEdit").eq(0);
        modal.addClass("hidden");
    }))


   







})