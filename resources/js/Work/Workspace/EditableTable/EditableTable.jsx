import { connect } from 'react-redux';
import Resumes from './Сomponents/Resumes.jsx';
import Vacancies from './Сomponents/Vacancies.jsx';
import Statuses from './Сomponents/Statuses.jsx';
import css from './editableTable.module.css';
import Levels from "./Сomponents/Levels";


function EditableTable(props) {
	let container;
	switch(props.tableName){
		case 'statuses':
			container = <Statuses/>;
			break;
		case 'levels':
			container = <Levels/>;
			break;
		case 'vacancies':
			container = <Vacancies/>;
			break;
		case 'resumes':
			container = <Resumes/>;
			break;
	}
	return <div>{container}</div>;
}


export default EditableTable;