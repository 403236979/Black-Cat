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
                <div className={style.box}>
                    <LeftNav {...this.props} {...this.state}/>
                    <div className={style.contentBox}>
                        <div style={{background: 'rgb(255, 255, 255)',minHeight:window.screen.height-125 + "px"}}>
                            taskManagement
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
export default withRouter(TaskManagement);
