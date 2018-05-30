import React from 'react';
import { connect } from 'dva';
import axios from 'axios'
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
      axios.get('http://myapp.test/api/admin/getUsers', {
        params:{uid:'4bfd0e375396b'}
        }).then(res=>{
            console.log(res.data)
            // this.setState({
            //     data:res.data.users
            // })
        }).catch(err=>{
            // console.log(err)
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
