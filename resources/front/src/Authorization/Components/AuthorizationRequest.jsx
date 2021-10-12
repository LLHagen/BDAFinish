import axios from 'axios';
import { getAnswerFromServer } from '../AuthorizationReducer.js';
import {SERVER_URL} from "../../constants";

export const sendRequest = (event) => {
    event.preventDefault(); // Отключение перезагрузки страницы (redux с помощью thunk сам обрабатывает асинхронное изменение как синхронное)
    return (dispatch, getState) => {
        axios.post(SERVER_URL + '/authorization', {
            login: getState().authorization.login,
            password: getState().authorization.password,
        })
        .then(res => {
            dispatch(getAnswerFromServer(res.data)); // Предполагается, что приходит ответ в виде true / false (не json)
        })
        .catch(err => {
            throw err;
        })
        
        
    }
    // TODO: удалить лишний файл
}