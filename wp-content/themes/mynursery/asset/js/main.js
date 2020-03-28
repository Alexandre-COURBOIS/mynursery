// When the user scrolls the page, execute myFunction
window.onscroll = function () {
    myFunction()
};

// Get the header
var header = document.getElementById("myHeader");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}

// Slider
$(document).ready(function(){

$("#demo").carousel({

    interval: 8000,

});


$('#pro').click(function () {
    $('#pro').prop('checked',true)
    window.location = 'inscription';
    });

$('#parent').click(function () {
    $('#parent').prop('checked',true)
    alert('Lien vers l\'inscription parent');
});

});


/*
function userChoice() {

    submit = document.getElementById('submit');

    $('#pro').click(function () {
       var pro = $('#pro').prop('checked', true)
        if (pro === 1) {
            submit.onsubmit = console.log('ça fonctionne!')
        }
    });
    $('#parent').click(function () {
        let parent = $('#pro').prop('checked', true)
    });



};
*/








