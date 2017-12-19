import React, {Component,ReactDOM} from 'react';
import { Link } from 'react-router-dom'

import style from './home.css'
/*=============
 群主页
 ==============*/
export  default class Home extends Component {
    constructor(props) {
        super(props);
        this.state = {
            fdShow:false
        };
    }

    feedShow = () => {
        this.setState({
            fdShow:true
        })
        console.log("反馈")
    }

    feedHide = () => {
        this.setState({
            fdShow:false
        })
        console.log("取消反馈")
    }

    submit = () => {
        console.log(this.refs.problem.value.trim())
        console.log(this.refs.contact.value.trim())
    }

    stop = (event) => {
        event.stopPropagation();
    }

    render() {
        return (
            <div className={style.homewrap}>
                <div className={style.header}>
                    <div className={style.logo}/>
                    <div className={style.btnbox}>
                        <p className={style.headerBtn}>
                            <Link to="/login" style={{display:"block",width:"100%",height:"100%"}}>登录</Link>
                        </p>
                        <p className={style.headerBtn}>
                            <Link to="/login/signup" style={{display:"block",width:"100%",height:"100%"}}>注册</Link>
                        </p>
                    </div>
                </div>
                <div className={style.banner} style={{height:window.innerHeight}}>
                    <div className={style.dark}/>
                    <div className={style.banBox}>
                        <p>
                            助力猎头高效交付<br/>
                            发现更多优质人才
                        </p>
                        <p className={style.freebtn}>
                            <Link to="/login" style={{display:"block",width:"100%",height:"100%"}}>免费试用</Link>
                        </p>
                    </div>
                </div>
                <div className={style.content}>
                    <h2>功能模块介绍</h2>
                    <div className={style.intrModule}>
                        <div className={style.moduleBox}>
                            <div className={style.moduleImg01}/>
                            <h2>任务面板</h2>
                            <p>
                                BD岗位发布项目仅需30秒，<br/>
                                到数据看板清晰明了，<br/>
                                信息全面展现在你眼前
                            </p>
                        </div>
                        <div className={style.moduleBox}>
                            <div className={style.moduleImg02}/>
                            <h2>智能人才</h2>
                            <p>
                                筛选项目精准到位，<br/>
                                用人工智能技术从海量简历库中<br/>
                                1秒找到最需要的人才
                            </p>
                        </div>
                        <div className={style.moduleBox}>
                            <div className={style.moduleImg03}/>
                            <h2>专享管家</h2>
                            <p>
                                打造个性化人才库，<br/>
                                分组收藏管理你的优质候选人，<br/>
                                独家跟进避免业务冲突
                            </p>
                        </div>
                    </div>
                    <div className={style.bigBox}>
                        <div className={style.bgblack} >
                            <div className={style.blackBox+" "+style.pic01}>
                                <div className={style.dark} style={{position:'absolute'}}/>
                                    <h1>人才一网打尽</h1>
                                <div className={style.blackHover}>
                                    <div className={style.solid}/>
                                    <p>
                                        在海量简历库中精准定位<br/>
                                        免费获取所需人才
                                    </p>
                                </div>
                            </div>
                            <div className={style.blackBox+" "+style.pic02}>
                                <div className={style.dark} style={{position:'absolute'}}/>
                                    <h1>清晰任务管理</h1>
                                <div className={style.blackHover}>
                                    <div className={style.solid}/>
                                    <p>
                                        告别繁杂数据表格<br/>
                                        对任务状况一目了然
                                    </p>
                                </div>
                            </div>
                            <div className={style.blackBox+" "+style.pic03}>
                                <div className={style.dark} style={{position:'absolute'}}/>
                                    <h1>智能业务管家</h1>
                                <div className={style.blackHover}>
                                    <div className={style.solid}/>
                                    <p>
                                        优质候选人分类收藏管理<br/>
                                        独家跟进
                                    </p>
                                </div>
                            </div>
                            <div className={style.blackBox+" "+style.pic04}>
                                <div className={style.dark} style={{position:'absolute'}}/>
                                    <h1>高效极简操作</h1>
                                <div className={style.blackHover}>
                                    <div className={style.solid}/>
                                    <p>
                                        化繁为简<br/>
                                        便捷易操作的设计让你大幅提高效率
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className={style.footer}>
                    <div className={style.fterBox}>
                        <h2>辈出产品</h2>
                        <p>辈出有读</p>
                        <p>辈出诚聘</p>
                        <p>辈出有猎</p>
                    </div>
                    <div className={style.fterBox}>
                        <h2>关于辈出</h2>
                        <p>企业介绍</p>
                        <p>辈出动态</p>
                        <p>加入我们</p>
                    </div>
                    <div className={style.fterBox+" "+style.fterlast}>
                        <h2>联系我们</h2>
                        <div>
                            <i className={style.ico+" "+style.phone}/>
                            <p>0571-88647556</p>
                        </div>
                        <div>
                            <i className={style.ico+" "+style.qqlogo}/>
                            <p>780881737</p>
                        </div>
                        <div>
                            <i className={style.ico+" "+style.email}/>
                            <p>nick@fanfandata.com</p>
                        </div>
                    </div>
                    <p className={style.footertext}>
                        Copyright©2017 www.beichoo.com 浙ICP备16023665号-3
                    </p>
                </div>
                <div className={style.fbBtn} onClick={this.feedShow.bind(this)}>
                    <div className={style.penpic}/>
                    <p>意见反馈</p>
                </div>
                <div className={style.fbBox} style={this.state.fdShow?{display:"block"}:{display:"none"}} onClick={this.feedHide.bind(this)}>
                    <div className={style.feedback} onClick={this.stop.bind(this)}>
                        <p>您对辈出蓬莱的建议或意见</p>
                        <textarea placeholder="问题描述..." ref="problem"/>
                        <textarea placeholder="联系方式" ref="contact"/>
                        <p onClick={this.submit.bind(this)}>提交</p>
                    </div>
                </div>
            </div>
        )
    };
}