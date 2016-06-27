$(function(){
	updateMsg();

	if(!$('#leave-btn').length == 0) {
		$('#message-text').removeAttr("disabled");
    	$('#send-message').removeAttr("disabled");
    	$('#file').removeAttr("disabled");
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
	    	$('#file').attr('disabled', 'disabled');

	    	location.reload();
	    },
	    error: function( jqXhr, textStatus, errorThrown ){
	        console.log( errorThrown );
	    }
	});
	
}

function updateMsg() {
	var last_msg_time = $('.row .time').first().text();

	var room = $('.add-room-content .chat-name').text();
	var data = {"room" : room, "time" : last_msg_time};
	$.ajax({
		url: 'updateChat.php',
	    type: 'GET',
	    data: data,
	    success: function(data) {
	    	$('.messages').prepend(data);
	    },
	    error: function( jqXhr, textStatus, errorThrown ){
	        console.log( errorThrown );
	    }
	});
}

function fileUpload (username) {
	var file = $('#file')[0].files[0];
	var room = $('.add-room-content .chat-name').text();

	var form_data = new FormData();                  
    form_data.append('myfile', file);
    var data = {
    	"file" : form_data,
    	"room" : room,
    	"username" : username
    };

	$.ajax({
		url: 'file_upload.php',
	    type: 'POST',
        cache: false,
        contentType: false,
        processData: false,
	    data: form_data,
	    success: function(data) {
	    	$('.messages').prepend(data);
	    },
	    error: function( jqXhr, textStatus, errorThrown ){
	        console.log( errorThrown );
	    }
	});
}