import React, {Component} from 'react';
import style from './talenthub.css'
import { Link , withRouter } from 'react-router-dom'
import LeftNav from "pubCom/leftNav/index.jsx"
import GuideHeader from "pubCom/guideHeader/index.jsx"


class Talenthub extends Component {
    constructor(props) {
        super(props);
        this.state = {
            showIndex:2
        }
    }

    render() {
        return (
            <div id='Test'>
                <GuideHeader/>
                <LeftNav {...this.props} {...this.state}/>
                <div className={style.contentBox}>
                    Talenthub
                </div>
            </div>
        )
    }
}
export default withRouter(Talenthub);
