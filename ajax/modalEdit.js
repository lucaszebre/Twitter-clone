$(document).ready(function() {

    function previewBanner(file){
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#background").attr("style",`height: 200px; background-image: url(${reader.result});` );
            }
        
            reader.readAsDataURL(file);
        }
    }   
    function previewPhoto(file){
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#profile").attr("src",reader.result );
            }
        
            reader.readAsDataURL(file);
        }
    }

    function importDataBanner() {
        $('<input>').attr({
            type: 'file',
            id: 'Banner',
            name: 'banner',
            class: 'hidden',
            accept:"image/*"
        }).appendTo('#formEdit');
        let input = $("#Banner").eq(0);
        input.on("change" , ()=> {
                  let files= $("#Banner").get(0).files;
                  
                    previewBanner(files[0]);
                  
                   console.log(files);
              });
        input.trigger("click");
    
      }
      
      function importDataPP() {
        $('<input>').attr({
            type: 'file',
            id: 'photoProfile',
            name: 'photoProfile',
            class: 'hidden',
            accept:"image/*"
        }).appendTo('#formEdit');
        let input = $("#photoProfile").eq(0);
        input.on("change" , ()=> {
                  let files= $("#photoProfile").get(0).files;
                  
                     previewPhoto(files[0]);
                  
                   console.log(files);
              });
        input.trigger("click");
    
      }
    
    
    
    
      const buttonBanner = $("#buttonBanner").eq(0)
      const buttonPP = $("#buttonPP").eq(0)
      
      buttonBanner.on('click',()=>{
        importDataBanner();
      })

      buttonPP.on('click',()=>{
        importDataPP();
      })

      // function to post the form to edit the profile
      $("#formEdit").on("submit",(function(e) {
        e.preventDefault()
        var formData = new FormData(this);


    $.ajax({
        type: "POST",
        url: "../src/includes/edit.inc.php",
        data: formData, 
        cache: false,
        processData: false,
        contentType:false,
        success: function() {
            
            $("#modalEdit").eq(0).addClass("hidden")
        },
        error: function( error) {
            console.error("Error while retweeting:", error);
        }
    });

    }));
    
 
    });
