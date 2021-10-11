import { createStore, combineReducers, applyMiddleware } from 'redux';
import thunk from 'redux-thunk';
import registrationReducer from './Registration/RegistrationReducer.js';
import authorizationReducer from './Authorization/AuthorizationReducer.js';
import workReducer from './Work/WorkReducer.js';
import restorePasswordReducer from './RestorePassword/RestorePasswordReducer.js';


const rootReducer = combineReducers({
	registration: registrationReducer,
	authorization: authorizationReducer,
	work: workReducer,
	restorePassword: restorePasswordReducer
});


let store = createStore(rootReducer, applyMiddleware(thunk));

export default store;