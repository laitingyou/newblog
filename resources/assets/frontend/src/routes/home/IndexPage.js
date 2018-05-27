import React from 'react';
import { connect } from 'dva';
import request from '../../utils/request'
import styles from './IndexPage.css';
import EditableTable from '../../components/table'
// function IndexPage(state) {
//
//
//         return (
//             <EditableTable></EditableTable>
//         );
//
//
// }
class IndexPage extends React.Component{
    constructor(props) {
        super(props);
        console.log(props.app)
        this.state = {
            data:{}
        };
        this.init()
    }
    init(){
        request('http://myapp.test/api/admin/getUsers',{}).then(res=>{
            console.log(res.data.users)
            this.setState({
                data:res.data.users
            })
        }).catch(err=>{
            console.log(err)
        })
    }
    render (){
        let {data}=this.state
        return (
            <EditableTable
                data={data}
            ></EditableTable>
        );
    }
}

IndexPage.propTypes = {

};

export default connect(app=>app)(IndexPage);
