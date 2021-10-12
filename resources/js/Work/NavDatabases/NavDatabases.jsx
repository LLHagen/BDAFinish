import { NavLink } from 'react-router-dom';
import { connect } from 'react-redux';
import 'bootstrap/dist/css/bootstrap.min.css';
import css from './navDatabases.module.css';


function NavDatabases(props) {

	let navDatabases = props.navDatabases.map(el => {
		return(
			<NavLink to={el.linkUrl}>
				<div className={css.navItem}>
					<li className={``} key={el.id}>{el.linkName}</li>
				</div>
			</NavLink>
		)
	});

	return (
		<div className={`${props.className} ${css.wrapper}`} id="navbarCollapse">
		    <ul className={`navbar-nav ${css.sideNav}`} id="navAccordion">
		    	<header className={`${css.ulHeader}`}>Списки</header>	
		    	{navDatabases}
		    </ul>
	  </div>
	);
}

const mapStateToProps = (state) => {
	let s = state.work;
	return {
		navDatabases: s.navDatabases
	}
}


export default connect(mapStateToProps)(NavDatabases);