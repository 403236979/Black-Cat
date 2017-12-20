import React, {Component} from 'react';
import style from './loginHeader.css'

export default class LoginHeader extends Component {
    constructor(props) {
        super(props);
        this.state = {
        }
        console.log(style)
    }

    render() {
        return (
            <div className={style.header}>
                <img src={require("./img/logo_white.png")}/>
            </div>
        )
    }
}
