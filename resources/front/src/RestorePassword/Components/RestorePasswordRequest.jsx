import axios from "axios";
import { push } from "connected-react-router";
import { unsuccessfulRequest } from "../RestorePasswordReducer.js";

export const sendRequest = (event) => {
    event.preventDefault();
    return (dispatch, getState) => {
        axios.post('http://localhost:9000/test.php', {
            login: getState().restorePassword.email
        })
        .then(res => {
            if(res.data) {
                dispatch(push('/authorization'));
            } else {
                dispatch(unsuccessfulRequest(false));
            }
            
        })
        .catch(err => {
            throw err;
        })
    }
}
