import SignInForm from './SignInForm/SignInForm.jsx';
import css from './authorization.module.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import { connect } from 'react-redux';



function Authorization(props) {
	return (
		<div className={`row ${css.wrapper}`}>
			<div className={`col ${css.leftBlock}`}>
				<img src={props.leftImage} className={css.leftImage} alt={"Some beautiful thing"}/>
			</div>
			<div className={`col ${css.signInForm}`}>
				<SignInForm />
			</div>
		</div>
	);
}

const mapStateToProps = (state) => {
	let s = state.authorization;
	return {
		leftImage: s.leftImage
	}
}



export default connect(mapStateToProps)(Authorization);