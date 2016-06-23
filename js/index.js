$(function(){
	$('#add_room_button').on('click', function() {
		location.href = 'addRoom.php';
	});

	var myVar = setInterval(function(){ myTimer() }, 1000);
	
});

function myTimer() {
    var d = new Date();
    var t = d.toLocaleTimeString();
    $("footer .container").html(t);
}