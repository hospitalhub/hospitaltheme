jQuery(document).ready(function($) {
        
function menuText(show) {
	if (show) {
		$("i.fa.fa-bars").text(" menu");
	} else {
		$("i.fa.fa-bars").text("");
	}
}

function showPopover(id, msg) {
	$('#' + id).attr("data-content",msg);
	$('#' + id).attr("data-placement","bottom");
	$('#' + id).attr("data-delay","700");
	$('#' + id).attr("data-title","MENU");
	$('#' + id).attr("data-html","true");
	$('#' + id).popover('show');
	//$('#close'+ id).click(function() {
	//	$('#sideSlideToggle').popover('destroy');
	//});
}

if($(".bx-slider").length > 0) {
	// pokaz info
	var id = 'leftSideSlideMenu';
	var message = 'Otwórz menu klikając na ikonie powyżej.'; // <button type="button" id="close' + id +'" class="close">ukryj</button>';
	showPopover(id,message);
} else {
	// schowaj napis menu po 2.5 s
	menuText(true);
	setTimeout(menuText, 2500);
}

$('#simple-menu').sidr();

});
