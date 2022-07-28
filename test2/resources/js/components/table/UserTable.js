import React from 'react';
import ReactDOM from 'react-dom';
import { Component } from 'react/cjs/react.production.min';
import UserTabledata from './UserTabledata';

class UserTable extends Component{
    
    constructor(props){
        super(props);

        this.state = {
            users : [], 
        }
    }

    componentDidMount(){
        this.getUserList();
    }


    getUserList = () => {
        let self = this;
        axios.get('/get/user/list').then(function(response){
     
           self.setState({
                users: response.data
           });
        });
    }

    render(){
        return (
                <div className="col-md-12">
                    <table className="table table-bordered">
                    <thead>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>E-mail</th>
                        <th>Fungsional</th>
                        <th>Struktural</th>
                        <th>Tahun Masuk</th>
                        <th>Opsi</th> 
                    </thead>
                    <tbody>
                        {
                            this.state.users.map(function(x,i){
                                return <UserTabledata key={i} data={x} />
                            })
                        }
                    </tbody>
                    </table>
                </div>

        );
    }


}

export default UserTable;