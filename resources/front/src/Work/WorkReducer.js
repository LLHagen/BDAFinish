import axios from "axios";
import {SERVER_URL} from "../constants";

const ACTION_CHANGE_FIRST_DAY = 'ACTION_CHANGE_FIRST_DAY';
const ACTION_CHANGE_LAST_DAY = 'ACTION_CHANGE_LAST_DAY';
const ACTION_GET_REPORT_FROM_SERVER = 'ACTION_GET_REPORT_FROM_SERVER';

const initialState = {
	firstDay: "",
	lastDay: "",

	navDatabases: [
		{
			id: '0',
			linkUrl: '../work/statuses',
			linkName: 'Статусы'
		},
		{
			id: '1',
			linkUrl: '../work/levels',
			linkName: 'Уровни соискателя'
		},
		{
			id: '2',
			linkUrl: '../work/vacancies',
			linkName: 'Должности'
		},
		{
			id: '3',
			linkUrl: '../work/resumes',
			linkName: 'Резюме'
		},
	]
}

function WorkReducer(state = initialState, action) {
	return state;
}

export default WorkReducer;
