import React, {useState} from 'react';
import { Column } from 'devextreme-react/data-grid';
import DataGridTemplate from "./AdditionalComponents/DataGridTemplate";
import DataRequester from "./DataRequester";


function Levels() {
	const [mainData] = useState(DataRequester.createDataSource([], 'levels'))
	return (
		<div>
			<h2 className="Table-header">Справочник уровней соискателей</h2>
			<DataGridTemplate dataSource={mainData} columns={[
				<Column dataField="id" caption="id" />,
				<Column dataField="name" caption="Уровень" />
			]}
			/>
		</div>
	);
}

export default Levels;