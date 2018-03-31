import React, {Component} from 'react';
import style from './verify.css'

import LeftNav from "pubCom/leftNav/index.jsx"
import GuideHeader from "pubCom/guideHeader/index.jsx"
import { Link , withRouter } from 'react-router-dom'

class Verify extends Component{
    constructor(props){
        super(props);
        this.state = {
        }
    }

    render() {
        return(
            <div className={style.container}>
                <GuideHeader/>
                <div>
                    <LeftNav/>
                    <div className={style.rightSide}>
                        <div className={style.topSide}>
                            <p>
                                <span className={style.title}>第三方渠道认证</span>
                                <span className={style.tip1}>推荐使用</span>
                            </p>
                            <p>请验证在前程无忧网站有效期内的企业账号，完成企业信息认证</p>
                            <div style={{marginBottom:'20px'}}>
                                <img src={require('./img/1.png')} />
                                <span className={style.tip2}>去认证</span>
                            </div>
                        </div>
                        <div className={style.downSide}>
                            <p className={style.title}>材料认证</p>
                            <p>请上传所在企业有效的营业执照，完成企业信息认证</p>
                            <p>
                                <label htmlFor="name">公司名称：</label>
                                <input id="name"/>
                            </p>
                            <div>
                                <span className={style.authentication}>材料认证：</span>
                                <div className={style.companyImg}>
                                    <img src={require('./img/2.png')} />
                                    <p>点击上传</p>
                                </div>
                            </div>
                            <div className={style.compangBtn}>
                                <span className={style.tip3}>提交认证</span>
                            </div>
                            <div className={style.desc}>
                                <h1>材料格式规范：</h1>
                                <p>1.请上传图片小于5MB的图片</p>
                                <p>2.图片格式暂支持jpg、jpeg、png</p>
                                <h1>材料审核标准:</h1>
                                <p>1.上传营业执照的核准日期必须为最新，企业经营状态正常</p>
                                <p>2.所填写的公司名称必须与营业执照的公司名称一致</p>
                                <p>3.营业执照须拍摄清晰，且拍摄完整，包含证件边框在内</p>
                                <p>4.若为营业执照复印件，请在复印件上加盖企业公章</p>
                            </div>
                        </div>
                        <p className={style.lastTip}>根据国家法律规定，个人不能从事招聘活动，请先进行企业认证</p>
                    </div>
                </div>
            </div>
        )
    }
}
export default withRouter(Verify);
