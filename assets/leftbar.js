document.addEventListener("DOMContentLoaded", function(e) {
        // here we manage the leftbar content 
    // if the url path is index.php we do this ...
    if (window.location.href.indexOf('index.php') > -1) {
        document.getElementById('index').classList.remove('hidden');
        document.getElementById('indexnot').classList.add('hidden');
        document.getElementById('search').classList.add('hidden');
        document.getElementById('notsearch').classList.remove('hidden');
        document.getElementById('message').classList.add('hidden');
        document.getElementById('notmsg').classList.remove('hidden');
        document.getElementById('profile').classList.add('hidden');
        document.getElementById('notprofile').classList.remove('hidden');
  }else if(window.location.href.includes('search.php')){
        // if the url path include search.php we do this ...

    document.getElementById('index').classList.add('hidden');
    document.getElementById('indexnot').classList.remove('hidden');
    document.getElementById('search').classList.remove('hidden');
    document.getElementById('notsearch').classList.add('hidden');
    document.getElementById('message').classList.add('hidden');
    document.getElementById('notmsg').classList.remove('hidden');
    document.getElementById('profile').classList.add('hidden');
    document.getElementById('notprofile').classList.remove('hidden');
  }else if (window.location.href.includes('messages.php')){

            // if the url path include messages.php we do this ...

    document.getElementById('index').classList.add('hidden');
    document.getElementById('indexnot').classList.remove('hidden');
    document.getElementById('search').classList.add('hidden');
    document.getElementById('notsearch').classList.remove('hidden');
    document.getElementById('message').classList.remove('hidden');
    document.getElementById('notmsg').classList.add('hidden');
    document.getElementById('profile').classList.add('hidden');
    document.getElementById('notprofile').classList.remove('hidden');
  }else if (window.location.href.includes('profile.php')){

      // if the url path include profile.php we do this ...

    document.getElementById('index').classList.add('hidden');
    document.getElementById('indexnot').classList.remove('hidden');
    document.getElementById('search').classList.add('hidden');
    document.getElementById('notsearch').classList.remove('hidden');
    document.getElementById('message').classList.add('hidden');
    document.getElementById('notmsg').classList.remove('hidden');
    document.getElementById('profile').classList.remove('hidden');
    document.getElementById('notprofile').classList.add('hidden');
  } else {
        document.getElementById('index').classList.add('hidden');
        document.getElementById('indexnot').classList.remove('hidden');
        document.getElementById('search').classList.add('hidden');
        document.getElementById('notsearch').classList.remove('hidden');
        document.getElementById('message').classList.add('hidden');
        document.getElementById('notmsg').classList.remove('hidden');
        document.getElementById('profile').classList.add('hidden');
        document.getElementById('notprofile').classList.remove('hidden');
  }
  });