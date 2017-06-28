/**
 * Created by tgillis on 6/27/2017.
 */
var ajaxUrl = 'includes/ajax/data.php';
var symbol_sort = 'asc';
var symbol_name_sort = 'asc';
var last_sort = 'asc';
var change_sort = 'asc';
var pctchange_sort = 'asc';
var volume_sort = 'asc';
var time_sort = 'asc';

$(document).ready(function () {
	refreshTickerTable();

	$('input#symbol').autocomplete({
		source: function (request, response) {
			$.post("includes/ajax/data.php", {
					searchTerm: $('input#symbol').val()
				},
				function (data) {
					response(data);
				}, "json"
			).fail(function (err) {
				console.log(err.responseText);
			});
		}
	})
});

function addSymbol() {
	var symbol = $('#symbol').val();
	if (symbol.trim() !== '') {
		$.post(ajaxUrl, {
			symbol: symbol
		}, function (data) {
			if (data.success === false) {
				alert(data.message);
			} else {
				refreshTickerTable();
			}
		}, 'json')
	} else {
		alert('You must enter a valid ticker symbol');
	}
}

function refreshTickerTable(sort) {
	var sortOrdering = getSortOrderingMode(sort);
	$.post(ajaxUrl, {
		refreshTable: true,
		sortBy: typeof sort === 'undefined' ? '' : sort,
		sortOrdering: sortOrdering
	}, function (data) {
		if (data.html !== '') {
			$('#tickerTable').replaceWith(data.html);
		}
	}, 'json');
}

function removeFromWatchlist(symbol) {
	$.post(ajaxUrl, {
		removeStock: true,
		stockSymbol: symbol
	}, function (data) {
		if (data.success === true) {
			refreshTickerTable();
		}
	}, 'json');
}

function getSortOrderingMode(sort) {
	var sortOrdering = '';
	switch (sort) {
		case 'symbol':
			sortOrdering = symbol_sort;
			if (symbol_sort === 'asc') {
				symbol_sort = 'desc';
			} else {
				symbol_sort = 'asc';
			}
			break;
		case 'name':
			sortOrdering = symbol_name_sort;
			if (symbol_name_sort === 'asc') {
				symbol_name_sort = 'desc';
			} else {
				symbol_name_sort = 'asc';
			}
			break;
		case 'last':
			sortOrdering = last_sort;
			if (last_sort === 'asc') {
				last_sort = 'desc';
			} else {
				last_sort = 'asc';
			}
			break;
		case 'change':
			sortOrdering = change_sort;
			if (change_sort === 'asc') {
				change_sort = 'desc';
			} else {
				change_sort = 'asc';
			}
			break;
		case 'pctchange':
			sortOrdering = pctchange_sort;
			if (pctchange_sort === 'asc') {
				pctchange_sort = 'desc';
			} else {
				pctchange_sort = 'asc';
			}
			break;
		case 'volume':
			sortOrdering = volume_sort;
			if (volume_sort === 'asc') {
				volume_sort = 'desc';
			} else {
				volume_sort = 'asc';
			}
			break;
		case 'tradetime':
			sortOrdering = time_sort;
			if (time_sort === 'asc') {
				time_sort = 'desc';
			} else {
				time_sort = 'asc';
			}
			break;
		default:
			sortOrdering = 'asc';
			break;
	}
	return sortOrdering;
}
