import axios from 'axios';
import React, { Component } from 'react';

class ApproveModal extends Component {

    constructor(props) {
        super(props);

        this.state = {
            userName: null,
            userEmail: null,
            userFungsional: null,
            userStruktural: null,
        }
    }

    inputUserName = (event) => {
        this.setState({
            userName: event.target.value,
        });
    }

    inputUserEmail = (event) => {
        this.setState({
            userEmail: event.target.value,
        });
    }

    inputUserFungsional = (event) => {
        this.setState({
            userFungsional: event.target.value,
        });
    }

    inputUserStruktural = (event) => {
        this.setState({
            userStruktural: event.target.value,
        });
    }


    static getDerivedStateFromProps(props, current_state) {
        let userUpdated = {
            userName: null,
            userEmail: null,
            userFungsional: null,
            userStruktural: null,
        }

        if (current_state.userName && (current_state.userName !== props.userData.currentUserName)) {
            return null;
        }

        if (current_state.userEmail && (current_state.userEmail !== props.userData.currentUserEmail)) {
            return null;
        }
        if (current_state.userFungsional && (current_state.userFungsional !== props.userData.currentUserF)) {
            return null;
        }
        if (current_state.userStruktural && (current_state.userStruktural !== props.userData.currentUserS)) {
            return null;
        }


        if (current_state.userName !== props.userData.currentUserName ||
            current_state.userName === props.userData.currentUserName) {
            userUpdated.userName = props.userData.currentUserName;
        }

        if (current_state.userEmail !== props.userData.currentUserEmail ||
            current_state.userEmail === props.userData.currentUserEmail) {
            userUpdated.userEmail = props.userData.currentUserEmail;
        }
        if (current_state.userFungsional !== props.userData.currentUserF ||
            current_state.userFungsional === props.userData.currentUserF) {
            userUpdated.userFungsional = props.userData.currentUserF;
        }
        if (current_state.userStruktural !== props.userData.currentUserS ||
            current_state.userStruktural === props.userData.currentUserS) {
            userUpdated.userStruktural = props.userData.currentUserS;
        }

        return userUpdated;

    }

    updateUserData = () => {
        axios.post('/update/user/data', {
            userId: this.props.modalId,
            userName: this.state.userName,
            userEmail: this.state.userEmail,
            userFungsional: this.state.userFungsional,
            userStruktural: this.state.userStruktural,
        }).then(() => {

            setTimeout(() => {
                location.reload();
            },2500)
        })
    }

    render() {
        return (
            <div className="modal fade" id={"updateModal"+this.props.modalId } tabIndex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div className="modal-dialog">
                    <div className="modal-content">
                    <div className="modal-header">
                        <h5 className="modal-title" id="exampleModalLabel">Formulir Perubahan Data</h5>
                        <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div className="modal-body">
                            <form className='form'>
                                <div className="form-group">
                                    <input type="text"
                                        id="userName"
                                        className='form-control mb-3'
                                        value={this.state.userName ?? ""}
                                        onChange={this.inputUserName}
                                    />
                                </div>  

                                <div className="form-group">
                                    <input type="text"
                                        id="userEmail"
                                        className='form-control mb-3'
                                        value={this.state.userEmail ?? ""}
                                        onChange={this.inputUserEmail}
                                    />
                                </div>

                                <div className="form-group">
                                    <input type="text"
                                        id="userFungsional"
                                        className='form-control mb-3'
                                        value={this.state.userFungsional ?? ""}
                                        onChange={this.inputUserFungsional}
                                    />
                                </div>  

                                <div className="form-group">
                                    <input type="text"
                                        id="userFungsional"
                                        className='form-control mb-3'
                                        value={this.state.userStruktural ?? ""}
                                        onChange={this.inputUserStruktural}
                                    />
                                </div>  
                            </form> 
                    </div>
                        <div className="modal-footer">
                            <input type="submit"
                                className="btn btn-info"
                                value="Update"
                                onClick={this.updateUserData}
                            />
                        <button type="button" className="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default UpdateModal;