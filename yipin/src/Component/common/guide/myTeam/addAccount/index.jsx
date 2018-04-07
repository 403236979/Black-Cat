import React, {Component} from 'react';
import style from './addAccount.css'
import { Link , withRouter } from 'react-router-dom'
import LeftNav from "pubCom/leftNav/index.jsx"
import GuideHeader from "pubCom/guideHeader/index.jsx"


class AddAccount extends Component {
    constructor(props) {
        super(props);
        this.state = {
            showIndex:2,
        }
    }

    render() {
        return (
            <div id='Test'>
                <GuideHeader/>
                <div className={style.box}>
                    <LeftNav {...this.props} {...this.state}/>
                    <div className={style.contentBox}>
                        <div className={style.border}>
                            <div className={style.title}>添加新成员</div>
                            <div className={style.content}>
                                <p>通过公开链接，邀请个人加入团队</p>
                                <p>将下面的公开邀请链接，通过钉钉，QQ或微信，发送给邀约个人</p>
                                <div style={{marginTop:' 10px'}}>
                                    <div className={style.inputContainer}>
                                        <input type="text" className={style.inputCl} placeholder=""  value="https://www.yipin.com/#/join?shareAccount=17826829330&amp;shareId=1762100165&amp"/>
                                    </div>
                                    <span className={style.btn} style={{position: 'relative', top: '-10px'}}>复制链接</span>
                                </div>
                                <div>
                                    任何看到邀请链接的人，都可以申请加入团队。如果你想让邀请链接失效，请
                                    <span className={style.btn}>重新生成链接</span>
                                </div>
                                <p className={style.contentTitle}>邀请奖励</p>
                                <p className={style.smallText}>邀请个人并完成企业认证</p>
                                <p className={style.smallText}>主动邀请账号获得250，受邀账号获得100</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
export default withRouter(AddAccount);
