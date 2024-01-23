"use strict";

// Class definition
var KTWizard1 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _validations = [];

	// Private functions
	var _initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					FLD_BURKS: {
						validators: {
							notEmpty: {
								message: 'Company Code is required'
							}
						}
					},
					FLD_EKORG: {
						validators: {
							notEmpty: {
								message: 'Purchasing Organization is required'
							}
						}
					},
					FLD_NAME1: {
						validators: {
							notEmpty: {
								message: 'Name 1 is required'
							}
						}
					},
					FLD_COMP: {
						validators: {
							notEmpty: {
								message: 'Company is required'
							}
						}
					},
					FLD_CONTP: {
						validators: {
							notEmpty: {
								message: 'Contact Name is required'
							}
						}
					},
					FLD_EMAIL: {
						validators: {
							notEmpty: {
								message: 'Email is required'
							}
						}
					},
					FLD_SITE: {
						validators: {
							notEmpty: {
								message: 'Company site is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					
					FLL_COMC: {
						validators: {
							notEmpty: {
								message: 'Communication Channel is required'
							}
							
						}
					},
					FLD_CITY: {
						validators: {
							notEmpty: {
								message: 'City is required'
							}
						}
					},
					
					FLD_LANDX: {
						validators: {
							notEmpty: {
								message: 'Country is required'
							}
							
						}
					}
					
					
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					FLD_CURR: {
						validators: {
							notEmpty: {
								message: 'Currency is required'
							}
						}
					},
					FLD_BANKN: {
						validators: {
							notEmpty: {
								message: 'Account No is required'
							},
							digits: {
								message: 'The value added is not valid'
							}
						}
					},
					FLD_KOINH: {
						validators: {
							notEmpty: {
								message: 'Account Holder Name is required'
							}
							
						}
					},
					FLD_AKONT: {
						validators: {
							notEmpty: {
								message: 'GL Account is required'
							}
							
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		
	}

	var _initWizard = function () {
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: false  // allow step clicking
		});

		// Validation before going to next page
		_wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goTo(wizard.getNewStep());

						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		_wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});

		// Submit event
		_wizardObj.on('submit', function (wizard) {
			Swal.fire({
				text: "All is good! Please confirm the form submission.",
				icon: "success",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, submit!",
				cancelButtonText: "No, cancel",
				customClass: {
					confirmButton: "btn font-weight-bold btn-primary",
					cancelButton: "btn font-weight-bold btn-default"
				}
			}).then(function (result) {
				if (result.value) {
					_formEl.submit(); // Submit form
				} else if (result.dismiss === 'cancel') {
					Swal.fire({
						text: "Your form has not been submitted!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-primary",
						}
					});
				}
			});
		});
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard');
			_formEl = KTUtil.getById('kt_form');

			_initValidation();
			_initWizard();
		}
	};
}();

jQuery(document).ready(function () {
	KTWizard1.init();
});
