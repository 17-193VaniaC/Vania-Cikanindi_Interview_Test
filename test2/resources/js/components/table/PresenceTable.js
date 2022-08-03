import React from 'react';
import ReactDOM from 'react-dom';
import { Component } from 'react/cjs/react.production.min';
import PresenceTabledata from './PresenceTabledata';

class PresenceTable extends Component{
    
    constructor(props){
        super(props);

        this.state = {
            presensi : [], 
        }
    }

    componentDidMount(){
        this.getAttendanceReport();
    }


    getAttendanceReport = () => {
        let self = this;
        axios.get('/get/presensi/list').then(function(response){
           self.setState({
                presensi: response.data
           });
        });
        
    }

    render(){
        return (
            <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-12">
                <table className="table table-bordered">
                <thead>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Fungsional</th>
                    <th>Struktural</th>
                    <th>Hadir</th>
                    <th>Izin</th>
                    <th>Sakit</th>
                    <th>Alpha</th>
                    <th>Total</th>
                </thead>
                <tbody>
                    {
                        this.state.presensi.map(function(x,i){
                            return <PresenceTabledata key={i} data={x} />
                        })
                    }
                </tbody>
                </table>
                </div>
            </div>
        </div>
        );
    }


}

export default PresenceTable;