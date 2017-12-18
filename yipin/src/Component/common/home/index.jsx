import React, {Component,ReactDOM} from 'react';
import PropTypes from 'prop-types';
import style from './home.css'
/*=============
 群主页
 ==============*/
export  default class Home extends Component {
    constructor() {
        super();
        this.state = {
        };
    }
    render() {
        return (
            <div className="homewrap">
                <div className="header">
                    <div className="logo"/>
                    <div className="btnbox">
                        <p className="headerBtn">登录</p>
                        <p className="headerBtn">注册</p>
                    </div>
                </div>
                <div className="banner" style={{height:window.innerHeight}}>
                    <div className="dark"/>
                    <div className="banBox">
                        <p>
                            助力猎头高效交付<br/>
                            发现更多优质人才
                        </p>
                        <p className="freebtn">
                            免费试用
                        </p>
                    </div>
                </div>
                <div className="content">
                    <h2>功能模块介绍</h2>
                    <div className="intrModule">
                        <div className="moduleBox">
                            <div className="moduleImg01"/>
                            <h2>任务面板</h2>
                            <p>
                                BD岗位发布项目仅需30秒，<br/>
                                到数据看板清晰明了，<br/>
                                信息全面展现在你眼前
                            </p>
                        </div>
                        <div className="moduleBox">
                            <div className="moduleImg02"/>
                            <h2>智能人才</h2>
                            <p>
                                筛选项目精准到位，<br/>
                                用人工智能技术从海量简历库中<br/>
                                1秒找到最需要的人才
                            </p>
                        </div>
                        <div className="moduleBox">
                            <div className="moduleImg03"/>
                            <h2>专享管家</h2>
                            <p>
                                打造个性化人才库，<br/>
                                分组收藏管理你的优质候选人，<br/>
                                独家跟进避免业务冲突
                            </p>
                        </div>
                    </div>
                    <div className="bgblack">

                    </div>
                </div>
                <div className="footer">
                    <div className="fterBox">
                        <h2>辈出产品</h2>
                        <p>辈出有读</p>
                        <p>辈出诚聘</p>
                        <p>辈出有猎</p>
                    </div>
                    <div className="fterBox">
                        <h2>关于辈出</h2>
                        <p>企业介绍</p>
                        <p>辈出动态</p>
                        <p>加入我们</p>
                    </div>
                    <div className="fterBox fterlast">
                        <h2>联系我们</h2>
                        <div>
                            <i className="ico phone"/>
                            <p>0571-88647556</p>
                        </div>
                        <div>
                            <i className="ico qqlogo"/>
                            <p>780881737</p>
                        </div>
                        <div>
                            <i className="ico email"/>
                            <p>nick@fanfandata.com</p>
                        </div>
                    </div>
                    <p className="footertext">
                        Copyright©2017 www.beichoo.com 浙ICP备16023665号-3
                    </p>
                </div>
            </div>
        )
    };
}