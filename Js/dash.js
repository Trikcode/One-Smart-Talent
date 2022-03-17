window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
const button = document.querySelector('.btn')
const form   = document.querySelector('.form')

button.addEventListener('click', function() {
   form.classList.add('form--no') 
});
// google
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  $("#name").text(profile.getName());
  $("#email").text(profile.getEmail());
  $("image").attr('src', profile.getImageUrl());
  $('.data').css("display", "block");
  $(".g-signin2").css("display", "none");
}

  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      alert('You are out')
      $(".g-signin2").css("display", "block");
      $('.data').css("display", "none");
    });
  }


  //add job
    // let formm = document.querySelector('.job-desc')
    // let btn = document.getElementById("submittwo")
    // btn.addEventListener('click',()=>{
    //   alert('stopped')
    // })
 