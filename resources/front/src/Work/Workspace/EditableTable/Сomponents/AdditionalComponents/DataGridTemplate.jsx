import React, { useState } from "react";
import DataGrid, { Editing, Paging, Selection} from "devextreme-react/data-grid";
import {Button} from "devextreme-react/button";
import {Template} from "devextreme-react/core/template";


function DataGridTemplate({dataSource, columns}){
    const [selectedItemKeys, setSelectedItemKeys] = useState([]);
    return(
        <DataGrid id="gridContainer"
                  dataSource={dataSource}
                  showBorders={true}
                  selectedRowKeys={selectedItemKeys}
                  onSelectionChanged={() => setSelectedItemKeys()}
                  // onToolbarPreparing={(e) => {
                  //     e.toolbarOptions.items.push({
                  //         location: 'after',
                  //         template: 'deleteButton'
                  //     })
                  // }}
                  columnAutoWidth={true}
        >
            <Selection mode="multiple" />
            <Paging enabled={false} />
            <Editing
                mode="cell"
                allowUpdating={true}
                allowAdding={true}
                allowDeleting={true}
            />

            {columns}

            <Template name="deleteButton" render={
                <Button
                    onClick={() =>
                        selectedItemKeys.forEach(key => {
                            dataSource.remove(key);
                            dataSource.reload();
                        })}
                    icon="trash"
                    disabled={!selectedItemKeys.length}
                    text="" />
            } />
        </DataGrid>
    )
}
export default DataGridTemplate;
