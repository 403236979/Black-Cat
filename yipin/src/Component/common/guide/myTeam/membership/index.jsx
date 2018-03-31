import React, {Component} from 'react';
import style from './membership.css'
import { Link , withRouter } from 'react-router-dom'
import LeftNav from "pubCom/leftNav/index.jsx"
import GuideHeader from "pubCom/guideHeader/index.jsx"


class MyTeam extends Component {
    constructor(props) {
        super(props);
        this.state = {
            showIndex:3
        }
    }

    render() {
        return (
            <div id='Test'>
                <GuideHeader/>
                <LeftNav {...this.props} {...this.state}/>
                <div className={style.contentBox}>
                    myTeam
                </div>
            </div>
        )
    }
}
export default withRouter(MyTeam);
