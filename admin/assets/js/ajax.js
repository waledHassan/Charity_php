

$('.showMessage').click(function(){


	// change unread to Read
	$(this).parent().prev().text('Read');

	// get id to the selected message
	// var id = $(this).data('id');
	var id = $(this).attr('data-id');

	// change view to 1
	var url = 'messages.php?action=update'

	$.post(url , {id} , function(data){

		console.log(data);

	});

});

// $('.deleteMessage').click(function(){


	

// 	var id = $(this).attr('data-id');

// 	var url = 'messages.php';

// 	$.post(url , {id} , function(data){

// 		console.log(data);

// 	});

// })


// var deletemessage =  document.getElementById("deletemessage");
// var window = window.document.querySelector(".header");

// deletemessage.onclick() = function(){
// 	  window.innerHTML = 'waled';
// }





// $('.openModal').click(function(){
// 	var id = $(this).attr('data-id');
// 	alert(id);
// 	$.ajax({url:"messages.php?action=delete&id="+id,cache:false,success:function(result){
// 		$(".modal-dialog").html(result);
// 	}});
// });