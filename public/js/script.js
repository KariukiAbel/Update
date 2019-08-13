$(document).ready(function(){
    $("#servicesbtn").focus(function(){
        $(this).css({"outline":"none", "border-radius": "50%"})
    })

    $("#servicesbtn").focusout(function(){
        $(this).css({"outline":"none", "border-radius": "0%"})
    })
    
    $(".menu-drop").on("mouseenter", function(){
        console.log("Hover")
        $(".menu-drop > dropdown-menu").addClass("show")
    })
})
