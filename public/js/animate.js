
console.log("animate javascript");
$( document ).ready(function() {
    function addMenuAnimation() {
        $('.menu a').mouseover(function () {
            $(this).animate({fontSize: '28px', marginRight: '6px'}, 'fast')
        });
        $('.menu a').mouseout(function () {
            $(this).animate({fontSize: '25px', marginRight: '10px'}, 'fast')
        });
    }
    addMenuAnimation();
});
