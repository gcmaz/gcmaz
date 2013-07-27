$(document).ready(function(){
    
    /* --- dropdown menu */
    $(function(){
        $("ul.dropdown li").hover(function(){
            $(this).addClass("hover");
            $('ul:first',this).css('visibility', 'visible');
        }, function(){
            $(this).removeClass("hover");
            $('ul:first',this).css('visibility', 'hidden');
        });
        $("ul.dropdown li ul li:has(ul)").find("a:first").append(" &raquo; ");
    }); 

    /* -----  random gutter image ----- */
    var classes = ['bodybg1', 'bodybg2', 'bodybg3', 'bodybg4', 'bodybg5'];
    var numRand = Math.floor(Math.random()*5);
    $('body').addClass(classes[numRand]);
    
    /* ------top rightcol pop 660x150 banner   */
    var $popban = $(document).find('#expleaderboard');
    $(function(){
        $popban.delay(10000).animate({ height:18, bottom:0, marginTop:0}, function(){
            //show hide funx
            $popban.mouseover(function(){
                $popban.stop().animate({ height:150, bottom:150, marginTop:0});
            });
            $popban.mouseout(function(){
                $popban.stop().animate({ height:18, bottom:0, marginTop:0});
            });
        });
    });
});
