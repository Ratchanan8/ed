$(document).ready(function() {
$("#results" ).load( "fetch_pages.php"); //load initial records

//executes code below when user click on pagination links
$("#results").on( "click", ".pagination a", function (e){
e.preventDefault();
$(".loading-div").show(); //show loading element
var page = $(this).attr("data-page"); //get page number from link
$("#results").load("fetch_pages.php",{"page":page}, function(){ //get content from PHP page
$(".loading-div").hide(); //once done, hide loading element
});

});
}); 