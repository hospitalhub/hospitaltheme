jQuery(document)
		.ready(
				function($) {

					$("#people").getOrgChart({
						// theme: "annabel",
						// theme: "belinda",
						// theme: "cassandra",
						// theme: "deborah",
						// theme: "lena",
						theme : "monica",
						// theme: "eve",
						// theme: "vivian",
						// theme: "helen",
						// renderBoxContentEvent: function( sender, args ) {
						// if (args.id == 1)
						// args.boxContentElements.push('<a
						// xlink:href="javascript: alert(' + args.id + ')"><text
						// width="330" x="10" y="10">x</text></a>');
						// },
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
					// $('#people').getOrgChart("loadFromJSON", peopleJsonObj);
					// http://www.getorgchart.com/JsonInitialization/Read?callback=?
					// http://127.0.0.1:8000/wp/?orgchart=f93719f333ec423d6b216aeda626cb82
					$.getJSON(
									"http://127.0.0.1:8000/wp/?orgchart=f93719f333ec423d6b216aeda626cb82",
									function(peopleJsonObj) {
										$('#people').getOrgChart(
												"loadFromJSON", peopleJsonObj);
										
									});
					// var json = JSON.parse(peopleJsonObj);
					// alert(JSON.stringify(JSON.parse(peopleJsonObj)));

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
