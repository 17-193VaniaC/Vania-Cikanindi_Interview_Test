import React from 'react';
import ReactDOM from 'react-dom';
import { Component } from 'react/cjs/react.production.min';
import PermissionActionButton from './PermissionActionButton';

class PermissionTabledata extends Component{

    constructor(props){
        super(props);
    }
    
    render() {
        return (
            <tr>
                <td>{this.props.data.id}</td>
                <td>{this.props.data.name}</td>
                <td>{this.props.data.jenis}</td>
                <td>{this.props.data.tanggal}</td>
                <td><PermissionActionButton eachRowId ={this.props.data.id}/></td>
            </tr>
            
        )
    }

}

export default PermissionTabledata;