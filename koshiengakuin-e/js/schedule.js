(function ($) {
	'use strict';

	var SP_MAX = 828;
	var $switcher = $('.p-schedule_music__switcher');
	var mode = null;

	if (!$switcher.length) return;

	function isSp() {
		return window.matchMedia('(max-width: ' + SP_MAX + 'px)').matches;
	}

	function getItems() {
		return $switcher.find('.p-schedule_music__item');
	}

	function setItemState($item, open) {
		$item.toggleClass('is-active', open);
		$item.find('.p-schedule_music__trigger').attr('aria-expanded', open);
		$item.find('.p-schedule_music__panel').prop('hidden', !open);
	}

	function openItem($item) {
		getItems().not($item).each(function () {
			setItemState($(this), false);
		});
		setItemState($item, true);
	}

	function applyPcMode() {
		var $active = getItems().filter('.is-active').first();

		if (!$active.length) {
			openItem(getItems().first());
			return;
		}

		getItems().each(function () {
			setItemState($(this), $(this).is($active));
		});
	}

	function applySpMode() {
		getItems().each(function () {
			setItemState($(this), false);
		});
	}

	function syncMode() {
		var sp = isSp();
		var nextMode = sp ? 'sp' : 'pc';

		if (mode === null) {
			mode = nextMode;

			if (sp) {
				applySpMode();
			} else {
				applyPcMode();
			}

			return;
		}

		if (nextMode === mode) {
			return;
		}

		mode = nextMode;

		if (sp) {
			applySpMode();
		} else {
			applyPcMode();
		}
	}

	$switcher.on('click', '.p-schedule_music__trigger', function () {
		var $item = $(this).closest('.p-schedule_music__item');
		var isOpen = $item.hasClass('is-active');

		if (isSp()) {
			setItemState($item, !isOpen);
			return;
		}

		openItem($item);
	});

	syncMode();
	$(window).on('resize', syncMode);
})(jQuery);
