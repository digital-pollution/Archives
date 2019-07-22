// friend list and message data
var friendsArr = {
		Shepard: ['Commander Shepard', 'online', 'img/shepard.jpg', 'Looks like helping me destroy Saren and the geth has worked out for you. Glad we didnt have to kill each other on Virmire.','Tell me about your "deal" with the quarian over there.', 'What if you and I make a deal? You let him set his own prices, and I wont break your legs.', '3'], 
		Minsic:['Minsic', 'online', 'img/minsic.jpg', 'What? Boo is outraged! See his fury! Its small, so look close. Trust me, its there.','This is silly! Buttons are not how one escapes dungeons! I would smash the button and rain beatings liberally down on the wizard for playing such a trick!', 'Go for the eyes!', '3'],
		Boo:['Boo', 'online', 'img/boo.jpg', 'squeak','hissss', 'squeal', '3'],
		Zaalbar:['Zaalbar', 'offline', 'img/zaalbar.jpg', 'ughhhhh!', 'Arrrggh!', 'errrrrgg!', '3'],
		Daniel:['Daniel', 'online', 'img/daniel.jpg', 'Hello Bioware team! just wanted to take a moment to thank you for considering me for this position.', 'I am a huge long time fan and own copies of most of your catalog, cant wait to see what you are planning next.', 'Thanks again for you time and hope to hear from you all soon, Dan.', '3']	
};
// online friends
var onlineCount = 0;

$(document).ready(function() {
	// hide some controls
	$('div#messenger').hide();
	$('.create-friend button#edit').hide();
	$('.create-friend button#delete').hide();
	$('.tools').hide();
	
	// show/hide click handler
	$('a#friend-count').on('click', function(e){
		e.preventdefault;	
		$("div#messenger").toggle('slide', {direction: 'right'}, 500);
	});	
	// get the friendsArr count number of friends online, create the friends list
	checkOnlineFriends();
	
	// click function to start chat
	$('body').on('click', 'a.chat-icon', function(){
		var thisChat = $(this).attr('name');
		var thisFriendsName = $(this).children('span.chat-name').text();
		createChat(thisChat, thisFriendsName);
	});
	
	// close chat handler
	$('body').on('click', '.chat-window button.close-btn', function(){
		$(this).parents('.chat-window').remove();
	});
	// min and max chat window
	$('body').on('click', 'button.minimize-btn', function(){
		$(this).parents('.chat-window').hide();
		var chatId = $(this).parents('.chat-window').attr('data-id');
		var openChatAvatar = friendsArr[chatId][2];
		var getWindow = $('<a href="#" class="resume-chat" data-window="'+ chatId +'" style="background:url('+openChatAvatar+') no-repeat top center;">'+ chatId +'</a>');
		$('.open-chats').append(getWindow);
		getWindow.on('click',function(e) {
			var findWindow = $(this).attr('data-window');
			$('.chat-window[data-id='+findWindow+'').show();
			$(this).remove();
		});
	});
	
	// push the selected window to the front 
	$('body').on({
		'click' : function(){ 
			$('.chat-window').each(function(){ $(this).css('z-index', '1');}); $(this).css('z-index', '8');
		},
		'dragstart' : function(){ 
			$('.chat-window').each(function(){ $(this).css('z-index', '1');}); $(this).css('z-index', '8');
		}}, '.chat-window'
	);
	
	// send message button
	$('body').on('click', '.chat-actions button', function(e) {
		var thisWindow = $(this).parents('.chat-window').attr('data-id');
		var thisFriend = $(this).parent().siblings('.chat-header').children('h2').text();
		var thisMessage = $(this).prev('textarea').val();	
		startChat(thisWindow, thisFriend, thisMessage);
	});
	
	getFriends();
	// handlers for the toolbar
	$('.create-friend button#create').on('click', function(e) { createFriend(); });
	$('.create-friend button#delete').on('click', function(e) { var thisFriend = $('button#edit').val(); deleteFriend(thisFriend); });
	$('.create-friend button#cancel').on('click', function(e) { emptyForm(); });
	$('.create-friend button#edit').on('click', function(e) { editFriend(); });
	$('body').on('click', '.state-list button', function(e) { var getFriend = $(this).val(); fillForm(getFriend);});
	
	var setBoundaryX = $(window).width();
	setBoundaryX = (setBoundaryX - 300) - $('.tools').width();
	var setBoundaryY = $(window).innerHeight();
	setBoundaryY = setBoundaryY - $('.chat-window').height();
	$('.tools').draggable({ scroll: false, containment:[0, 26, setBoundaryX, setBoundaryY] });
	$('body').on('click', '.tools button.close-btn', function(){
		$('.tools').hide();
	});
	$('body').on('click', 'button.open-tools', function(){
		$('.tools').show();
	});
	
});

// count the number of online friends and addit to the counter
function checkOnlineFriends(){
	$('.online').empty();
	$('.offline').empty();
	onlineCount = 0;
	$('a#friend-count').empty();
	$.each(friendsArr, function(key, value) {
		if(value[1] == 'online'){ onlineCount++; onlineFriend(key, value); } else { offlineFriend(key, value); }
	});
	$('a#friend-count').append(''+ onlineCount +' ');
}

// sort by online/offine status
function onlineFriend(key, value){
	$('.online').append('<div class="friend-listing ' + key + '"><a class="chat-icon" name="'+ key +'" href="#"><span class="avatar"><img src="'+ value[2] +'"/></span><span class="chat-name">'+ value[0] +'</span></a></div>');
}
function offlineFriend(key, value){
	$('.offline').append('<div class="friend-listing ' + key + '"><a class="chat-icon" name="'+ key +'" href="#"><span class="avatar"><img src="'+ value[2] +'"/></span><span class="chat-name">'+ value[0] +'</span></a></div>');
}

// create a new chat window
function createChat(thisChat, thisFriendsName){
	if($('.chat-window[data-id='+ thisChat +']').length || $('a.resume-chat').attr('data-window') == thisChat){	
		// nothing
	} else {
		$('.container').append(
			'<div class="chat-window" data-id="' + thisChat + '"><div class="chat-header"><h2>' + thisFriendsName + '</h2><button class="close-btn">&times;</button><button class="minimize-btn">&ndash;</button></div><div class="chat-log"></div><div class="chat-actions"><textarea></textarea><button>Send</button></div><div class="resize"></div></div>'
		);
		var setBoundaryX = $(window).width();
		setBoundaryX = (setBoundaryX - 300) - $('.chat-window').width();
		var setBoundaryY = $(window).innerHeight();
		setBoundaryY = setBoundaryY - $('.chat-window').height();
		$('.chat-window').draggable({ scroll: false, containment:[0, 26, setBoundaryX, setBoundaryY] }).resizable({ minWidth: 114 }, { minHeight: 328 });	
		$('.chat-window').css('z-index: 3');
		$('.chat-window[data-id='+ thisChat +']').attr('style', 'z-index: 8');
		$('.ui-resizable-handle.ui-resizable-se.ui-icon').attr('style', '');
	}
}

// start the chat
function startChat(thisWindow, thisFriend, thisMessage) {
	var thisChat = $('.chat-window[data-id="'+ thisWindow +'"]').children('.chat-log');
	var d = new Date();
	var responseDelay = 500; //Math.floor((Math.random()*5000)+1);
	
	$(thisChat).append('<p class="you">'+ thisMessage + '</p><small class="you">you - '+ d.toLocaleTimeString() + '</small>');
	$(thisChat).animate({ scrollTop: $(thisChat)[0].scrollHeight}, 300);
	$.each(friendsArr, function(key, value) {
		if( key == thisWindow && value[1] == 'online' && value[6] < 6) {	
			setTimeout(function(){
				var responseCount = value[6];
				$(thisChat).append('<p class="friend">'+ value[responseCount] +'</p><small class="friend">' + value[0] + ' - '+ d.toLocaleTimeString() + '</small>');
				$(thisChat).animate({ scrollTop: $(thisChat)[0].scrollHeight}, 300);
				responseCount++;
				value[6] = responseCount;
			}, responseDelay);
		} else if(key == thisWindow && value[1] == 'online' && value[6] == 6) {
			value[1] = 'offline';
			$(thisChat).append('<p class="offline-msg">This friend has gone offline</p>');
			$(thisChat).animate({ scrollTop: $(thisChat)[0].scrollHeight}, 300);
			checkOnlineFriends();
		} else if (key == thisWindow && value[1] == 'offline') {
			$(thisChat).append('<p class="offline-msg">This friend is offline</p>');
			$(thisChat).animate({ scrollTop: $(thisChat)[0].scrollHeight}, 300);
		}
	});
}

// manage friends tool
function createFriend(){
	var name = $('.create-friend input[name=name]').val(); 
	var newKey = name.replace(/\s+/g, '');
	var avatar = $('.create-friend input[name=avatar]').val();
	var responseOne = $('.create-friend input[name=responseOne]').val();
	var responseTwo = $('.create-friend input[name=responseTwo]').val();
	var responseThree = $('.create-friend input[name=responseThree]').val();	
	var status;
	
	if ($('.create-friend input[value=online]').prop('checked')) {
		status = 'online';
	} else if ($('.create-friend input[value=offline]').prop('checked')){
		status = 'offline';
	}
	
	friendsArr[''+ newKey +''] = new Array(name, status, avatar, responseOne, responseTwo, responseThree, '3');
	checkOnlineFriends();
	emptyForm();
	getFriends();
}

// get a list of editable friends
function getFriends(){
	$('.state-list').empty();
	$.each(friendsArr, function(key, value) {
		$('.state-list').append('<button value="'+ key +'">'+ value[0] +'</button>');
	});
}
function editFriend(){
	var editValue = $('button#edit').val();
	var name = $('.create-friend input[name=name]').val();
	var avatar = $('.create-friend input[name=avatar]').val();
	var responseOne = $('.create-friend input[name=responseOne]').val();
	var responseTwo = $('.create-friend input[name=responseTwo]').val();
	var responseThree = $('.create-friend input[name=responseThree]').val();	
	var status;
	
	if ($('.create-friend input[value=online]').is(':checked')) {
		status = 'online';
	} else if ($('.create-friend input[value=offline]').is(':checked')){
		status = 'offline';
	}
	
	friendsArr[''+ editValue +''][0] = name;  //name, status, avatar, responseOne, responseTwo, responseThree, '3');
	friendsArr[''+ editValue +''][1] = status;
	friendsArr[''+ editValue +''][2] = avatar;
	friendsArr[''+ editValue +''][3] = responseOne;
	friendsArr[''+ editValue +''][4] = responseTwo;
	friendsArr[''+ editValue +''][5] = responseThree;
	friendsArr[''+ editValue +''][6] = '3';
	checkOnlineFriends();
	emptyForm();
	getFriends();
}

function deleteFriend(thisFriend){
	delete friendsArr[''+ thisFriend +''];
	checkOnlineFriends();
	emptyForm();
	getFriends();
}

// fill the form with friend information
function fillForm(getFriend){
	if (getFriend in friendsArr){
		$('.create-friend input[name=name]').val(friendsArr[getFriend][0]);
		var status = friendsArr[getFriend][1];
		if(status == 'online' ){ 
			$('.create-friend input[value=online]').prop("checked", true); 
		} else {
			$('.create-friend input[value=offline]').prop("checked", true);
		}
		$('.create-friend input[name=avatar]').val(friendsArr[getFriend][2]);
		$('.create-friend input[name=responseOne]').val(friendsArr[getFriend][3]);
		$('.create-friend input[name=responseTwo]').val(friendsArr[getFriend][4]);
		$('.create-friend input[name=responseThree]').val(friendsArr[getFriend][5]);
		$('.create-friend button#create').hide();
		$('.create-friend button#edit').show();
		$('.create-friend button#delete').show();
		$('button#edit').attr('value', ''+ getFriend +'');
	}
}


function emptyForm(){
	$('.create-friend input[name=name]').val('');
	$('.create-friend input[name=avatar]').val('');
	$('.create-friend input[name=online]').val('');
	$('.create-friend input[name=offline]').val('');
	$('.create-friend input[name=responseOne]').val('');
	$('.create-friend input[name=responseTwo]').val('');
	$('.create-friend input[name=responseThree]').val('');
	$('.create-friend button#create').show();
	$('.create-friend button#edit').hide();
	$('.create-friend button#delete').hide();
}