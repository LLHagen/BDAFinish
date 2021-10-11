import { connect } from 'react-redux';
import { NavLink } from 'react-router-dom';
import { changeEmail } from './RestorePasswordReducer.js';
import { sendRequest } from './Components/RestorePasswordRequest.jsx';
import 'bootstrap/dist/css/bootstrap.min.css';
import css from './restorePassword.module.css'



function RestorePassword(props) {
	return (
		<div className={`d-flex align-items-center ${css.wrapper}`}>
			<NavLink className={`btn btn-primary`} to="/authorization">Назад</NavLink>
			<form onSubmit={props.sendRequest} className={`col-xl-4 ${css.inputForm}`}>
				<div className={`form-group ${css.formGroup}`}>
					<label htmlFor="inputEmail">Электронная почта</label>
					<input type="email" 
								 className="form-control" 
								 id="inputEmail" 
								 aria-describedby="emailHelp" 
								 placeholder="Ваша электронная почта" 
								 value={props.email} 
								 onChange={e => props.changeEmail(e)}
								 />
				</div>
				<button type="submit" className={`btn btn-primary btn-lg col ${css.btn}`}>Восстановить пароль</button>
			</form>
		</div>
	);
}

const mapStateToProps = (state) => {
	let s = state.restorePassword;
	return {
		email: s.email
	}
}

const mapDispatchToProps = (dispatch) => {
	return {
		changeEmail: (e) => dispatch(changeEmail(e.target.value)),
		sendRequest: (e) => dispatch(sendRequest(e)) 
	}
}

export default connect(mapStateToProps, mapDispatchToProps)(RestorePassword);