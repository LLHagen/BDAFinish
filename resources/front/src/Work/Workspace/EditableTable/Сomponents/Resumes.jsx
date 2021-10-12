import React, { useState, useEffect } from 'react';
import { Column, Lookup } from 'devextreme-react/data-grid';
import DataGridTemplate from "./AdditionalComponents/DataGridTemplate";
import DataRequester from "./DataRequester";


function Resumes() {
    const [mainData] = useState(DataRequester.createDataSource([], 'resumes'))
    const [levelsData, setLevelsData] = useState();
    const [vacanciesData, setVacanciesData] = useState();
    const [statusesData, setStatusesData] = useState();
    useEffect( () => {
        DataRequester.getAdditionalData('levels', setLevelsData);
        DataRequester.getAdditionalData('vacancies', setVacanciesData);
        DataRequester.getAdditionalData('statuses', setStatusesData)
    }, []);
    return (
        <div>
            <h2 className="Table-header">Список резюме</h2>
            <DataGridTemplate dataSource={mainData} columns={[
                <Column dataField="id" caption="№" allowEditing={false} />,
                <Column dataField="FIO" caption="ФИО"/>,
                <Column dataField="email" caption="email"/>,
                <Column dataField="level_id" caption="Уровень">
                    <Lookup dataSource={levelsData} valueExpr='id' displayExpr='name'/>
                </Column>,
                <Column dataField="vacancy_id" caption="Позиция">
                    <Lookup dataSource={vacanciesData} valueExpr='id' displayExpr='name'/>
                </Column>,
                <Column dataField="status_id" caption="Статус">
                    <Lookup dataSource={statusesData} valueExpr='id' displayExpr='name'/>
                </Column>,
                <Column dataField="interview_date" caption="Дата"/>,
            ]}
            />
        </div>
    );
}

export default Resumes;
