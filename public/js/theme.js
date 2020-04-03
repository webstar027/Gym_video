$(function(){

	"use strict";

	// When the user scrolls down 100px from the top of the document, header will be fixed
	window.onscroll = function() {scrollFunction();};
	var header = document.getElementById("header");
	function scrollFunction() {
	    if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
	        header.classList.add("is-scrolling");
	    } else {
			header.classList.remove("is-scrolling");
	    }
	}

var gymfields = $('#gym_owner_account').html();
$("#gym_owner_account").html("");
$("#gym_owner_account").css('display','none');
	$("#btn_individual").click(function(){
		$("#gym_owner_account").html("");
		$("#gym_owner_account").css('display','none');
	});
	$("#btn_gym_owner").click(function(){
		$("#gym_owner_account").html(gymfields);
		$("#gym_owner_account").css('display','block');
	});
	$('[data-toggle="tooltip"]').tooltip();
	// $('.dtBasicExample').DataTable({
	// 	"bJQueryUI": true,
	// 	"sPaginationType": "full_numbers",
	// 	"bPaginate": true,
	// 	"bFilter": true,
	// 	"bSort": true,
	// 	"aaSorting": [
	// 	  [1, "asc"]
	// 	],
	// 	"aoColumnDefs": [{
	// 	  "bSortable": true,
	// 	  "aTargets": [0]
	// 	}, {
	// 	  "bSortable": true,
	// 	  "aTargets": [1]
	// 	}, {
	// 	  "bSortable": true,
	// 	  "aTargets": [2]
	// 	}],
	//   });
	$('.dataTables_length').addClass('bs-select');
$('.display_reply_form').click(function(e){
	e.preventDefault();
	$(this).parent().find('.reply_form').show();
	$(this).hide();
});
$('.hide_reply_form').click(function(e){
	e.preventDefault();
	$(this).parent().parent('.reply_form').hide();
	$(this).parent().parent().parent().find('.display_reply_form').show();
});
});
