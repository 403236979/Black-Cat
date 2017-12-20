import React, {Component} from 'react';
import style from './forgotPassword.css'
import { Link , withRouter } from 'react-router-dom'
import {checkTelePhone , checkCode } from 'pubConf/Comstr.jsx'
import LoginHeader from "pubCom/loginHeader/index.jsx"

class ForgotPassword extends Component {
    constructor(props) {
        super(props);
        this.state = {
            phoneWarn:false,
            codeWarn:false
        }
    }

    getCode = () => {
        console.log("获取验证码")
    }

    quite = () => {
        window.history.go(-1)
    }

    next = () => {
        let phone = this.refs.phone.value;
        let code = this.refs.code.value;
        if(typeof(code) === "undefined"||typeof(phone) === "undefined"){
            return false;
        }
        this.setState({
            phoneWarn:!checkTelePhone(phone),
            codeWarn:!checkCode(code)
        },()=>{
            console.log(this.state)
        });
        if(checkTelePhone(phone)&&checkCode(code)){
            this.props.history.push('/login/restPassword')
        }
    };

    rest = (type) => {
        if(type === "code"){

            this.setState({
                codeWarn:false
            });
            this.refs.code.value=""
        }
        if(type === "phone"){
            this.setState({
                phoneWarn:false
            });
            this.refs.phone.value=""
        }
    };

    render() {
        return (
            <div className={style.page} style={{height:window.innerHeight}}>
                <LoginHeader/>
                <div className={style.sigBox}>
                    <img src={require("./img/logo_black.png")} width={"190px"}/>
                    <div className={style.getCode}>
                        {this.state.phoneWarn
                            ?<p className={style.warn} style={{float:"left",width:"calc(67% - 24px)",margin:"10px auto 0"}} onClick={this.rest.bind(this,'phone')} ref="phone">手机号错误</p>
                            :<input placeholder="手机号码" ref="phone"/>}
                        <span onClick={this.getCode.bind(this)}>获取验证码</span>
                    </div>
                    {this.state.codeWarn
                        ?<p className={style.warn} style={{width:"292px",margin:"30px auto 0"}} onClick={this.rest.bind(this,'code')} ref="code">验证码错误</p>
                        :<input placeholder="验证码" maxLength={6} ref="code"/>}
                    <div className={style.btn}>
                        <p className={style.back} onClick={this.quite.bind(this)}>返回</p>
                        <p className={style.next} onClick={this.next.bind(this)}>确认验证码</p>
                    </div>
                </div>
            </div>
        )
    }
}

export default withRouter(ForgotPassword);