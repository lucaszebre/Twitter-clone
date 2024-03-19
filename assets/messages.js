document.addEventListener("DOMContentLoaded", function() {

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

   // here we check the input , to parse the value of the input and display the user choose
  document.getElementById('userMessage').addEventListener('change', (e) => {
    var arr = e.target.value.split(',');
    var filtered = arr.filter(elm => elm);
    console.log(filtered)
    parseUser(filtered);
});

//submit the form with the list od user to create the groupe 
document.getElementById('formMessage').addEventListener('submit',(e)=>{
  e.preventDefault();
  var val=  document.getElementById('userMessage').value.split(',').filter(elm=>elm);
  $.ajax({
    type: "GET",
    url: "../src/includes/createConv.inc.php",
    data: { 
       val: val
       }, 
    success: function(response) {
      conv()

    },
    error: function( error) {
        console.error("Error display off:", error);
    }
});
})
  
    // manage the modal message 
    const modal = document.getElementById('modalMessage');
    const closeButton = document.getElementById('closeMessage');
    const submitButton = document.getElementById('nextMessage');
    const messageButton = document.getElementById('openMessage');
    const message2 = document.getElementById('message2');
    const inside = document.getElementById('insidemodalMessage');
    const Hiddenuser = document.getElementById('insidemodalMessage');
  
    message2.addEventListener('click', function() {
      modal.classList.remove('hidden');
    });
    messageButton.addEventListener('click', function() {
      modal.classList.remove('hidden');
    });
  
    closeButton.addEventListener('click', function() {
      modal.classList.add('hidden');
    });
  
    submitButton.addEventListener('click', function() {
      modal.classList.add('hidden');
    });
  
    document.addEventListener('click', function(event) {
      if (!inside.contains(event.target) && !message2.contains(event.target) && !messageButton.contains(event.target)) {
        modal.classList.add('hidden');
      }
    });
  });


// add the user to the list of user choose in the input 
  function manageUser(at_user_name) {
    let input = $('#userMessage').eq(0);
    let currentValue = input.val();
    
    if (currentValue.includes(at_user_name)) {
        let newValue = currentValue.replace(',' + at_user_name, ''); 
        input.val(newValue);
    } else {
        input.val(currentValue + ',' + at_user_name);
    }
    
    var event = new Event('change');
    document.getElementById('userMessage').dispatchEvent(event);
}

// function to parse the value in the value and display the user 
function parseUser(r) {

  $.ajax({
    type: "GET",
    url: "../src/includes/modalUser.inc.php",
    data: { 
       val: r
       }, 
    success: function(response) {
      console.log(response)
       $('#showuser').html(response);
    },
    error: function( error) {
        console.error("Error display off:", error);
    }
});

  
}

    
  
     
    