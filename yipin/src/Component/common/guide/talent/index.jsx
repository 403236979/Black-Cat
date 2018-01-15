import React, {Component} from 'react';
import style from './talent.css'
import { Link , withRouter } from 'react-router-dom'
import LeftNav from "pubCom/leftNav/index.jsx"
import GuideHeader from "pubCom/guideHeader/index.jsx"


class Talent extends Component {
    constructor(props) {
        super(props);
        this.state = {
            showIndex:1
        }
    }

    render() {
        return (
            <div id='Test'>
                <GuideHeader/>
                <LeftNav {...this.props} {...this.state}/>
                <div className={style.contentBox}>
                    Talent
                </div>
            </div>
        )
    }
}
export default withRouter(Talent);
