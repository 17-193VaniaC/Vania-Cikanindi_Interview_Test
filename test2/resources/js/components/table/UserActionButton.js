import axios from 'axios';
import React from 'react';
import ReactDOM from 'react-dom';
import { Component } from 'react/cjs/react.production.min';
import ViewModal from './Modals/ViewModal';
import UpdateModal from './Modals/UpdateModal';
import DeleteModal from './Modals/DeleteModal';

class UserActionButton extends Component{
    
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
    
    getUserDetails = (id) =>{
        axios.post('/get/individual/user/detail',{
            userId :id
        }).then((response)=>{
            this.setState({
                currentUserId : response.data.id,
                currentUserName: response.data.name,
                currentUserEmail : response.data.email, 
                currentUserF : response.data.fungsional,
                currentUserS : response.data.struktural,
                currentUserYear : response.data.tahun_masuk,
            })
            console.log(response.data);
        })
    }

    render() {
        return (
            <div className="btn-group" role="group" >
                
                <button type="button" 
                className="btn btn-primary"
                data-bs-toggle="modal" 
                data-bs-target={"#viewModal" + this.props.eachRowId}
                onClick = { () => { this.getUserDetails(this.props.eachRowId) }}>
                    View
                </button>
                <ViewModal modalId={this.props.eachRowId} userData={ this.state }/>

                <button type="button"
                    className="btn btn-info"
                    data-bs-toggle="modal"
                    data-bs-target={'#updateModal' + this.props.eachRowId}
                    onClick={() => { this.getUserDetails(this.props.eachRowId) }}>
                    Edit
                </button>
                <UpdateModal modalId={this.props.eachRowId} userData={ this.state }/>

                <button type="button" 
                className="btn btn-danger" 
                data-bs-toggle="modal"
                data-bs-target={'#deleteModal' + this.props.eachRowId}
                onClick={() => { this.getUserDetails(this.props.eachRowId) }}>
                    Hapus
                </button>
                <DeleteModal modalId={this.props.eachRowId} userData={ this.state }/>
            </div>
        )
    }


}

export default UserActionButton;