



jQuery(document)
		.ready(
				function($) {








$(function () {
    $('#table').bootstrapTable({
        data: data
    });

    $(".mybtn-top").click(function () {
        $('#table').bootstrapTable('scrollTo', 0);
    });
    
    $(".mybtn-row").click(function () {
        var index = +$('.row-index').val(),
            top = 0;
        $('#table').find('tbody tr').each(function (i) {
                if (i < index) {
                top += $(this).height();
            }
        });
        $('#table').bootstrapTable('scrollTo', top);
    });
    
    $(".mybtn-btm").click(function () {
        $('#table').bootstrapTable('scrollTo', 'bottom');
    });

});










					$("#people")
							.getOrgChart(
									{
										theme : "monica",
										// theme: "helen",
										// theme: "belinda",
										// theme: "cassandra",
										// theme: "deborah",
										// theme: "lena",
										// theme: "annabel",
										// theme: "eve",
										// theme: "vivian",
										renderBoxContentEvent : function(
												sender, args) {
											args.boxContentElements
													.push('<a xlink:href="javascript: alert('
															+ args.id
															+ ')"><text width="10" x="10" y="10">.</text></a>');
										},
										primaryColumns : [ "name", "title" ],
										orientation : getOrgChart.RO_TOP_PARENT_LEFT,
										imageColumn : "image",
										levelSeparation : 60,
										scale : 0.5,
										siblingSeparation : 30,
										subtreeSeparation : 300,
										editable : false,
										linkType : "M"
									});
					$.getJSON(
									"http://127.0.0.1:8000/wp/?orgchart=f93719f333ec423d6b216aeda626cb82",
									function(peopleJsonObj) {
										$('#people').getOrgChart(
												"loadFromJSON", peopleJsonObj);

									});

					// stop slider on info
					// $("#infodis").click( function() {
					// var slider = $('#main-slider .bx-slider').bxSlider();
					// slider.goToSlide(1);
					// });
					// start slider on ok
					/*
					 * $(".ok").click( function() { var slider = $('#main-slider
					 * .bx-slider').bxSlider(); slider.startAuto(); });
					 */
				});
