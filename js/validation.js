//Global variables to access across all methods, User Creation form fields, update form fields and errors is to validate the fields 
var firstname = "", lastName = "", middleName = "", phoneNumber = 0, emailId = "", password, confirmPasword, groupMaster, roleMaster, CountryMaster;
var upFirstName = "", upMiddleName = "", upLastName = "", upPhone = 0, upEmailId = "", upGroupMaster, upRoleMaster, upCountryMaster;
var groupName = "", groupDescription = "", createExistingUser, upGroupName = "", upDescription = "", updateExistingUser;
var errors = {"registration_errors":{}};

// This function is used to initialize Fields to validate and throw error
// messages
function initValidationFields(validationFields) {
	errors = validationFields;
}

// To check input field is empty or not
function isEmpty(inputid) {
	input = document.querySelector('#' + inputid).value;
	blockSpecialChar(input);
	if (input == null || input == "") {
		showError(inputid);
		return false;
	} else {
		hideError(inputid);
	}
}

// To validate the email field
function EmailIderror(inputid) {
	emailId = document.querySelector('#' + inputid).value;
	if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailId))) {
		showError(inputid)
	} else {
		hideError(inputid);
	}
}

// To validate the password field
function passworderror(inputid) {
	password = document.querySelector('#' + inputid).value;
	if (password.length < 6) {
		showError(inputid)
	} else {
		hideError(inputid);
	}
}

// To validate the confirm Password field
function confirmPasworderror(inputid) {
	password = document.createform.password.value;
	confirmPasword = document.querySelector('#' + inputid).value;
	if (confirmPasword == null || confirmPasword == ""
			|| !(confirmPasword == password)) {
		showError(inputid)
	} else {
		hideError(inputid);
	}
}


function resetcnfPasworderror(inputid) {
	password = document.changeForm.newPassword.value;
	confirmPasword = document.querySelector('#' + inputid).value;
	if (confirmPasword == null || confirmPasword == ""
			|| !(confirmPasword == password)) {
		showError(inputid)
	} else {
		hideError(inputid);
	}
}

// To validate the phone Number field
function phoneNumbererror(inputid) {
	var phoneNumberPattern = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
	phoneNumber = document.querySelector('#' + inputid).value;
	
	if (isNaN(phoneNumber)) {
		showError(inputid);
	}
	if (phoneNumberPattern.test(phoneNumber)) {
		hideError(inputid);
	} else {
		showError(inputid);
	}
}

// To hide the error messages
function hideError(inputid) {
	errors[inputid] = true;
	$('.' + inputid + '-alert').hide();
	$('#' + inputid).css('border-bottom', '1px solid #ccc');
}

//To show the error messages
function showError(inputid) {
	errors[inputid] = false;
	$('.' + inputid + '-alert').show();
	$('#' + inputid).css('border', '1px solid #ed1c24');
	setTimeout(function() { $('.' + inputid + '-alert').hide();
	$('#' + inputid).css('border', '1px solid #ccc');}, 5000);
};

//To block the special characters
function blockSpecialChar(inputText) {
	var k = inputText.keyCode;
	return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || (k >= 48 && k <= 57));
}

// To allow only numeric characters
function allowNumeric(inputText) {
	//var phoneNumberEntered=document.querySelector('#' + inputText).value;
	var key = inputText.keyCode;
	return (key == 8 || key == 9 ||key == 13 || (key >= 48 && key <= 57) );
  
} 
