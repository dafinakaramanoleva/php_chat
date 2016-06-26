$(function(){
	updateMsg();

	if(!$('#leave-btn').length == 0) {
		$('#message-text').removeAttr("disabled");
    	$('#send-message').removeAttr("disabled");
	}

	var interval = setInterval(function() {
		updateMsg();
	}, 1000);
	
});

function sendMessage(username, time, event) {
	event.preventDefault();
	var msg = $('#message-text').val();
	var room = $('.add-room-content .chat-name').text();

	if (msg != '') {
		var data = {
			"username" : username,
			"msg" : msg,
			"room" : room
		};

		$.ajax({
		    url: 'insert_msg.php',
		    type: 'POST',
		    dataType: 'json',
		    data: data,
		    success: function(data) {
	    		$('.messages').prepend("<div class='row msg'>" +
					"<div class='col-md-2 username'>" + data.username + ": </div>" +
					"<div class='col-md-7 msg-text'>" + data.msg + "</div>" +
					"<div class='col-md-3 time'>" + data.currenttime + "</div>" +
				"</div>");

		    },
		    error: function( jqXhr, textStatus, errorThrown ){
		        console.log( errorThrown );
		    }
		});

		$('#message-text').val('');
	} else {
		alert("Can't send an empty message!");
	}
	
}

function joinChat(username, event) {
	event.preventDefault();

	var room = $('.add-room-content .chat-name').text();
	var data = {"username": username, "room" : room};

	$.ajax({
		url: 'joinChat.php',
	    type: 'POST',
	    dataType: 'json',
	    data: data,
	    success: function(data) {
	    	 location.reload();
	    },
	    error: function( jqXhr, textStatus, errorThrown ){
	        console.log( errorThrown );
	    }
	});
	
}

function leaveChat(username, event) {
	event.preventDefault();
	
	var room = $('.add-room-content .chat-name').text();
	var data = {"username": username, "room" : room};

	$.ajax({
		url: 'leaveChat.php',
	    type: 'POST',
	    dataType: 'json',
	    data: data,
	    success: function(data) { 
	    	$('#send-message').attr('disabled', 'disabled');
	    	$('#message-text').attr('disabled', 'disabled');

	    	location.reload();
	    },
	    error: function( jqXhr, textStatus, errorThrown ){
	        console.log( errorThrown );
	    }
	});
	
}

function updateMsg() {
	//get the last shwon message's time and select ell messages after it
	var d = new Date();
	var time = {
		"year" : d.getFullYear(),
		"month" : d.getMonth() + 1,
		"day" : d.getDate(),
		"hour" : d.getHours(),
		"minutes" : d.getMinutes(),
		"seconds" : d.getSeconds()
	}

	var current_time = time.year + "-" + time.month + "-" + time.day + " " + time.hour + ":" + time.minutes + ":" + time.seconds;

	var room = $('.add-room-content .chat-name').text();
	var data = {"room" : room, "time" : current_time};
	$.ajax({
		url: 'updateChat.php',
	    type: 'GET',
	    data: data,
	    success: function(data) {
	    	console.log(data);
	    	$('.messages').prepend(data);
	    },
	    error: function( jqXhr, textStatus, errorThrown ){
	        console.log( errorThrown );
	    }
	});
}