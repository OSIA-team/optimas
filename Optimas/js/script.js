$(document).ready(function(){

		//oběřováné u přidání klienta
		$('#add-client-form').validate({
	    rules: {
	       nazev_firmy: {
	        required: true
	      },

	    },
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.form-group').removeClass('error').addClass('success');
			}
	  });

		//ověřování u přidávání jednatele
		$('#add_jednatel').validate({
	    rules: {
	       prijmeni: {
	        required: true
	      }

	    },
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.form-group').removeClass('error').addClass('success');
			}
	  });


		//ověřování u editace klienta
		$('#edit_klient').validate({
	    rules: {
	       nazev_firmy: {
	        required: true,
					minlength: 3
	      }

	    },
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.form-group').removeClass('error').addClass('success');
			}
	  });

		//ověřování u přidávání stroje
		$('#add_stroj').validate({
			rules: {
				  vyrobce: {
					required: true,
					minlength: 3
				},

				rokvyroby: {
				minlength: 4
			},

				 vyrobnicislo: {
				 required: true,
				 minlength: 5
			 }

			},
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.form-group').removeClass('error').addClass('success');
			}
		});

		//ověřování u editace stroje
		$('#edit_stroje').validate({
			rules: {
				  vyrobce: {
					required: true,
					minlength: 3
				},
				zakaznik: {
				minlength: 2
			},

				rokvyroby: {
				minlength: 4,
				required: false
				},

				 vyrobnicislo: {
				 required: true,
				 minlength: 5
			 }

			},
			highlight: function(element) {
				$(element).closest('.form-control').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.form-control').removeClass('error').addClass('success');
			}
		});


		//ověřování u přidání jendání
		$('#add_jednani').validate({
			rules: {
				 zakaznik: {
				minlength: 2,
				required: true
			  }
			},
			highlight: function(element) {
				$(element).closest('.form-control').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.form-control').removeClass('error').addClass('success');
			}
		});

		//ověřování u přidání nabídky
		$('#add_nabidka').validate({
			rules: {
				 zakaznik_name: {
				minlength: 2,
				required: true
				}
			},
			highlight: function(element) {
				$(element).closest('.form-control').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.form-control').removeClass('error').addClass('success');
			}
		});






}); // end document.ready
