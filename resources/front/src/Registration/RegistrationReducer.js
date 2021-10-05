const ACTION_CHANGE_EMAIL = 'ACTION_CHANGE_EMAIL';
const ACTION_CHANGE_FIRST_NAME = 'ACTION_CHANGE_FIRST_NAME';
const ACTION_CHANGE_SECOND_NAME = 'ACTION_CHANGE_SECOND_NAME';
const ACTION_CHANGE_PASSWORD = 'ACTION_CHANGE_PASSWORD';
const ACTION_CHANGE_REPEATED_PASSWORD = 'ACTION_CHANGE_REPEATED_PASSWORD';
const ACTION_CHANGE_GROUP = 'ACTION_CHANGE_GROUP';
const ACTION_UNSUCCESSFUL_REQUEST = 'ACTION_UNSUCCESSFUL_REQUEST';


const initialState = {
	email : "",
	firstName : "",
	secondName : "",
	group: "",
	password : "",
	repeatedPassword: "",
}

export const changeEmail = (newEmail) => {
	return {
		type: ACTION_CHANGE_EMAIL,
		data: newEmail
	}
}

export const changeFirstName = (newFirstName) => {
	return {
		type: ACTION_CHANGE_FIRST_NAME,
		data: newFirstName
	}
}

export const changeSecondName = (newSecondName) => {
	return {
		type: ACTION_CHANGE_SECOND_NAME,
		data: newSecondName
	}
}

export const changePassword = (newPassword) => {
	return {
		type: ACTION_CHANGE_PASSWORD,
		data: newPassword
	}
}

export const changeGroup = (newGroup) => {
	return {
		type: ACTION_CHANGE_GROUP,
		data: newGroup
	}
}

export const changeRepeatedPassword = (newRepeatedPassword) => {
	return {
		type: ACTION_CHANGE_REPEATED_PASSWORD,
		data: newRepeatedPassword
	}
}

export const unsuccessfulRequest = (unsuccess) => {
	alert('Неудачная попытка регистрации, что-то пошло не так.');
	return {
		type: ACTION_UNSUCCESSFUL_REQUEST,
		data: unsuccess
	}
}

function RegistrationReducer(state = initialState, action) {
	switch(action.type) {
		case ACTION_CHANGE_EMAIL:
			return Object.assign({}, state, {email: action.data});
		case ACTION_CHANGE_FIRST_NAME:
			return Object.assign({}, state, {firstName: action.data});
		case ACTION_CHANGE_SECOND_NAME:
			return Object.assign({}, state, {secondName: action.data});
		case ACTION_CHANGE_PASSWORD:
			return Object.assign({}, state, {password: action.data});
		case ACTION_CHANGE_REPEATED_PASSWORD:
			return Object.assign({}, state, {repeatedPassword: action.data});
		case ACTION_CHANGE_GROUP:
			return Object.assign({}, state, {group: action.data});
		case ACTION_UNSUCCESSFUL_REQUEST:
			return state;
		default: 
			return state; 
	}
}

export default RegistrationReducer;