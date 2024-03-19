document.addEventListener("DOMContentLoaded", function(e) {

    // here we manage the header content 
    // if the url path is index.php we do this ...
    if (window.location.href.indexOf('index.php') > -1) {
        document.getElementById('indexheader').classList.remove('hidden');
        document.getElementById('profileheader').classList.add('hidden');
        document.getElementById('searchheader').classList.add('hidden');
        document.getElementById('normal').classList.remove('hidden');

       
  }else if(window.location.href.includes('search.php')){
        // if the url path include search.php we do this ...

    document.getElementById('indexheader').classList.add('hidden');
    document.getElementById('profileheader').classList.add('hidden');
    document.getElementById('normal').classList.add('hidden');
    document.getElementById('searchheader').classList.remove('hidden');
  }else if (window.location.href.includes('profile.php')){
            // if the url path include profile.php we do this ...

    document.getElementById('indexheader').classList.add('hidden');
    document.getElementById('profileheader').classList.remove('hidden');
    document.getElementById('searchheader').classList.add('hidden');
    document.getElementById('normal').classList.remove('hidden');

  } 
  });