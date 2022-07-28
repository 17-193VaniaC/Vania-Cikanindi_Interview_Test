import React from 'react';
import ReactDOM from 'react-dom';
import { Component } from 'react/cjs/react.production.min';

class ViewModal extends Component{

    constructor(props){
        super(props);
    }
    
    render() {
        return (
            <div className="modal fade" id={"viewModal" + this.props.modalId} tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div className="modal-dialog" role="document">
              <div className="modal-content">
                <div className="modal-header">
                  <h5 className="modal-title" id="exampleModalLabel">Detail User</h5>
                  <button type="button" className="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div className="modal-body">
                    <div className="row mb-3">
                        <strong>Id:</strong>
                            <div className="col-md-6">
                                {this.props.userData.currentUserId}
                            </div>
                    </div>
                    <div className="row mb-3">
                        <strong>Nama:</strong>
                            <div className="col-md-6">
                                {this.props.userData.currentUserName}
                            </div>
                    </div>
                    <div className="row mb-3">
                        <strong>Email:</strong>
                            <div className="col-md-6">
                                {this.props.userData.currentUserEmail}
                            </div>
                    </div>
                    <div className="row mb-3">
                        <strong>Tahun Masuk:</strong>
                            <div className="col-md-6">
                                {this.props.userData.currentUserYear}
                            </div>
                    </div>
                    <div className="row mb-3">
                        <strong>Jabatan Fungsional:</strong>
                            <div className="col-md-6">
                                {this.props.userData.currentUserF}
                            </div>
                        </div>
                    <div className="row mb-3">
                        <strong>Jabatan Struktural:</strong>
                            <div className="col-md-6">
                                {this.props.userData.currentUserS}
                            </div>
                    </div>    
                </div>
                <div className="modal-footer">
                  <button type="button" className="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
            </div>
        )
    }

}

export default ViewModal;