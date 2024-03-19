document.addEventListener("DOMContentLoaded", function() {

 
    // here the manage the pop up for edit the account 
  
  
    const modal = document.getElementById('modalEdit');
    const closeButton = document.getElementById('closeEdit');
    const editButton = document.getElementById('editButton');
    const inside = document.getElementById('insidemodal');
  

    closeButton.addEventListener('click', function() {
      modal.classList.add('hidden');
    });  
    
    editButton.addEventListener('click', function() {
      modal.classList.remove('hidden');
    });
  
  
    // document.addEventListener('click', function(event) {
    //   if (!inside.contains(event.target) && !editButton.contains(event.target) ) {
    //     console.log("here")

    //     modal.classList.add('hidden');
    //   }
    // });
  });