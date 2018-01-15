import React, {Component} from 'react';
import style from './personal.css'
import { Link , withRouter } from 'react-router-dom'
import LeftNav from "pubCom/leftNav/index.jsx"
import GuideHeader from "pubCom/guideHeader/index.jsx"


class Personal extends Component {
    constructor(props) {
        super(props);
        this.state = {
            showIndex:4
        }
    }

    render() {
        return (
            <div id='Test'>
                <GuideHeader/>
                <LeftNav {...this.props} {...this.state}/>
                <div className={style.contentBox}>
                    personal
                </div>
            </div>
        )
    }
}
export default withRouter(Personal);
