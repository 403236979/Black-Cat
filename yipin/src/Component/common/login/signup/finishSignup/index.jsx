import React, {Component} from 'react';
import style from './finishSignup.css'
import { Link , withRouter } from 'react-router-dom'
import {checkEmail} from 'pubConf/Comstr.jsx'

export default class finishSignup extends Component {
    constructor(props) {
        super(props);
        this.state = {
        }
    }

    quite = () => {
        window.history.go(-1)
    }

    render() {
        return (
            <div className={style.page} style={{height:window.innerHeight}}>
                <div className={style.sigBox}>
                    <p className={style.title}>完 善 信 息</p>
                    <img src={require("./img/logo_black.png")} width={"190px"}/>
                    <input placeholder="常用邮箱"/>
                    <input placeholder="姓名"/>
                    <input maxLength={14} placeholder="公司名称"/>
                    <div className={style.btn}>
                        <p className={style.back} onClick={this.quite.bind(this)}>返回</p>
                        <p className={style.next}>
                            <Link to="/login">完成注册</Link></p>
                    </div>
                </div>
            </div>
        )
    }
}
