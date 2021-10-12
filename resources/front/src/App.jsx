import { BrowserRouter, Route, Redirect, Switch } from 'react-router-dom';
import { connect } from 'react-redux';

import Authorization from './Authorization/Components/Authorization.jsx';
import Registration from './Registration/Registration.jsx';
import Work from './Work/Work.jsx';
import NotFoundPage from './NotFoundPage/NotFoundPage.jsx';
import RestorePassword from './RestorePassword/RestorePassword.jsx';
import ResumeCreator from "./Work/Workspace/ResumeCreator/ResumeCreator";


function App(props) {
	const isAuthorizedRoutes = () => {
		return (
			<Switch>
				<Route path='/work' render={() => <Work />} />
                <Route exact path='/resumeCreator' render ={() => <ResumeCreator />}/>
				<Route exact path='/authorization' render={() => <Authorization />} />
				<Route exact path='/registration' render={() => <Registration />} />
				<Route exact path='/restorePassword' render ={() => <RestorePassword />}/>
				<Route path="" render={() => <NotFoundPage />} />
			</Switch>
		)
	}

	const isNotAuthorizedRoutes = () => {
		return (
			<Switch>
				<Route exact path='/authorization' render={() => <Authorization />} />
				<Route exact path='/registration' render={() => <Registration />} />
				<Route exact path='/restorePassword' render={() => <RestorePassword />}/>
				<Route path="" render={() => <div>
							<Redirect to ='/authorization' />
							<Authorization />
						</div>
				} />
			</Switch>
		)
	}

	return (
		<BrowserRouter>
			{props.isAuthorized ? isAuthorizedRoutes() : isNotAuthorizedRoutes()}
		</BrowserRouter>
	)
}

const mapStateToProps = (state) => {
	let s = state.authorization;
	return {
		isAuthorized: s.isAuthorized
	}
}

export default connect(mapStateToProps)(App);
