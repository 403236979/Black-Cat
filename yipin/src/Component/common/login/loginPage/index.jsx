import React, {Component} from 'react';
import style from './loginPage.css'
import { Link } from 'react-router-dom'
import {checkTelePhone , checkPassword } from 'pubConf/Comstr.jsx'
import LoginHeader from "pubCom/loginHeader/index.jsx"

export default class LoginPage extends Component {
    constructor() {
        super();
        this.state = {
            isCheck:true,
            phoneWarn:false,
            passwordWarn:false
        }
    }

    check = (event) => {
        this.setState({
            isCheck:!this.state.isCheck
        });
        console.log("是否自动登录："+!this.state.isCheck)
    };

    login = () => {
        let phone = this.refs.phone.value;
        let password = this.refs.password.value;
        this.setState({
            phoneWarn:!checkTelePhone(phone),
            passwordWarn:!checkPassword(password)
        },()=>{
            console.log(this.state)
        });
        if(typeof(password) === "undefined"||typeof(phone) === "undefined" || checkTelePhone(phone) == false || checkPassword(password) == false){
            return false;
        }else{
            location.pathname = "/login/changeTeam";
        }
    };

    rest = (type) => {
        if(type === "password"){

            this.setState({
                passwordWarn:false
            })
            this.refs.password.value=""
        }
        if(type === "phone"){
            this.setState({
                phoneWarn:false
            })
            this.refs.phone.value=""
        }
    };

    render() {
        return (
            <div className={style.page} style={{height:window.innerHeight}}>
                <LoginHeader/>
                <div className={style.logBox}>
                    <p className={style.title}>登 录</p>
                    <img src={require("./img/logo_black.png")} width={"190px"}/>
                    {this.state.phoneWarn
                        ?<p className={style.warn} style={{margin:"45px auto 0"}} onClick={this.rest.bind(this,'phone')} ref="phone">账号错误</p>
                        :<input placeholder="手机号码" ref="phone"/>}
                    {this.state.passwordWarn
                        ?<p className={style.warn} style={{margin:"10px auto 0"}} onClick={this.rest.bind(this,'password')} ref="password">密码错误</p>
                        :<input maxLength={16} type="password" placeholder="密码" ref="password"/>}
                    <div className={style.nextLogin}>
                        <div className={this.state.isCheck?style.isCheck:style.check} onClick={this.check.bind(this)} ref="check">下次自动登录</div>
                        <p>
                            <Link to="/login/forgotPassword">忘记密码？</Link>
                        </p>
                    </div>
                    <p className={style.login} onClick={this.login.bind(this)}>登录</p>
                    <p className={style.signin}>
                        <Link to="/login/signup">免费注册，轻松试用</Link>
                    </p>
                </div>
            </div>
        )
    }
}
