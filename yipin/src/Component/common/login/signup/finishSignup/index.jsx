import React, {Component} from 'react';
import style from './finishSignup.css'
import { Link , withRouter } from 'react-router-dom'
import {checkEmail} from 'pubConf/Comstr.jsx'
import LoginHeader from "pubCom/loginHeader/index.jsx"

class finishSignup extends Component {
    constructor(props) {
        super(props);
        this.state = {
            userWarn:false,
            emailWarn:false,
            nameWarn:false
        }
    }

    quite = () => {
        window.history.go(-1)
    }

    finish = () => {
        let user = this.refs.user.value;
        let email = this.refs.email.value;
        let name = this.refs.name.value;
        if(typeof(user) === "undefined"||typeof(name) === "undefined"){
            return false;
        }
        if(user === ""){
            this.setState({
                userWarn:true,
            })
        }
        if(name === ""){
            this.setState({
                nameWarn:true,
            })
        }

        this.setState({
            emailWarn:!checkEmail(email),
        },()=>{
            console.log(this.state)
        });

        if(typeof(user) !== "undefined" && typeof(name) !== "undefined" && checkEmail(email)){
            this.props.history.push('/login')
        }
    };

    rest = (type) => {
        if(type === "user"){
            this.setState({
                userWarn:false
            });
            this.refs.user.value=""
        }
        if(type === "email"){
            this.setState({
                emailWarn:false
            });
            this.refs.email.value=""
        }
        if(type === "name"){
            this.setState({
                nameWarn:false
            });
            this.refs.name.value=""
        }
    };

    render() {
        return (
            <div className={style.page} style={{height:window.innerHeight}}>
                <LoginHeader/>
                <div className={style.sigBox}>
                    <p className={style.title}>完 善 信 息</p>
                    <img src={require("./img/logo_black.png")} width={"190px"}/>
                    {this.state.emailWarn
                        ?<p className={style.warn} style={{width:"292px",margin:"45px auto 0"}} onClick={this.rest.bind(this,'email')} ref="email">邮箱错误</p>
                        :<input placeholder="常用邮箱" ref="email"/>}
                    {this.state.userWarn
                        ?<p className={style.warn} style={{width:"292px",margin:"10px auto 0"}} onClick={this.rest.bind(this,'user')} ref="user">姓名错误</p>
                        :<input maxLength={16} placeholder="姓名" ref="user"/>}
                    {this.state.nameWarn
                        ?<p className={style.warn} style={{width:"292px",margin:"10px auto 0"}} onClick={this.rest.bind(this,'name')} ref="name">公司名称错误</p>
                        :<input maxLength={14} placeholder="公司名称" ref="name"/>}
                    <div className={style.btn}>
                        <p className={style.back} onClick={this.quite.bind(this)}>返回</p>
                        <p className={style.next} onClick={this.finish.bind(this)}>完成注册</p>
                    </div>
                </div>
            </div>
        )
    }
}

export default withRouter(finishSignup);