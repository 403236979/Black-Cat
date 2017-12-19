import React, {Component} from 'react';
import style from './loginPage.css'
import { Link } from 'react-router-dom'
import {checkTelePhone} from 'pubConf/Comstr.jsx'

export default class LoginPage extends Component {
    constructor() {
        super();
        this.state = {
            isCheck:true
        }
    }

    check = (event) => {
        this.setState({
            isCheck:!this.state.isCheck
        });
        console.log("是否自动登录："+this.state.isCheck)
    };

    render() {
        return (
            <div className={style.page} style={{height:window.innerHeight}}>
                <div className={style.logBox}>
                    <p className={style.title}>登录</p>
                    <img src={require("./img/logo_black.png")} width={"190px"}/>
                    <input placeholder="手机号码"/>
                    <input placeholder="密码"/>
                    <div className={style.nextLogin}>
                        <div className={this.state.isCheck?style.isCheck:style.check} onClick={this.check.bind(this)} ref="check">下次自动登录</div>
                        <p>
                            <Link to="/login/forgotPassword">忘记密码？</Link>
                        </p>
                    </div>
                    <p className={style.login}>登录</p>
                    <p className={style.signin}>
                        <Link to="/login/signup">免费注册，轻松试用</Link>
                    </p>
                </div>
            </div>
        )
    }
}
