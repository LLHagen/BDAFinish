import DataSource from "devextreme/data/data_source";
import axios from "axios";
import {SERVER_URL} from "../../../../constants";

export default class DataRequester {

    static createDataSource(data, tableName) {
        let params = {
            loadMode: 'raw',
            dataSource: data,
            load : function (loadOptions) {
                return axios.get(SERVER_URL + "/work/getTable/" + tableName, {
                    tableName: tableName
                })
                .then(res => {
                    return res.data;
                })
                .catch( e => { throw e} );
            },
            insert: function(values) {
                return axios.post(SERVER_URL + "/work/addInTable", {
                    tableName: tableName,
                    record: values
                })
                .then(res => {
                    return res
                })
                .catch(e => {
                    throw e
                })
            },
            update: function(key, values, additional=null) {
                return axios.put(SERVER_URL + "/work/editRecordInTable", {
                    tableName: tableName,
                    recordId: key.id,
                    newData: values,
                    additional: key['documentsPackageId']
                })
                .then(res => {
                    return res
                })
                .catch(e => {
                    throw e
                })
            },
            remove: function(key) {
                return axios.delete(SERVER_URL + "/work/delRecordInTable", { data: {
                        tableName: tableName,
                        recordId: key
                    }
                })
                .then(res => {
                    return res
                })
                .catch(e => {
                    throw 'Вы пытаетесь удалить элемент, который присутствует в другой таблице!'
                })
            }
        }
        return new DataSource(params);
    }

    static getAdditionalData(tableName, setter) {
        axios.get(SERVER_URL + "/work/getTable/" + tableName, //+ tableName,
            {
                tableName: tableName
            }).then((res) => {setter(res.data)})
    }
}