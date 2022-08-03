import React from 'react';
import ReactDOM from 'react-dom';
import { Component } from 'react/cjs/react.production.min';
import PermissionActionButton from './PermissionActionButton';

class PermissionTabledata extends Component{

    constructor(props){
        super(props);
    }

    approveData = (id) => {
        axios.post('/update/perizinan/data/').then(() => {
            id: id
        }).then(() => {
            // toast.success("Data berhasil diperbarui");
            setTimeout(() => {
                location.reload();
            },2500)
        })
    }

    approveThis = (idPerizinan) =>{
        axios.post('/update/izin/data',{
            id_perizinan :idPerizinan
        }).then(()=>{
            setTimeout(() => {
                location.reload();
            },2500)
        })
    }

    render() {
        return (
            <tr>
                <td>{this.props.data.id_perizinan}</td>
                <td>{this.props.data.id}</td>
                <td>{this.props.data.name}</td>
                <td>{this.props.data.jenis}</td>
                <td>{this.props.data.tanggal}</td>
                <td>
                {/* <PermissionActionButton eachRowId ={this.props.data.id}/> */}
                <div className="btn-group" role="group" >
                    <input type="submit"
                        className="btn btn-info"
                        value="Approve"
                        onClick={() => { this.approveThis(this.props.data.id_perizinan) }}
                />
            </div>
                   
                </td>
            </tr>
            
        )
    }

}

export default PermissionTabledata;