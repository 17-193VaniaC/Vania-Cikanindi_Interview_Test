import axios from 'axios';
import React from 'react';
import ReactDOM from 'react-dom';
import { Component } from 'react/cjs/react.production.min';

class PermissionActionButton extends Component{
    
    constructor(props){
        super(props);

        this.state={
            currentUserId:null,
            currentUserName:null,
            currentUserEmail:null,
            currentUserF:null,
            currentUserS:null,
            currentUserYear:null,
        }
    }

    approveThis = (id) =>{
        axios.post('/update/izin/data'+id).then(() => {
            setTimeout(() => {
                location.reload();
            },2500)
        })
    }

    render() {
        return (
            <div className="btn-group" role="group" >
               <button type="button" 
                className="btn btn-primary" 
                onClick={() => { this.approveThis(this.props.eachRowId) }}>
                    Approve
                </button>
            </div>
        )
    }


}

export default PermissionActionButton;