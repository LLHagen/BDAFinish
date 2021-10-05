import React, { useEffect, useState } from 'react';
import { Column, Lookup } from 'devextreme-react/data-grid';
import DataGridTemplate from "./AdditionalComponents/DataGridTemplate";
import DataRequester from "./DataRequester";


function Statuses() {
	const [mainData] = useState(DataRequester.createDataSource([], 'statuses'));
	return (
		<div>
			<h2 className="Table-header">Справочник статусов</h2>
			<DataGridTemplate dataSource={mainData} columns={[
				<Column dataField="id" caption="№" allowEditing={false} />,
				<Column dataField="name" caption="Статус"/>
			]}
			/>
		</div>
	);
}

export default Statuses;

