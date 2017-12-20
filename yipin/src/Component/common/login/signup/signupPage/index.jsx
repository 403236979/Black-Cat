import React, {Component} from 'react';
import style from './signup.css'
import { Link , withRouter } from 'react-router-dom'
import {checkTelePhone , checkPassword , checkCode} from 'pubConf/Comstr.jsx'

class Signup extends Component {
    constructor(props) {
        super(props);
        this.state = {
            phoneWarn:false,
            codeWarn:false,
            passwordWarn:false,
        }
    }

    getCode = () => {
        console.log("获取验证码")
    };


    next = () => {
        let phone = this.refs.phone.value;
        let code = this.refs.code.value;
        let password = this.refs.password.value;
        if(typeof(phone) === "undefined"||typeof(code) === "undefined"||typeof(password) === "undefined"){
            return false;
        }
        this.setState({
            phoneWarn:!checkTelePhone(phone),
            codeWarn:!checkCode(code),
            passwordWarn:!checkPassword(password),
        },()=>{
            console.log(this.state)
        });
        if(checkTelePhone(phone) && checkCode(code) && checkPassword(password)){
            this.props.history.push('/login/signup/finishSignup')
        }
    };

    rest = (type) => {
        if(type === "phone"){
            this.setState({
                phoneWarn:false
            });
            this.refs.phone.value=""
        }
        if(type === "code"){
            this.setState({
                codeWarn:false
            });
            this.refs.code.value=""
        }
        if(type === "password"){
            this.setState({
                passwordWarn:false
            });
            this.refs.password.value=""
        }
    };

    quite = () => {
        window.history.go(-1)
    };

    render() {
        return (
            <div className={style.page} style={{height:window.innerHeight}}>
                <div className={style.sigBox}>
                    <p className={style.title}>注 册</p>
                    <img src={require("./img/logo_black.png")} width={"190px"}/>
                    {this.state.phoneWarn
                        ?<p className={style.warn} style={{width:"292px",margin:"45px auto 0"}} onClick={this.rest.bind(this,'phone')} ref="phone">手机号码错误</p>
                        :<input placeholder="手机号码" ref="phone"/>}
                    <p className={style.getCode}>
                        {this.state.codeWarn
                            ?<p className={style.warn} style={{float:"left",width:"calc(67% - 24px)",margin:"10px auto 0"}} onClick={this.rest.bind(this,'code')} ref="code">验证码错误</p>
                            :<input maxLength={6} placeholder="验证码" ref="code"/>}
                        <span onClick={this.getCode.bind(this)}>获取验证码</span>
                    </p>
                    {this.state.passwordWarn
                        ?<p className={style.warn} style={{width:"292px",margin:"10px auto 0"}} onClick={this.rest.bind(this,'password')} ref="password">请填写正确密码</p>
                        :<input maxLength={16} type="password" placeholder="设置密码" ref="password"/>}
                    <div className={style.btn}>
                        <p className={style.back} onClick={this.quite.bind(this)}>返回</p>
                        <p className={style.next} onClick={this.next.bind(this)}>下一步</p>
                    </div>
                    <p className={style.loginPage}>
                        <Link to="/login">已有账号，立即登陆</Link>
                    </p>
                </div>
            </div>
        )
    }
}

export default withRouter(Signup)