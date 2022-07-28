import React from 'react';
import ReactDOM from 'react-dom';
import { Component } from 'react/cjs/react.production.min';

class PresenceTabledata extends Component{

    constructor(props){
        super(props);
    }

    render() {
        return (
            <tr>
                <td>{this.props.data.id}</td>
                <td>{this.props.data.name}</td>
                <td>{this.props.data.fungsional}</td>
                <td>{this.props.data.struktural}</td>
                <td>{this.props.data.hadir}</td>
                <td>{this.props.data.izin}</td>
                <td>{this.props.data.sakit}</td>
                <td>{this.props.data.alpha}</td>
                <td>{this.props.data.total}</td>
            </tr>
        )
    }

}

export default PresenceTabledata;