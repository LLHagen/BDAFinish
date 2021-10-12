import { connect } from 'react-redux';
import css from './work.module.css';

import Workspace from './Workspace/Workspace.jsx';
import NavDatabases from './NavDatabases/NavDatabases.jsx';
import NavHeader from './NavHeader/NavHeader.jsx';


function Work(props) {
	return(
		<div className={`${css.wrapper}`}>
			<NavHeader />
			<div className={`row ${css.bottom}`}>
				<NavDatabases className={"col-lg-1"} />
				<Workspace className={"col-lg-10"} />
			</div>
		</div>
	)
}



export default connect()(Work);