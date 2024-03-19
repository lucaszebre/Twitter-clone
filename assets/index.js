
$(document).ready(function(){

  // if we manage the input for the login , manage the password and the email before post 
const email= $("#email").eq(0);

   $("#email").on('input',()=>{
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    parent = email.parent()
     error = parent.children('span');
     if(email.val()==""){
      email.toggleClass("border-2 border-rose-600");
      error.html("need to write a email");
    }else if (  !regex.test(email.val())){
      email.toggleClass("border-2 border-rose-600");
      error.html("need a valid email");
    }else{
      email.toggleClass("border-0");
      error.html("");
    }
   })

   const password= $("#password").eq(0);


   $("#password").on('input',()=>{
    parent = password.parent()
     error = parent.children('span');
     if(password.val()==""){
      password.toggleClass("border-2 border-rose-600");
      error.html("need to write a password");
    }else{
      password.toggleClass("border-0");
      error.html("");
    }
   })




   $('input').on('input',function(e){
    
   
     if($('#registration').find('.valid-input').length==2){
         $('#submit').removeClass('allowed-submit');
         $('#submit').removeAttr('disabled');
     }
    else{
         e.preventDefault();
         $('#submit').attr('disabled','disabled');
         
        }
   });
   

})



document.addEventListener("DOMContentLoaded", function(e) {

  // we the get the last tweet here 
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "../src/includes/fetchtweet.inc.php", true);
  xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
          document.getElementById("tweet-container").innerHTML = xhr.responseText;
      }
  };
  xhr.send();


  // we manage the modal here 
  const modal = document.getElementById('modal');
  const modalReply = document.getElementById('modalReply');
  const closeButton = document.getElementById('close');
  const submitButton = document.getElementById('submit');
  const addTweetButton = document.getElementById('addtweet');
  const addTweet2Button = document.getElementById('addtweet2');
  const inside = document.getElementById('insidemodal');
  const insideReply = document.getElementById('insideReply');

  addTweetButton.addEventListener('click', function() {
    modal.classList.remove('hidden');
  });
  addTweet2Button.addEventListener('click', function() {
    modal.classList.remove('hidden');
  });

  closeButton.addEventListener('click', function() {
    modal.classList.add('hidden');
  });

  submitButton.addEventListener('click', function() {
    modal.classList.add('hidden');
  });

  document.addEventListener('click', function(event) {
    if (!inside.contains(event.target) && !addTweetButton.contains(event.target) && !addTweet2Button.contains(event.target)) {
      modal.classList.add('hidden');
    }
  });

 
});