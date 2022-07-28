import React from 'react';
import ReactDOM from 'react-dom';
import { Component } from 'react/cjs/react.production.min';
import PermissionTabledata from './PermissionTabledata';

class PermissionTable extends Component{
    
    constructor(props){
        super(props);

        this.state = {
            permission : [], 
        }
    }

    componentDidMount(){
        this.getPermissionList();
    }


    getPermissionList = () => {
        let self = this;
        axios.get('/get/izin/list').then(function(response){
           self.setState({
                permission: response.data
           });
        });
    }

    render(){
        return (
            <div className="row justify-content-center">
                <div className="col-md-8 ">
                    <table className="table table-bordered">
                    <thead>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Izin</th>
                        <th>Tanggal</th>
                        <th>Opsi</th>
                    </thead>
                    <tbody>
                        {
                            this.state.permission.map(function(x,i){
                                return <PermissionTabledata key={i} data={x} />
                            })
                        }
                    </tbody>
                    </table>
                </div>
            </div>

        );
    }


}

export default PermissionTable;