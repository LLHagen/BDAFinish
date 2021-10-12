import { Route, Redirect, Switch } from 'react-router-dom';
import EditableTable from './EditableTable/EditableTable.jsx';
import React from "react";


function Workspace(props) {
	return ( // TODO: refactor
		<div className={props.className}>
			<Switch>
				<Route exact path="/work">
 					<Redirect to="/work/events" />
				</Route>

				<Route exact path="/work/statuses">
					<EditableTable tableName='statuses' name={props.name} data={props.data} columns={props.columns} />
				</Route>

				<Route exact path="/work/levels">
					<EditableTable tableName='levels' name={props.name} data={props.data} columns={props.columns} />
				</Route>

				<Route exact path="/work/vacancies">
					<EditableTable tableName='vacancies' name={props.name} data={props.data} columns={props.columns} />
				</Route>

				<Route exact path="/work/resumes">
					<EditableTable tableName='resumes' name={props.name} data={props.data} columns={props.columns} />
				</Route>
			</Switch>
		</div>
	)
}


export default Workspace;