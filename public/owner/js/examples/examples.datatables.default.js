/*
Name: 			Tables / Advanced - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	3.0.0
*/

(function($) {

	'use strict';

	var datatableInit = function() {

		$('#datatable-default').dataTable({
			 "aaSorting": [],
			 "order": [],
			  paging: false
			
		});

	};

	$(function() {
		datatableInit();
	});

}).apply(this, [jQuery]);