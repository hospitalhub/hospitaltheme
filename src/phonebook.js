
jQuery(document)
		.ready(
				function($) {

$(function () {

$.fn.bootstrapTable.locales['pl-PL'] = {
        formatLoadingMessage: function () {
            return 'Ładowanie, proszę czekać...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' rekordów na stronę';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Wyświetlanie rekordów od ' + pageFrom + ' do ' + pageTo + ' z ' + totalRows;
        },
        formatSearch: function () {
            return 'Szukaj';
        },
        formatNoMatches: function () {
            return 'Niestety, nic nie znaleziono';
        },
        formatRefresh: function () {
            return 'Odśwież';
        },
        formatToggle: function () {
            return 'Przełącz';
        },
        formatColumns: function () {
            return 'Kolumny';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['pl-PL']);


    $('#table').bootstrapTable({
	height: getHeight(),
	columns: [
                    {
			title: 'Nazwa',
                        field: 'name',
                        align: 'center',
                        valign: 'middle',
                        sortable: true,
                    }, {
			title: 'Komórka org.',
                        field: 'group',
                        align: 'center',
                        valign: 'middle',
                        sortable: true,
                    }, {
                        title: 'Telefon',
                        field: 'number',
                        align: 'center'
                    }
                ],
        data: data
     });
    
function getHeight() {
        return $(window).height() - 250;
    }
// var $table = $('#table');
//    $(function () {
//        $('#modalTable').on('shown.bs.modal', function () {
//            $table.bootstrapTable('resetView');
//        });
//    });


});


				});
