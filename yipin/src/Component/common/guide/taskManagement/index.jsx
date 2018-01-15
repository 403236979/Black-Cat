import React, {Component} from 'react';
import style from './taskManagement.css'
import { Link , withRouter } from 'react-router-dom'
import LeftNav from "pubCom/leftNav/index.jsx"
import GuideHeader from "pubCom/guideHeader/index.jsx"


class TaskManagement extends Component {
    constructor(props) {
        super(props);
        this.state = {
            showIndex:0
        }
    }

    render() {
        return (
            <div id='Test'>
                <GuideHeader/>
                <LeftNav {...this.props} {...this.state}/>
                <div className={style.contentBox}>
                    taskManagement
                </div>
            </div>
        )
    }
}
export default withRouter(TaskManagement);
