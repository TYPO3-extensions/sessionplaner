(function($) {
	'use strict';

	$.extend({
		getUrlVars: function() {
			var vars = [], hash;
			var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
			for (var i = 0; i < hashes.length; i++) {
				hash = hashes[i].split('=');
				vars.push(hash[0]);
				vars[hash[0]] = hash[1];
			}
			return vars;
		},

		getUrlVar: function(name) {
			return $.getUrlVars()[name];
		}
	});

	var $newSession,
		$editSession,
		sessionData = {},
		$stash,
		ajaxActive = false;

	/**
	 *
	 * @param id string
	 * @return element
	 */
	function getTemplateElement(id) {
		return $($('#' + id).html().replace(/^\s+|\s+$/g, ''));
	}

	/**
	 * @param serializedData
	 * @return object
	 */
	function prepareData(serializedData) {
		var data = {};

		$.each(serializedData, function(index, fieldNameAndValue) {
			data[fieldNameAndValue.name] = fieldNameAndValue.value;
		});

		return data;
	}

	/**
	 * @param $form element
	 * @param sessionData object
	 * @returns element
	 */
	function applySessionValuesToForm($form, sessionData) {
		$.each(sessionData, function(index, value) {
			var $element = $('dd .' + index + ':first', $form);

			if ($element.length > 0) {
				$element.val(value);
			}
		});

		return $form;
	}

	/**
	 * @param $card element
	 * @param sessionData object
	 * @return element
	 */
	function applySessionValuesToCard($card, sessionData) {
		$.each(sessionData, function(index, value) {
			var $element = $('.' + index, $card);

			$element.data('value', value);

			if ($element.children().length < 2) {
				$element.text(value);
			}
		});

		return $card;
	}

	/**
	 * @param sessionData object
	 * @param card element
	 * @returns object
	 */
	function addValuesFromParent(sessionData, card) {
		var cardParent = $(card).parent();

		if (cardParent.attr('id') === 'stash') {
			sessionData.slot = 0;
			sessionData.room = 0;
		} else {
			sessionData.slot = cardParent.data('slot');
			sessionData.room = cardParent.data('room');
		}

		return sessionData;
	}

	/**
	 * Create session card
	 *
	 * @param sessionData
	 * @return element
	 */
	function createSessionCard(sessionData) {
		var $card = getTemplateElement('sessionCardTemplate');

		$card = applySessionValuesToCard($card, sessionData);

		return $card;
	}

	/**
	 * @param sessionData
	 * @return void
	 */
	function updateSessionCard(sessionData) {
		var $card = $('.uid[data-value="' + sessionData.uid + '"]', '.sessionCard').parent();

		applySessionValuesToCard($card, sessionData);
	}

	/**
	 * @retrn void
	 */
	function closeModal() {
		$(this).dialog('close').remove();
	}

	/**
	 * @param card element
	 * @returns object
	 */
	function getDataFromCard(card) {
		var data = {};

		$(card).children().each(function() {
			var $element = $(this);
			data[$element.attr('class')] = $element.data('value');
		});

		return data;
	}


	/**
	 * @param response object
	 * @return void
	 */
	function createSessionSuccess(response) {
		sessionData.uid = response.data.uid;

		$stash.append(createSessionCard(sessionData));

		closeModal.apply(this);
	}

	/**
	 * @return void
	 */
	function updateSessionSuccess() {
		updateSessionCard(sessionData);

		closeModal.apply(this);
	}

	/**
	 * @return void
	 */
	function movedSessionSuccess() {
	}


	/**
	 * @return boolean
	 */
	function beforeSend() {
		var result = true;

		if (!ajaxActive) {
			ajaxActive = true;
			$(this).addClass('sending');
		} else {
			result = false;
		}

		return result;
	}

	/**
	 * @return void
	 */
	function afterSend() {
		ajaxActive = false;
		$(this).removeClass('sending');
	}


	/**
	 * @retrn void
	 */
	function createSession() {
		var createdSessionData = prepareData($('form', $newSession).serializeArray());
		sessionData = createdSessionData;

		$.ajax({
			type: 'POST',
			url: 'ajax.php',
			context: this,
			params: {},
			data: {
				ajaxID: 'Sessionplaner',
				id: $.getUrlVar('id'),
				tx_sessionplaner: {
					action: 'addSession',
					session: createdSessionData
				}
			},
			beforeSend: beforeSend,
			complete: afterSend,
			success: createSessionSuccess
		});
	}

	/**
	 * @return void
	 */
	function updateSession() {
		var editSessionData = prepareData($('form', $editSession).serializeArray());
		editSessionData.uid = sessionData.uid;
		sessionData = editSessionData;

		$.ajax({
			type: 'POST',
			url: 'ajax.php',
			context: this,
			params: {},
			data: {
				ajaxID: 'Sessionplaner',
				id: $.getUrlVar('id'),
				tx_sessionplaner: {
					action: 'updateSession',
					session: editSessionData
				}
			},
			beforeSend: beforeSend,
			complete: afterSend,
			success: updateSessionSuccess
		});
	}

	/**
	 * @return void
	 */
	function movedSession() {
		var movedSessionData = getDataFromCard(this);
		movedSessionData = addValuesFromParent(movedSessionData, this);
		sessionData = movedSessionData;

		$.ajax({
			type: 'POST',
			url: 'ajax.php',
			context: this,
			params: {},
			data: {
				ajaxID: 'Sessionplaner',
				id: $.getUrlVar('id'),
				tx_sessionplaner: {
					action: 'updateSession',
					session: movedSessionData
				}
			},
			beforeSend: beforeSend,
			complete: afterSend,
			success: movedSessionSuccess
		});
	}


	/**
	 * @return void
	 */
	function createNewSessionForm() {
		$newSession = getTemplateElement('session');
		$newSession.dialog({
			width: 440,
			height: 330,
			modal: true,
			buttons: {
				'Create a session': createSession,
				Cancel: closeModal
			}
		});
	}

	/**
	 * @return void
	 */
	function editSessionForm() {
		sessionData = getDataFromCard(this);

		$editSession = applySessionValuesToForm(getTemplateElement('session'), sessionData);
		$editSession.dialog({
			width: 440,
			height: 330,
			modal: true,
			buttons: {
				'Update session': updateSession,
				Cancel: closeModal
			}
		});
	}

	/**
	 * @return void
	 */
	function initializeDragAndDrop() {
		$('#stash, .active td.room')
			.droppable({
				scope: 'sessions',
				drop: function(event, ui) {
					$(ui.draggable).css({ top: 0, left: 0 }).appendTo($(this));
					movedSession.apply(ui.draggable[0]);
				}
			});

		$('.sessionCard')
			.disableSelection()
			.draggable({
				scope: 'sessions',
				connectToSortable: '#stash',
				snap: true,
				revert: 'invalid'
			});
	}


	$(document).ready(function() {
		$('#actions-document-new').click(createNewSessionForm);
		$(document).on('dblclick', '.sessionCard', editSessionForm);

		initializeDragAndDrop();
	});
})(jQuery);