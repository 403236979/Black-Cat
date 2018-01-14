import React, {Component} from 'react';
import style from './taskManagement.css'
import { Link , withRouter } from 'react-router-dom'
import LeftNav from "pubCom/leftNav/index.jsx"
import GuideHeader from "pubCom/guideHeader/index.jsx"


class taskManagement extends Component {
    constructor() {
        super();
        this.state = {}
    }

    render() {
        return (
            <div id='Test'>
                <GuideHeader/>
                <LeftNav/>
            </div>
        )
    }
}
export default withRouter(taskManagement);
