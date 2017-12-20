import React, {Component} from 'react';
import style from './restPassword.css'
import { Link , withRouter } from 'react-router-dom'
import {checkPassword , checkPasswordV2} from 'pubConf/Comstr.jsx'
import LoginHeader from "pubCom/loginHeader/index.jsx"

class RestPassword extends Component {
    constructor(props) {
        super(props);
        this.state = {
            passwordWarn:false,
            password2Warn:false
        }
    }

    next = () => {
        let password = this.refs.password.value;
        let password2 = this.refs.password2.value;
        if(typeof(password) === "undefined"||typeof(password2) === "undefined"){
            return false;
        }
        this.setState({
            passwordWarn:!checkPassword(password),
            password2Warn:!checkPasswordV2(password2)
        },()=>{
            if(password !== password2){
                this.setState({
                    password2Warn:true
                },()=>{
                    this.refs.password2.childNodes[0].nodeValue = "请填写一致的密码"
                });
            }
            console.log(this.state)
        });
        if(checkPassword(password) && checkPasswordV2(password2) && password === password2){
            this.props.history.push('/login')
        }
    };

    rest = (type) => {
        if(type === "password"){
            this.setState({
                passwordWarn:false
            });
            this.refs.password.value=""
        }
        if(type === "password2"){
            this.setState({
                password2Warn:false
            });
            this.refs.password2.value=""
        }
    };
    quite = () => {
        window.history.go(-1)
    };

    render() {
        return (
            <div className={style.page} style={{height:window.innerHeight}}>
                <LoginHeader/>
                <div className={style.sigBox}>
                    <img src={require("./img/logo_black.png")} width={"190px"}/>
                    {this.state.passwordWarn
                        ?<p className={style.warn} style={{width:"292px",margin:"10px auto 0"}} onClick={this.rest.bind(this,'password')} ref="password">请填写正确密码</p>
                        :<input maxLength={16} type="password" placeholder="输入新密码" ref="password"/>}
                    {this.state.password2Warn
                        ?<p className={style.warn} style={{width:"292px",margin:"30px auto 0"}} onClick={this.rest.bind(this,'password2')} ref="password2">请填写一致的密码</p>
                        :<input maxLength={16} type="password" placeholder="再次输入新密码" ref="password2"/>}
                    <div className={style.btn}>
                        <p className={style.back} onClick={this.quite.bind(this)}>返回</p>
                        <p className={style.next} onClick={this.next.bind(this)}>修改密码</p>
                    </div>
                </div>
            </div>
        )
    }
}
export default withRouter(RestPassword)