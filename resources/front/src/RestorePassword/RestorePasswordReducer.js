const ACTION_CHANGE_EMAIL = 'ACTION_CHANGE_EMAIL';
const ACTION_UNSUCCESSFUL_REQUEST = 'ACTION_UNSUCCESSFUL_REQUEST';

const initialState = {
	email: ""
}

export const changeEmail = (newEmail) => {
	return {
		type: ACTION_CHANGE_EMAIL,
		data: newEmail
	}
}

export const unsuccessfulRequest = (unsuccess) => {
	alert('Что-то пошло не так.')
	return {
		type: ACTION_UNSUCCESSFUL_REQUEST,
		data: unsuccess
	}
}

function RestorePasswordReducer(state = initialState, action) {
	switch(action.type) {
		case ACTION_CHANGE_EMAIL:
			return Object.assign({}, state, {email: action.data});
		case ACTION_UNSUCCESSFUL_REQUEST:
			return state;
		default:
			return state;
	}
}

export default RestorePasswordReducer;