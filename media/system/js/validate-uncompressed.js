/**
<<<<<<< HEAD
 * @copyright	Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
=======
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
>>>>>>> FETCH_HEAD
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * Unobtrusive Form Validation library
 *
 * Inspired by: Chris Campbell <www.particletree.com>
 *
 * @since  1.5
 */
<<<<<<< HEAD
var JFormValidator = function() {
	"use strict";
	var handlers, inputEmail, custom,

 	setHandler = function(name, fn, en) {
 	 	en = (en === '') ? true : en;
 	 	handlers[name] = {
 	 	 	enabled : en,
 	 	 	exec : fn
 	 	};
 	},

 	findLabel = function(id, form){
 	 	var $label, $form = jQuery(form);
 	 	if (!id) {
 	 	 	return false;
 	 	}
 	 	$label = $form.find('#' + id + '-lbl');
 	 	if ($label.length) {
 	 	 	return $label;
 	 	}
 	 	$label = $form.find('label[for="' + id + '"]');
 	 	if ($label.length) {
 	 	 	return $label;
 	 	}
 	 	return false;
 	},

 	handleResponse = function(state, $el) {
 		// Get a label
 	 	var $label = $el.data('label');
 	 	if($label === undefined){
 	 		$label = findLabel($el.attr('id'), $el.data('form'));
 	 		$el.data('label', $label);
 	 	}

 	 	// Set the element and its label (if exists) invalid state
 	 	if (state === false) {
 	 	 	$el.addClass('invalid').attr('aria-invalid', 'true');
 	 	 	if($label){
 	 	 	 	$label.addClass('invalid').attr('aria-invalid', 'true');
 	 	 	}
 	 	} else {
 	 	 	$el.removeClass('invalid').attr('aria-invalid', 'false');
 	 	 	if($label){
 	 	 	 	$label.removeClass('invalid').attr('aria-invalid', 'false');
 	 	 	}
 	 	}
 	},

 	validate = function(el) {
 	 	var $el = jQuery(el), tagName, handler;
 	 	// Ignore the element if its currently disabled, because are not submitted for the http-request. For those case return always true.
 	 	if ($el.attr('disabled')) {
 	 	 	handleResponse(true, $el);
 	 	 	return true;
 	 	}
 	 	// If the field is required make sure it has a value
 	 	if ($el.attr('required') || $el.hasClass('required')) {
 	 	 	tagName = $el.prop("tagName").toLowerCase();
 	 	 	if (tagName === 'fieldset' && ($el.hasClass('radio') || $el.hasClass('checkboxes'))) {
 	 	 	 	if (!$el.find('input:checked').length){
 	 	 	 	 	handleResponse(false, $el);
 	 	 	 	 	return false;
 	 	 	 	}
 	 	 	//If element has class placeholder that means it is empty.
 	 	 	} else if (!$el.val() || $el.hasClass('placeholder') || ($el.attr('type') === 'checkbox' && !$el.is(':checked'))) {
 	 	 	 	handleResponse(false, $el);
 	 	 	 	return false;
 	 	 	}
 	 	}
 	 	// Only validate the field if the validate class is set
 	 	handler = ($el.attr('class') && $el.attr('class').match(/validate-([a-zA-Z0-9\_\-]+)/)) ? $el.attr('class').match(/validate-([a-zA-Z0-9\_\-]+)/)[1] : "";
 	 	if (handler === '') {
 	 	 	handleResponse(true, $el);
 	 	 	return true;
 	 	}
 	 	// Check the additional validation types
 	 	if ((handler) && (handler !== 'none') && (handlers[handler]) && $el.val()) {
 	 	 	// Execute the validation handler and return result
 	 	 	if (handlers[handler].exec($el.val(), $el) !== true) {
 	 	 	 	handleResponse(false, $el);
 	 	 	 	return false;
 	 	 	}
 	 	}
 	 	// Return validation state
 	 	handleResponse(true, $el);
 	 	return true;
 	},

 	isValid = function(form) {
 	 	var valid = true, i, message, errors, error, label;
 	 	// Validate form fields
 	 	jQuery.each(jQuery(form).find('input, textarea, select, fieldset, button'), function(index, el) {
 	 	 	if (validate(el) === false) {
 	 	 	 	valid = false;
 	 	 	}
 	 	});
 	 	// Run custom form validators if present
 	 	jQuery.each(custom, function(key, validator) {
 	 	 	if (validator.exec() !== true) {
 	 	 	 	valid = false;
 	 	 	}
 	 	});
 	 	if (!valid) {
 	 	 	message = Joomla.JText._('JLIB_FORM_FIELD_INVALID');
 	 	 	errors = jQuery("input.invalid, textarea.invalid, select.invalid, fieldset.invalid, button.invalid");
 	 	 	error = {};
 	 	 	error.error = [];
 	 	 	for ( i = 0; i < errors.length; i++) {
 	 	 	 	label = jQuery('label[for=' + errors[i].id + ']').text();
 	 	 	 	if (label !== 'undefined') {
 	 	 	 	 	error.error[i] = message + label.replace("*", "");
 	 	 	 	}
 	 	 	}
 	 	 	Joomla.renderMessages(error);
 	 	}
 	 	return valid;
 	},

 	attachToForm = function(form) {
 	 	var inputFields = [],
 	 		$form = jQuery(form);
 	 	// Iterate through the form object and attach the validate method to all input fields.
 	 	$form.find('input, textarea, select, fieldset, button').each(function() {
 	 	 	var $el = jQuery(this), tagName = $el.prop("tagName").toLowerCase();
 	 	 	if ($el.hasClass('required')) {
 	 	 	 	$el.attr('aria-required', 'true').attr('required', 'required');
 	 	 	}
 	 	 	if ((tagName === 'input' || tagName === 'button') && $el.attr('type') === 'submit') {
 	 	 	 	if ($el.hasClass('validate')) {
 	 	 	 	 	$el.on('click', function() {
 	 	 	 	 	 	return isValid(form);
 	 	 	 	 	});
 	 	 	 	}
 	 	 	} else {
 	 	 	 	if (tagName !== 'fieldset') {
 	 	 	 	 	$el.on('blur', function() {
 	 	 	 	 	 	return validate(this);
 	 	 	 	 	});
 	 	 	 	 	if ($el.hasClass('validate-email') && inputEmail) {
 	 	 	 	 	 	$el.get(0).type = 'email';
 	 	 	 	 	}
 	 	 	 	}
 	 	 	 	$el.data('form', $form);
 	 	 	 	inputFields.push($el);
 	 	 	}
 	 	});
 	 	$form.data('inputfields', inputFields);
 	},

 	initialize = function() {
 	 	handlers = {};
 	 	custom = custom || {};

 	 	inputEmail = (function() {
 	 	 	var input = document.createElement("input");
 	 	 	input.setAttribute("type", "email");
 	 	 	return input.type !== "text";
 	 	})();
 	 	// Default handlers
 	 	setHandler('username', function(value, element) {
 	 	 	var regex = new RegExp("[\<|\>|\"|\'|\%|\;|\(|\)|\&]", "i");
 	 	 	return !regex.test(value);
 	 	});
 	 	setHandler('password', function(value, element) {
 	 	 	var regex = /^\S[\S ]{2,98}\S$/;
 	 	 	return regex.test(value);
 	 	});
 	 	setHandler('numeric', function(value, element) {
 	 		var regex = /^(\d|-)?(\d|,)*\.?\d*$/;
 	 	 	return regex.test(value);
 	 	});
 	 	setHandler('email', function(value, element) {
		    value = punycode.toASCII(value);
 	 	 	var regex = /^[a-zA-Z0-9.!#$%&’*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
 	 	 	return regex.test(value);
 	 	});
 	 	// Attach to forms with class 'form-validate'
 	 	jQuery('form.form-validate').each(function() {
 	 	 	attachToForm(this);
 	 	});
 	};

 	// Initialize handlers and attach validation to form
 	initialize();

 	return {
 	 	isValid : isValid,
 	 	validate : validate,
 	 	setHandler : setHandler,
 	 	attachToForm : attachToForm,
 	 	custom: custom
 	};
};
=======
var JFormValidator = new Class({
	initialize: function()
	{
		// Initialize variables
		this.handlers	= Object();
		this.custom		= Object();

		// Default handlers
		this.setHandler('username',
			function (value) {
				regex = new RegExp("[\<|\>|\"|\'|\%|\;|\(|\)|\&]", "i");
				return !regex.test(value);
			}
		);

		this.setHandler('password',
			function (value) {
				regex=/^\S[\S ]{2,98}\S$/;
				return regex.test(value);
			}
		);

		this.setHandler('numeric',
			function (value) {
				regex=/^(\d|-)?(\d|,)*\.?\d*$/;
				return regex.test(value);
			}
		);

		this.setHandler('email',
			function (value) {
				regex=/^[a-zA-Z0-9.!#$%&’*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
				return regex.test(value);
			}
		);

		// Attach to forms with class 'form-validate'
		var forms = $$('form.form-validate');
		forms.each(function(form){ this.attachToForm(form); }, this);
	},

	setHandler: function(name, fn, en)
	{
		en = (en == '') ? true : en;
		this.handlers[name] = { enabled: en, exec: fn };
	},

	attachToForm: function(form)
	{
		// Iterate through the form object and attach the validate method to all input fields.
		form.getElements('input,textarea,select,button').each(function(el){
			if (el.hasClass('required')) {
				el.set('aria-required', 'true');
				el.set('required', 'required');
			}
			if ((document.id(el).get('tag') == 'input' || document.id(el).get('tag') == 'button') && document.id(el).get('type') == 'submit') {
				if (el.hasClass('validate')) {
					el.onclick = function(){return document.formvalidator.isValid(this.form);};
				}
			} else {
				el.addEvent('blur', function(){return document.formvalidator.validate(this);});
				if (el.hasClass('validate-email') && Browser.Features.inputemail) {
					el.type = 'email';
				}
			}
		});
	},

	validate: function(el)
	{
		el = document.id(el);

		// Ignore the element if its currently disabled, because are not submitted for the http-request. For those case return always true.
		if(el.get('disabled') && !(el.hasClass('required'))) {
			this.handleResponse(true, el);
			return true;
		}

		// If the field is required make sure it has a value
		if (el.hasClass('required')) {
			if (el.get('tag')=='fieldset' && (el.hasClass('radio') || el.hasClass('checkboxes'))) {
				for(var i=0;;i++) {
					if (document.id(el.get('id')+i)) {
						if (document.id(el.get('id')+i).checked) {
							break;
						}
					}
					else {
						this.handleResponse(false, el);
						return false;
					}
				}
			}
			else if (!(el.get('value'))) {
				this.handleResponse(false, el);
				return false;
			}
		}

		// Only validate the field if the validate class is set
		var handler = (el.className && el.className.search(/validate-([a-zA-Z0-9\_\-]+)/) != -1) ? el.className.match(/validate-([a-zA-Z0-9\_\-]+)/)[1] : "";
		if (handler == '') {
			this.handleResponse(true, el);
			return true;
		}

		// Check the additional validation types
		if ((handler) && (handler != 'none') && (this.handlers[handler]) && el.get('value')) {
			// Execute the validation handler and return result
			if (this.handlers[handler].exec(el.get('value')) != true) {
				this.handleResponse(false, el);
				return false;
			}
		}

		// Return validation state
		this.handleResponse(true, el);
		return true;
	},

	isValid: function(form)
	{
		var valid = true;

		// Validate form fields
		var elements = form.getElements('fieldset').concat(Array.from(form.elements));
		for (var i=0;i < elements.length; i++) {
			if (this.validate(elements[i]) == false) {
				valid = false;
			}
		}

		// Run custom form validators if present
		new Hash(this.custom).each(function(validator){
			if (validator.exec() != true) {
				valid = false;
			}
		});

		return valid;
	},

	handleResponse: function(state, el)
	{
		// Find the label object for the given field if it exists
		if (!(el.labelref)) {
			var labels = $$('label');
			labels.each(function(label){
				if (label.get('for') == el.get('id')) {
					el.labelref = label;
				}
			});
		}

		// Set the element and its label (if exists) invalid state
		if (state == false) {
			el.addClass('invalid');
			el.set('aria-invalid', 'true');
			if (el.labelref) {
				document.id(el.labelref).addClass('invalid');
				document.id(el.labelref).set('aria-invalid', 'true');
			}
		} else {
			el.removeClass('invalid');
			el.set('aria-invalid', 'false');
			if (el.labelref) {
				document.id(el.labelref).removeClass('invalid');
				document.id(el.labelref).set('aria-invalid', 'false');
			}
		}
	}
});
>>>>>>> FETCH_HEAD

document.formvalidator = null;
jQuery(function() {
	document.formvalidator = new JFormValidator();
});
