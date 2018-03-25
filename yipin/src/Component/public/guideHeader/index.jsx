import React, {Component} from 'react';
import style from './guideHeader.css'
import { Link , withRouter } from 'react-router-dom'

 class GuideHeader extends Component {
    constructor(props) {
        super(props);
        this.state = {
            show:false
        }
        console.log(this.props.history)
    }

    show = () =>{
        this.setState({
            show:true
        },()=>{
            console.log('show')
        })
    }

    hide = () =>{
        this.setState({
            show:false
        },()=>{
            console.log('hide')
        })
    }

    changePer = ()=>{
        this.props.history.push('/guide/personal/personalEdit')
    }

    render() {
        return (
            <div className={style.header}>
                <div className={style.box}>
                    <img src={require("./img/logo_white.png")}/>
                    <div className={style.leftContent}>
                        <img src={require("./img/feedback.png")}/>
                        <img src={require("./img/shell.png")}/>
                        <div className={style.mouse} onMouseEnter={this.show.bind(this)} onMouseLeave={this.hide.bind(this)}>
                            <div className={style.person}>
                                <p>测</p>
                                {this.state.show === true
                                    ?<div className={style.perFloat}>
                                    <div className={style.perImp}>
                                        <span>测</span>
                                        <div className={style.imf}>
                                            <p>测试</p>
                                            <p>403236979@qq.com</p>
                                        </div>
                                        <div className={style.perChange}>
                                            <p>企业认证</p>
                                            <p onClick={this.changePer.bind(this)}>编辑个人信息</p>
                                        </div>
                                        <div className={style.clear}></div>
                                    </div>
                                    <div className={style.outBtn}>
                                        <p>
                                            <Link to="/login">退出</Link>
                                        </p>
                                    </div>
                                </div>
                                    :<div/>
                                }
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
export default withRouter(GuideHeader);
