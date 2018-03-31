import React, {Component} from 'react';
import style from './personalEdit.css'
import { Link , withRouter } from 'react-router-dom'
import LeftNav from "pubCom/leftNav/index.jsx"
import GuideHeader from "pubCom/guideHeader/index.jsx"


class personalEdit extends Component {
    constructor(props) {
        super(props);
        this.state = {
            name:'',
            sex:'',
            birth:'',
            job:'',
            company_name:'',
            short_company_name:'',
            company_industry:'',
            company_nature:'',
            company_scale:'',
            company_area:'',
            address:'',
            email:'',
            phone:''
        }
    }

    save=()=>{
        var per = document.getElementById('per');
        var length = per.getElementsByTagName('input').length;
        for(let i=0;i<length;i++){
            let key =per.getElementsByTagName('input')[i].id;
            let value = per.getElementsByTagName('input')[i].value;
            if(this.state[key]!==value){
                this.setState({
                    [key]:value
                })
            }
        }
        console.log(this.state)
    }

    render() {
        return (
            <div id='Test'>
                <GuideHeader/>
                <div className={style.box}>
                    <LeftNav {...this.props} {...this.state}/>
                    <div className={style.contentBox}>
                        <div className={style.content} id="per">
                            <div className={style.conHeader}>
                                <h1>完善个人信息</h1>
                            </div>
                            <div className={style.conPer}>
                                <h1>个人信息</h1>
                                <p style={{lineHeight:'62px',height:"62px"}}>
                                    <label>个人头像:</label>
                                    <span/>
                                    <span>建议: 上传的logo为正方形，<br/>尺寸在150px至300px之间</span>
                                </p>
                                <p><label htmlFor="name">姓名<span style={{'color':'#FF592A'}}>*</span>:</label><input id="name"/></p>
                                <p><label htmlFor="sex">性别<span style={{'color':'#FF592A'}}>*</span>:</label><input id="sex"/></p>
                                <p><label htmlFor="birth">出生年月<span style={{'color':'#FF592A'}}>*</span>:</label><input id="birth"/></p>
                                <p><label htmlFor="job">职位<span style={{'color':'#FF592A'}}>*</span>:</label><input id="job"/></p>
                            </div>
                            <div className={style.conPer}>
                                <h1>公司信息（选填）</h1>
                                <p style={{lineHeight:'62px',height:"62px"}}>
                                    <label>公司logo:</label>
                                    <span/>
                                    <span>建议: 上传的logo为正方形，<br/>尺寸在150px至300px之间</span>
                                </p>
                                <p><label htmlFor="company_name">公司名称:</label><input id="company_name"/></p>
                                <p><label htmlFor="short_company_name">公司简称:</label><input id="short_company_name"/></p>
                                <p><label htmlFor="company_industry">所在行业<span style={{'color':'#FF592A'}}>*</span>:</label><input id="company_industry"/></p>
                                <p><label htmlFor="company_nature">公司性质:</label><input id="company_nature"/></p>
                                <p><label htmlFor="company_scale">公司规模<span style={{'color':'#FF592A'}}>*</span>:</label><input id="company_scale"/></p>
                                <p><label htmlFor="company_area">公司地址<span style={{'color':'#FF592A'}}>*</span>:</label><input id="company_area"/></p>
                                <p><label htmlFor="address">详细地址<span style={{'color':'#FF592A'}}>*</span>:</label><input id="address"/></p>
                            </div>
                            <div className={style.conPer}>
                                <h1>联系方式</h1>
                                <p><label htmlFor="email">常用邮箱<span style={{'color':'#FF592A'}}>*</span>:</label><input id="email"/></p>
                                <p><label htmlFor="phone">手机号码<span style={{'color':'#FF592A'}}>*</span>:</label><input id="phone"/></p>
                            </div>
                            <div className={style.btn}>
                                <span onClick={this.save.bind(this)}>保存</span>
                            </div>
                        </div>
                    </div>
                    <div className={style.clear}/>
                </div>
            </div>
        )
    }
}
export default withRouter(personalEdit);
