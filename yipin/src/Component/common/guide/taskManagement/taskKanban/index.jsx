import React, {Component} from 'react';
import style from './taskKanban.css'
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
                        <div className={style.containerCenter}>
                            <div className={style.addTask} style={{display: 'block'}}>
                                <div className={style.addTaskTop}>
                                    <p className={style.addTaskp1}/>
                                    <p className={style.addTaskp2}/>
                                    <p className={style.addTaskp3}/>
                                </div>
                                <p className={style.addTaskp4}/>
                                <p className={style.addTaskp5}/>
                                <p className={style.addTaskp6}/>
                                <Link className={style.addTaskBtn} to="/guide/taskManagement/step1">新增任务</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
export default withRouter(TaskManagement);
