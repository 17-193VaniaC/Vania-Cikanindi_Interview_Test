import React from 'react';
import ReactDOM from 'react-dom';
import { Component } from 'react/cjs/react.production.min';
import UserActionButton from './UserActionButton';

class UserTabledata extends Component{

    constructor(props){
        super(props);
    }
    
    render() {
        return (
            <tr>
                <td>{this.props.data.id}</td>
                <td>{this.props.data.name}</td>
                <td>{this.props.data.email}</td>
                <td>
                    {this.props.data.fungsional === '01' && (
                            <>
                            Engineer
                            </>
                        )}
                    {this.props.data.fungsional === '02' && (
                            <>
                            Administrasi
                            </>
                        )}
                    {this.props.data.struktural === '03' && (
                            <>
                            Support
                            </>
                        )}
                </td>
                <td>
                    {this.props.data.struktural === 'manajer' && (
                            <>
                            Manajer
                            </>
                        )}
                    {this.props.data.struktural === 'team leader' && (
                            <>
                            Team Leader
                            </>
                        )}
                    {this.props.data.struktural === 'staff' && (
                            <>
                            Staff
                            </>
                        )}
                </td>
                <td>{this.props.data.tahun_masuk}</td>
                <td><UserActionButton eachRowId ={this.props.data.id}/></td>
            </tr>
            
        )
    }

}

export default UserTabledata;