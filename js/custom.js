//$(document).ready(function() {
$(function(){  //short path for the above line
    // select all <a> and prompt an alert
    $("a").first().click(function() {
        alert("Hello world!");
    });
    $("#orderedlist").addClass("red");
    //select last list element and add mouse hover effect
    $("#orderedlist > li").last().mouseover(function(){
        $(this).addClass("blue");
    });
    $("#orderedlist li:last").mouseout(function(){
        $(this).removeClass("blue");
    });

    //first element using "hover fn"
    $("#orderedlist li:first").hover(function(){
        $(this).addClass("green");
    },function(){
        $(this).removeClass("green");
    });
    //append li
    $("#orderedlist").find("li").each(function(i) {
        $(this).append( " BAM! " + i );
    });


    // use this to reset a single form
    $("#reset").click(function() {
        $("form")[0].reset();
    });

    // use this to reset several forms at once
    $("#reset").click(function() {
        $("form").each(function() {
            this.reset();
        });
    });
    //This selects all li elements that have a ul element as a child
    // and removes all elements from the selection.
    // Therefore all li elements get a border, except the one that has a child ul.
    $("li").not(":has(ul)").css("border", "1px solid black");
    // select all anchors that have a name attribute:
    $("a[name]").css("background", "#eee" );

    $("a[href*='/content/gallery']").click(function() {
        // do something with all links that point somewhere to /content/gallery
        $(this).addClass("blue");
    });



    // By using end(), the first find() is undone,
    // so we can start search with the next find()
    // at our #faq element, instead of the dd children.
    $('#faq').find('dd').hide().end().find('dt').click(function() {
        $(this).next().slideToggle();
    });


    //For all hovered anchor elements,
    //the parent paragraph is searched
    //and a class "highlight" added and removed.
    $("a").hover(function(){
        $(this).parents("p").addClass("highlight");
    },function(){
        $(this).parents("p").removeClass("highlight");
    });






    //rating eg
    // generate markup
    $("#rating").append("Please rate: ");

    for ( var i = 1; i <= 5; i++ ) {
        $("#rating").append("<a href='#'>" + i + "</a> ");
    }

    // add markup to container and apply click handlers to anchors
    $("#rating a").click(function(e) {
        // stop normal link click
        e.preventDefault();

        // send request
        $.post("rate.php", {
            rating: $(this).html()
        }, function(xml) {
            // format and output result
            $("#rating").html(
                "Thanks for rating, current average: " +
                $("average", xml).text() +
                ", number of votes: " +
                $("count", xml).text()
                );
        });
    });

    $("a").hover(function(){
     $(".stuff").animate({ height: 'hide', opacity: 'hide' }, 'slow');
   },function(){
     $(".stuff").animate({ height: 'show', opacity: 'show' }, 'slow');
   });

});