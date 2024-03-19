$(document).ready(function(){
  // function to  generate a name for the image
  function generateRandomName() {
    var randomName = '/img/' + Math.random().toString(36).substring(2, 7);
    return randomName;
}

function previewFile(file){
    
    if(file){
        var reader = new FileReader();
        var fileName=generateRandomName();
        reader.onload = function(){
            $("#preview").toggleClass("hidden");
            $("#preview_close").toggleClass("hidden");
            $("#preview").toggleClass("flex");
            $("#preview").attr("src", reader.result);

        }
    
        reader.readAsDataURL(file);

        $("#preview_close").on("click",()=>{
          $("#preview").toggleClass("hidden");
          $("#preview").toggleClass("flex");
          $("#preview_close").toggleClass("hidden");
     
          $("#content").val(updatedContent);
            reader.abort()
            reader=null
            $('#file').remove()
        })
        

        
    }
}

function importData() {
    $('<input>').attr({
        type: 'file',
        id: 'file',
        name: 'file',
        class: 'hidden',
        accept:"image/*"
    }).appendTo('#modalTweet');
    let input = $("#file").eq(0);
    input.on("change" , ()=> {
             let files= $("#file").get(0).files;
              
                previewFile(files[0]);
              
              console.log(files);
          });
    input.trigger("click");

  }




  const button = $("#image").eq(0)
  
  button.on('click',()=>{
    importData();
  })





})