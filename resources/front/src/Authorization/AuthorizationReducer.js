import {SERVER_URL} from "../constants";
import axios from 'axios';

const ACTION_CHANGE_LOGIN = 'ACTION_CHANGE_LOGIN';
const ACTION_CHANGE_PASSWORD = 'ACTION_CHANGE_PASSWORD';
const ACTION_CHANGE_IS_REMEMBERED = 'ACTION_CHANGE_IS_REMEMBERED';
const ACTION_GET_ANSWER_FROM_SERVER = 'ACTION_GET_ANSWER_FROM_SERVER';

const initialState = {
	login: null,
	password: null,
	isRemembered: null,

	leftImage : '/img/authorizationImg2.jpg',

	isAuthorized: true,
	userName: 'Даниил Скворцов'
}

export const changeLogin = (newLogin) => {
	return {
		type: ACTION_CHANGE_LOGIN,
		data: newLogin
	}
}

export const changePassword = (newPassword) => {
	return {
		type: ACTION_CHANGE_PASSWORD,
		data: newPassword
	}
}

export const changeIsRemembered = (newValue) => {
	return {
		type: ACTION_CHANGE_IS_REMEMBERED,
		data: newValue
	}
}

export const getAnswerFromServer = (data) => {
	return {
		type: ACTION_GET_ANSWER_FROM_SERVER,
		data: data
	}
}

function AuthorizationReducer(state = initialState, action) {
	switch(action.type) {
		case ACTION_CHANGE_LOGIN:
			return Object.assign({}, state, {login: action.data});
		case ACTION_CHANGE_PASSWORD:
			return Object.assign({}, state, {password: action.data});
		case ACTION_CHANGE_IS_REMEMBERED:
			return Object.assign({}, state, {isRemembered: action.data});
		case ACTION_GET_ANSWER_FROM_SERVER:
			return Object.assign({}, state, {isAuthorized: action.data}); //TODO: доработать
		default: 
			return state;
	}
}


export default AuthorizationReducer;