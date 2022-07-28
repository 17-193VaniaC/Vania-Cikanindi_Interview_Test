import React from 'react';
import ReactDOM from 'react-dom';
import App from './components/App';
import Example from './components/Example';
import PresenceList from './components/PresenceList';
import UserList from './components/UserList';
import PermissionList from './components/PermissionList';

if (document.getElementById('mainApp')) {
    ReactDOM.render(<App />, document.getElementById('mainApp'));
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}

if (document.getElementById('presencelist')) {
    ReactDOM.render(<PresenceList />, document.getElementById('presencelist'));
}

if (document.getElementById('userlist')) {
    ReactDOM.render(<UserList />, document.getElementById('userlist'));
}

if (document.getElementById('permissionlist')) {
    ReactDOM.render(<PermissionList />, document.getElementById('permissionlist'));
}