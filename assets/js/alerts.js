(function ($) {
	showSuccessToast = function () {
		'use strict';
		resetToastPosition();
		$.toast({
			heading: 'Success',
			text: 'Data berhasil ditambahkan!',
			showHideTransition: 'slide',
			icon: 'success',
			loaderBg: '#f96868',
			position: 'top-right',
			hideAfter: 5000
		})
	};
	showInfoToast = function () {
		'use strict';
		resetToastPosition();
		$.toast({
			heading: 'Info',
			text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
			showHideTransition: 'slide',
			icon: 'info',
			loaderBg: '#46c35f',
			position: 'top-right'
		})
	};
	showWarningToast = function () {
		'use strict';
		resetToastPosition();
		$.toast({
			heading: 'Warning',
			text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
			showHideTransition: 'slide',
			icon: 'warning',
			loaderBg: '#57c7d4',
			position: 'top-right'
		})
	};
	showDangerToast = function () {
		'use strict';
		resetToastPosition();
		$.toast({
			heading: 'Error!',
			text: 'Data gagal disimpan ke database!',
			showHideTransition: 'slide',
			icon: 'error',
			loaderBg: '#f2a654',
			position: 'top-right'
		})
	};

	// Toast Tambahan
	showLoginFailToast = function () {
		'use strict';
		resetToastPosition();
		$.toast({
			heading: 'Gagal',
			text: 'USERNAME atau PASSWORD yang anda masukkan salah!',
			showHideTransition: 'slide',
			icon: 'error',
			loaderBg: '#f2a654',
			position: 'top-right',
			hideAfter: 5000
		})
	};
	showLogoutToast = function () {
		'use strict';
		resetToastPosition();
		$.toast({
			heading: 'Success',
			text: 'Anda telah logout!',
			showHideTransition: 'slide',
			icon: 'success',
			loaderBg: '#f96868',
			position: 'top-right',
			hideAfter: 5000
		})
	};
	deleteSuccessToast = function () {
		'use strict';
		resetToastPosition();
		$.toast({
			heading: 'Success',
			text: 'Data berhasil dihapus!',
			showHideTransition: 'slide',
			icon: 'success',
			loaderBg: '#f96868',
			position: 'top-right',
			hideAfter: 5000
		})
	};
	deleteFailToast = function () {
		'use strict';
		resetToastPosition();
		$.toast({
			heading: 'Error!',
			text: 'Data gagal dihapus!',
			showHideTransition: 'slide',
			icon: 'error',
			loaderBg: '#f2a654',
			position: 'top-right',
			hideAfter: 5000
		})
	};
	updateSuccessToast = function () {
		'use strict';
		resetToastPosition();
		$.toast({
			heading: 'Success',
			text: 'Data berhasil diubah!',
			showHideTransition: 'slide',
			icon: 'success',
			loaderBg: '#f96868',
			position: 'top-right',
			hideAfter: 5000
		})
	};
	updateFailToast = function () {
		'use strict';
		resetToastPosition();
		$.toast({
			heading: 'Error!',
			text: 'Data gagal diubah!',
			showHideTransition: 'slide',
			icon: 'error',
			loaderBg: '#f2a654',
			position: 'top-right',
			hideAfter: 5000
		})
	};

	showToastPosition = function (position) {
		'use strict';
		resetToastPosition();
		$.toast({
			heading: 'Positioning',
			text: 'Specify the custom position object or use one of the predefined ones',
			position: String(position),
			icon: 'success',
			stack: false,
			loaderBg: '#f96868'
		})
	}
	showToastInCustomPosition = function () {
		'use strict';
		resetToastPosition();
		$.toast({
			heading: 'Custom positioning',
			text: 'Specify the custom position object or use one of the predefined ones',
			icon: 'success',
			position: {
				left: 120,
				top: 120
			},
			stack: false,
			loaderBg: '#f96868'
		})
	}
	resetToastPosition = function () {
		$('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
		$(".jq-toast-wrap").css({
			"top": "",
			"left": "",
			"bottom": "",
			"right": ""
		}); //to remove previous position style
	}
})(jQuery);
