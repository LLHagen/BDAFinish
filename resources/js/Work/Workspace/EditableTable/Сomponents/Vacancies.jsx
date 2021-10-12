import React, {useState} from 'react';
import { Column } from 'devextreme-react/data-grid';
import DataGridTemplate from "./AdditionalComponents/DataGridTemplate";
import DataRequester from "./DataRequester";


function Vacancies() {
	const [mainData] = useState(DataRequester.createDataSource([], 'vacancies'))
	return (
		<div>
			<h2 className="Table-header">Справочник должностей</h2>
			<DataGridTemplate dataSource={mainData} columns={[
				<Column dataField="id" caption="id" allowEditing={false} />,
				<Column dataField="name" caption="Название"/>,
				<Column dataField="description" caption="Описание"/>,
				<Column dataField="isActive" caption="Активно" dataType="boolean"/>
			]}
			/>
		</div>
	);
}

export default Vacancies;
