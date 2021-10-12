import { connect } from 'react-redux';
import { changeLogin, changePassword, changeIsRemembered } from '../../AuthorizationReducer.js';
import { sendRequest } from '../AuthorizationRequest.jsx';
import { NavLink } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';
import css from './signInForm.module.css';

function SignInForm(props) {
	return (
		<div className={`d-flex align-items-center ${css.wrapper}`}>
			<form onSubmit={props.sendRequest} className={`container	${css.inputForm}`}>
				<div className={`form-group ${css.formGroup}`}>
					<label htmlFor="inputEmail">Электронная почта</label>
					<input type="email" className="form-control" id="inputEmail" 
						   aria-describedby="emailHelp" placeholder="Ваша электронная почта" required
						   minlength="1" maxlength="50"
						   value={props.login} onChange={e => props.changeLogin(e)}
					/>
					<small id="emailHelp" className="form-text text-muted">Ваша электронная почта является Вашим логином для входа на сайт</small>
				</div>
				<div className={`form-group ${css.formGroup}`}>
					<label htmlFor="inputPassword">Пароль</label>
					<input type="password" className="form-control" id ="inputPassword" 
						   aria-describedby="passwordHelp" placeholder="Ваш пароль" required
						   minlength="1" maxlength="50"
						   value={props.password} onChange={e => props.changePassword(e)}
					/>
				</div>
				<div className={`form-group ${css.checkboxBlock}`}>
					<input type="checkbox" className="form-check-input" id="checkMemorizedAuthorization" 
						   value={props.isRemembered} onChange={e => props.changeIsRemembered(e)}
					/>
					<label htmlFor="checkMemorizedAuthorization" className="form-check-label">Запомнить меня на этом компьютере</label>
				</div>
				<div className={`row ${css.buttons}`}>
					<button type="submit" className={`btn btn-primary btn-lg col ${css.btn}`}>Авторизоваться</button>
					<NavLink to="/registration" className={`col btn btn-secondary btn-lg ${css.btn}`}>Зарегистрироваться</NavLink>
				</div>
				{/* <NavLink to="/restorePassword">Забыли пароль?</NavLink>	 */}
			</form>
		</div>
	);
}

const mapStateToProps = (state) => {
	let s = state;
	return {
		login: s.login,
		password: s.password,
		isRemembered: s.isRemembered
	}
}

const mapDispatchToProps = (dispatch) => {
	return {
		changeLogin: (e) => dispatch(changeLogin(e.target.value)),
		changePassword: (e) => dispatch(changePassword(e.target.value)),
		changeIsRemembered: (e) => dispatch(changeIsRemembered(e.target.value)),
		sendRequest : (e) => dispatch(sendRequest(e))
	}
}

export default connect(mapStateToProps, mapDispatchToProps)(SignInForm);