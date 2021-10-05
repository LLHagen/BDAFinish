import React, {useState} from 'react';
import { Column } from 'devextreme-react/data-grid';
import DataGridTemplate from "./AdditionalComponents/DataGridTemplate";
import DataRequester from "./DataRequester";


function Resumes() {
    const [mainData] = useState(DataRequester.createDataSource([], 'resumes'))
    return (
        <div>
            <h2 className="Table-header">Список резюме</h2>
            <DataGridTemplate dataSource={mainData} columns={[
                <Column dataField="id" caption="№" allowEditing={false} />,
                <Column dataField="FIO" caption="ФИО"/>,
                <Column dataField="email" caption="email"/>,
                <Column dataField="text" caption="Текст"/>,
                <Column dataField="interview_date" caption="Дата интервью"/>,
                <Column dataField="level_id" caption="Уровень"/>,
                <Column dataField="status_id" caption="Статус"/>,
                <Column dataField="vacancy_id" caption="Вакансия"/>,
                <Column dataField="timestamp" caption="Время"/>,
            ]}
            />
        </div>
    );
}

export default Resumes;
