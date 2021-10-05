import axios from "axios";
import { push } from "connected-react-router";
import { unsuccessfulRequest } from "../RegistrationReducer.js";
import {SERVER_URL} from "../../constants";

export const sendRequest = (event) => {
    event.preventDefault();
    return (dispatch, getState) => {
        axios.post(SERVER_URL + '/registration', {
            email: getState().registration.email,
            password: getState().registration.password,
            firstName: getState().registration.firstName,
            lastName: getState().registration.secondName,
            // group: getState().registration.group
        })
        .then(res => {
            if(res.data) {
                dispatch(push('/work'));
            } else {
                dispatch(unsuccessfulRequest(false));
            }
        })
        .catch(err => {
            throw err;
        })
    }
}
