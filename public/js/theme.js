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
	$('.dtBasicExample').DataTable();
	$('.dataTables_length').addClass('bs-select');
});
