import { NavLink } from 'react-router-dom';
import { connect } from 'react-redux';
import { changeEmail, changeFirstName, changeSecondName,
				 changePassword, changeRepeatedPassword, changeGroup } from './RegistrationReducer.js';

import { sendRequest } from './Components/RegistrationRequest.jsx';
import 'bootstrap/dist/css/bootstrap.min.css';
import css from './registration.module.css';

function Registration(props) {
	return (
		<div className={`d-flex align-items-center ${css.wrapper}`}>
			<NavLink className={`btn btn-primary`} to="/authorization">Назад</NavLink>
			<form onSubmit={props.sendRequest} className={`col-xl-4 ${css.inputForm}`}>
				<div className={`form-group ${css.formGroup}`}>
					<label htmlFor="inputEmail">Электронная почта</label>
					<input type="email" className="form-control" 
								 id="inputEmail" aria-describedby="emailHelp" 
								 placeholder="Ваша электронная почта"
						   		 minlength="1" maxlength="50"
								 value={props.email} 
								 onChange={e => props.changeEmail(e)}
								 />
					<small id="emailHelp" className="form-text text-muted">Ваша электронная почта является Вашим логином для входа на сайт</small>
				</div>
				<div className={`form-group ${css.formGroup}`}>
					<label htmlFor="inputFirstName">Ваше имя</label>
					<input type="text" className="form-control" 
								 id="inputFirstName"
								 placeholder="Ваше имя"
						         minlength="1" maxlength="40"
								 value={props.firstName} onChange={e => props.changeFirstName(e)}
								 />
				</div>
				<div className={`form-group ${css.formGroup}`}>
					<label htmlFor="inputSecondName">Ваша фамилия</label>
					<input type="text" className="form-control" 
								 id="inputSecondName"
								 placeholder="Ваша фамилия"
						     	 minlength="1" maxlength="40"
								 value={props.secondName} onChange={e => props.changeSecondName(e)}
								 />
				</div>
				{/* <div className={`form-group ${css.formGroup}`}>
					<label htmlFor="inputGroup">Ссылка на отряд</label>
					<input type="url" className="form-control" 
								 id="inputGroup" 
								 placeholder="URL-адрес отряда" 
								 value={props.group} onChange={e => props.changeGroup(e)}
								 />
				</div> */}
				<div className={`form-group ${css.formGroup}`}>
					<label htmlFor="inputPassword">Пароль</label>
					<input type="password" className="form-control" 
								 id ="inputPassword" aria-describedby="passwordHelp" 
								 placeholder="Ваш пароль"
						   		 minlength="1" maxlength="50"
								 value={props.password} onChange={e => props.changePassword(e)}
								 />
				</div>
				<div className={`form-group ${css.formGroup}`}>
					<label htmlFor="inputPassword">Подтвердите пароль</label>
					<input type="password" className="form-control" 
								 id ="inputRepeatedPassword" aria-describedby="passwordHelp" 
								 placeholder="Повторите пароль"
						   		 minlength="1" maxlength="50"
								 value={props.repeatedPassword} onChange={e => props.changeRepeatedPassword(e)}
								 />
				</div>
				<button type="submit" className={`btn btn-primary btn-lg col ${css.btn}`}>Зарегистрироваться</button>
			</form>
		</div>
	);
}

const mapDispatchToProps = (dispatch) => {
	return {
		changeEmail: (e) => dispatch(changeEmail(e.target.value)),
		changeFirstName: (e) => dispatch(changeFirstName(e.target.value)),
		changeSecondName: (e) => dispatch(changeSecondName(e.target.value)),
		// changeGroup: (e) => dispatch(changeGroup(e.target.value)),
		changePassword: (e) => dispatch(changePassword(e.target.value)),
		changeRepeatedPassword: (e) => dispatch(changeRepeatedPassword(e.target.value)),
		sendRequest: (e) => dispatch(sendRequest(e)),
	}
}

const mapStateToProps = (state) => {
	let s = state.registration;
	return {
		email: s.email,
		firstName: s.firstName,
		secondName: s.secondName,
		group: s.group,
		password: s.password,
		repeatedPassword: s.repeatedPassword,
	}
}

export default connect(mapStateToProps, mapDispatchToProps)(Registration);