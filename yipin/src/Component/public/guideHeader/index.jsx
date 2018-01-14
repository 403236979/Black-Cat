import React, {Component} from 'react';
import style from './guideHeader.css'

export default class GuideHeader extends Component {
    constructor(props) {
        super(props);
        this.state = {
        }
    }

    render() {
        return (
            <div className={style.header}>
                <div className={style.box}>
                    <img src={require("./img/logo_white.png")}/>
                    <div className={style.leftContent}>
                        <img src={require("./img/feedback.png")}/>
                        <img src={require("./img/shell.png")}/>
                        <div className={style.person}>
                            T
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
